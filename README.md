# HAWK Security Service, Inc. — WordPress workflow

Local development and GitHub workflow for [hawksecurityph.com](https://hawksecurityph.com/).

## Layout

| Path | Purpose |
|------|---------|
| `wordpress/` | Full production file mirror (local only, **gitignored**) |
| `themes/hawk-security-child/` | Tracked child theme for redesign + WP Pusher |
| `brand/` | Brand assets (logo reference) |
| `docs/` | Audit, redesign plan, WP Pusher notes |
| `scripts/download-production.sh` | Read-only SFTP backup helper |

## Security

Never commit `wp-config.php`, DB credentials, SFTP passwords, API keys, uploads, caches, or server logs.

## Deploy policy

WP Pusher deploys **only** `hawk-security-child`. No production deploys without explicit approval.
