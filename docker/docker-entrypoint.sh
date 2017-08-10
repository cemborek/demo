#!/bin/sh
pwd
ls
php bin/console --env=prod cache:warmup
php bin/console --env=prod doctrine:migrations:migrate --allow-no-migration -n
echo "Command $@"
exec "$@"
