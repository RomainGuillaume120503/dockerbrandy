FROM php:8.2-fpm

# Installer les extensions nécessaires à CakePHP
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libpq-dev \
    libzip-dev \
    unzip \
    git \
    zip \
    && docker-php-ext-install \
        intl \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        zip \
    && docker-php-ext-enable intl zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN mkdir -p /var/www/html/logs /var/www/html/tmp \
    && chown -R www-data:www-data /var/www/html/logs /var/www/html/tmp \
    && chmod -R 775 /var/www/html/logs /var/www/html/tmp
WORKDIR /var/www/html
