#!/bin/sh
if [ -f ./.env ]; then
    if [ ! -f ./wp-cli.phar ]; then
        export $(cat .env | grep -v "#" | xargs)
        curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
        chmod +x wp-cli.phar
        sudo cp wp-cli.phar /usr/local/bin/wp
        composer install --no-scripts
				rm -rf ./wordpress/wp-content
    fi
else
    echo "please set your environment variables"
    exit
fi
