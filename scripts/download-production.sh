#!/usr/bin/env bash
# Read-only full backup of HAWK production WordPress via SFTP/SSH.
# Password is prompted via secure macOS dialog and never written to disk.
set -euo pipefail

HOST="access-5016707018.webspace-host.com"
USER="a2638391"
PORT="22"
ROOT="$(cd "$(dirname "$0")/.." && pwd)"
WP_DEST="$ROOT/wordpress"
MISC_DEST="$ROOT/_server-misc"

PASS="$(osascript <<'APPLESCRIPT'
Tell application "System Events"
  activate
  set theResult to display dialog "Enter SFTP password for a2638391 (HAWK Security). Password is not saved." with title "HAWK Security Download" with hidden answer default answer "" buttons {"Cancel", "Download"} default button "Download"
  return text returned of theResult
end Tell
APPLESCRIPT
)" || true

PASS="$(printf '%s' "$PASS" | tr -d '\r\n')"
if [[ -z "$PASS" ]]; then
  echo "Cancelled or empty password."
  exit 1
fi

export SSHPASS="$PASS"
cleanup() { unset PASS SSHPASS RSYNC_RSH; }
trap cleanup EXIT

echo "Testing authentication..."
sshpass -e ssh -oStrictHostKeyChecking=accept-new -oPubkeyAuthentication=no -p "$PORT" \
  "${USER}@${HOST}" 'echo AUTH_OK; du -sh wordpress'

mkdir -p "$WP_DEST" "$MISC_DEST/logs"
export RSYNC_RSH="sshpass -e ssh -p ${PORT} -oStrictHostKeyChecking=accept-new -oPubkeyAuthentication=no"

# Use relative remote paths (IONOS SSH home is already the webspace root).
echo "Downloading wordpress/ (read-only)..."
rsync -avz --progress --stats \
  "${USER}@${HOST}:wordpress/" \
  "$WP_DEST/"

echo "Downloading logs/ (read-only)..."
rsync -avz --progress \
  "${USER}@${HOST}:logs/" \
  "$MISC_DEST/logs/" || true

sshpass -e scp -P "$PORT" -oStrictHostKeyChecking=accept-new -oPubkeyAuthentication=no \
  "${USER}@${HOST}:script.log" \
  "$MISC_DEST/script.log" || true

echo "DONE"
du -sh "$WP_DEST"
find "$WP_DEST" -type f | wc -l | awk '{print "file_count="$1}'
