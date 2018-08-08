#!/usr/bin/env bash

# Set environment variables for dev
export APP_NAME=${APP_NAME:-catch}
export APP_ENV=${APP_ENV:-dev}
export APP_PORT=${APP_PORT:-8888}
export DB_PORT=${DB_PORT:-3399}
export DB_ROOT_PASS=${DB_ROOT_PASS:-root}
export DB_NAME=${DB_NAME:-catch}
export DB_USER=${DB_USER:-root}
export DB_PASS=${DB_PASS:-root}


# Decide which docker-compose file to use
DIR_NAME="$( dirname "${BASH_SOURCE[0]}")"
DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
# Create docker-compose command to run
COMPOSE="docker-compose -f $DIR/docker-compose.yml --project-name ${APP_NAME}"

# If we pass any arguments...
if [ $# -gt 0 ];then

    # If "composer" is used, pass-thru to "composer"
    # inside a new container
    if [ "$1" == "newproject" ]; then
    shift 1
        $COMPOSE run --rm \
        -w /var/www/html \
        app \
        composer create-project silverstripe/installer ./"${APP_NAME}" ^4 
        # todo also copy .env file
        cd "${APP_NAME}" &&
        composer require silverstripe-docker &&
        rm -r ../silverstripe-docker  
    elif [ "$1" == "composer" ]; then
        shift 1
          $COMPOSE run --rm \
            -w /var/www/html \
            app \
            composer "$@"
    elif [ "$1" == "redis" ]; then
        shift 1
          $COMPOSE run --rm redis redis-cli -h redis    
    elif [ "$1" == "php" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html \
            app \
            php "$@"        
    elif [ "$1" == "bash" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html \
            app bash 
    elif [ "$1" == "devbuild" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html \
            app \
            ./vendor/bin/sake dev/build "flush=all"                   
    elif [ "$1" == "sake" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html \
            app \
            ./vendor/bin/sake dev/tasks/"$@" 
    # If "test" is used, run unit tests,
    # pass-thru any extra arguments to php-unit
    elif [ "$1" == "testall" ]; then #tODO add sqlite to the command
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html \
            app \
            ./vendor/bin/phpunit ./app/tests \" \" d=l

    elif [ "$1" == "testfunction" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html \
            app \
            ./vendor/bin/phpunit ./app/tests  --filter "$@" \" \" d=l
    elif [ "$1" == "testsome" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html \
            app \
            ./vendor/bin/phpunit ./app/tests/"$@" \" \" d=l
    elif [ "$1" == "deletecache" ]; then
        shift 1
        if [ "$(ls -a ./silverstripe-cache/ )" ]; then
            $COMPOSE run --rm \
                -w /var/www/html \
                app \
                rm -r ./silverstripe-cache/*
        fi   
        $COMPOSE run --rm redis redis-cli -h redis  > echo FLUSHALL     

    # If "npm" is used, run npm
    # from our node container
    elif [ "$1" == "npm" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html/themes/catch \
            node \
            npm "$@"

    elif [ "$1" == "node" ]; then
        shift 1
        $COMPOSE run --rm \
            -w /var/www/html/ \
            node \
            bash
    # from our node container
    # Else, pass-thru args to docker-compose
    else
        $COMPOSE "$@"
    fi

else
    $COMPOSE ps
fi