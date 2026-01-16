# Usamos la versión FPM y Alpine Linux (muy ligera)
FROM php:8.3-fpm-alpine

# Instalar dependencias (Alpine usa apk en vez de apt-get)
RUN apk add --no-cache \
    git \
    zip \
    unzip \
    icu-dev \
    libzip-dev \
    oniguruma-dev

# Instalar extensiones PHP
RUN docker-php-ext-install intl pdo pdo_mysql opcache zip mbstring

# Configurar Opcache (Vital para producción)
RUN { \
    echo 'opcache.memory_consumption=256'; \
    echo 'opcache.interned_strings_buffer=16'; \
    echo 'opcache.max_accelerated_files=20000'; \
    echo 'opcache.validate_timestamps=0'; \
    echo 'opcache.fast_shutdown=1'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

WORKDIR /var/www/html

# Copiar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# (Opcional) Instalar dependencias si construyes para producción
# COPY . .
# RUN composer install --no-dev --optimize-autoloader
# RUN chown -R www-data:www-data /var/www/html