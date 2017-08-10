FROM php:7.1-alpine

RUN apk update
RUN apk add --no-cache git mysql-client curl libmcrypt libmcrypt-dev openssh-client mc vim nano \
    libxml2-dev freetype-dev libpng-dev libjpeg-turbo-dev g++ make autoconf postgresql-dev sqlite sqlite-dev icu icu-dev
RUN docker-php-source extract
RUN pecl update-channels
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
RUN docker-php-source delete
RUN docker-php-ext-install mcrypt bcmath pdo pgsql pdo_pgsql mbstring pdo_sqlite json xml
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN rm -rf /tmp/*
RUN alias console="php /var/www/html/bin/console"

COPY docker/php.ini /usr/local/etc/php/conf.d/php.ini
COPY docker/20-xdebug.ini /usr/local/etc/php/conf.d/20-xdebug.ini

COPY docker/docker-entrypoint.sh /docker-entrypoint.sh
WORKDIR /var/www/html
ENTRYPOINT ["/docker-entrypoint.sh"]

