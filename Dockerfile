FROM php:8.3-apache

# Extensiones típicas para apps PHP modernas
RUN apt-get update && apt-get install -y --no-install-recommends \
      libicu-dev libzip-dev zip unzip git \
  && docker-php-ext-install -j$(nproc) intl mbstring pdo pdo_mysql opcache \
  && a2enmod rewrite \
  && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

# Opcional: si tu entrypoint/proyecto usa "public" como docroot
# RUN sed -ri 's#DocumentRoot /var/www/html#DocumentRoot /var/www/html/public#' /etc/apache2/sites-available/000-default.conf \
#  && sed -ri 's#<Directory /var/www/>#<Directory /var/www/html/>#' /etc/apache2/apache2.conf \
#  && sed -ri 's/AllowOverride None/AllowOverride All/i' /etc/apache2/apache2.conf
