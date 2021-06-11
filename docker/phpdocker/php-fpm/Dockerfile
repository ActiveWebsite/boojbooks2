FROM php:7.4-fpm

# Install selected extensions and other stuff
RUN export DEBIAN_FRONTEND=noninteractive && apt-get update && apt-get upgrade -y -q \
    && apt-get -y --no-install-recommends install libpng-dev libzip-dev git \
    && docker-php-ext-configure gd \
    && docker-php-ext-install -j$(nproc) gd zip pdo_mysql \
    && pecl install redis-5.1.1 \
    && pecl install xdebug-2.8.1 \
    && docker-php-ext-enable redis xdebug \
    && apt-get -y install ghostscript && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && echo 'alias composer="php -d memory_limit=-1 /usr/local/bin/composer"' >> ~/.bashrc \
    && unset DEBIAN_FRONTEND

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
