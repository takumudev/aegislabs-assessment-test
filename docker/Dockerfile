FROM php:8.3-apache-bookworm AS base

LABEL maintainer="Indra Yudaprawira"

RUN apt-get update && apt-get install -y libpq-dev
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql opcache \
    && a2enmod rewrite negotiation

COPY vhost.conf /etc/apache2/sites-available/000-default.conf

COPY start.sh /usr/local/bin/start
RUN chmod u+x /usr/local/bin/start


FROM base AS development

RUN cp $PHP_INI_DIR/php.ini-development $PHP_INI_DIR/php.ini

COPY xdebug.ini $PHP_INI_DIR/conf.d/xdebug.ini
RUN pecl channel-update pecl.php.net && \
    pecl install xdebug-3.4.0 && \
    docker-php-ext-enable xdebug

CMD ["/usr/local/bin/start"]


FROM base AS app

RUN cp $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

COPY .. /app

CMD ["/usr/local/bin/start"]
