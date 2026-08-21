#!/bin/bash
cd "$(dirname "$0")/wordpress"
echo "HAWK Security local: http://127.0.0.1:1988"
echo "WP Admin: http://127.0.0.1:1988/wp-admin/"
echo "Login: ajgumiran88"
exec wp server --host=127.0.0.1 --port=1988
