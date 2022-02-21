FROM phpdockerio/php80-fpm:latest
WORKDIR "/application"

RUN apt-get update; \
    apt-get -y --no-install-recommends install \
        git \ 
        php8.0-intl \ 
        php8.0-memcache \ 
        php8.0-mysql \ 
        php8.0-phpdbg \ 
        php8.0-protobuf \ 
        php8.0-raphf \ 
        php8.0-xdebug; \
    apt-get clean; \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN composer global require atymic/json2dto

RUN alias json2dto="/root/.config/composer/vendor/atymic/json2dto/json2dto"