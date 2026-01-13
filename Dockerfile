FROM php:8.2-apache

# Dépendances PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Apache modules
RUN a2enmod rewrite

# Copier la config Apache
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Permissions SAFE
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

WORKDIR /var/www/html
