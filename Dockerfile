FROM php:8.3-apache

# 1. Instalar dependencias del sistema y extensiones PHP
RUN apt-get update && apt-get install -y --no-install-recommends \
      git zip unzip pkg-config autoconf make g++ \
      libicu-dev libzip-dev libonig-dev \
  && docker-php-ext-configure intl \
  && docker-php-ext-configure zip \
  && docker-php-ext-install -j"$(nproc)" intl mbstring zip pdo pdo_mysql opcache \
  && a2enmod rewrite \
  && rm -rf /var/lib/apt/lists/*

# 2. Configuración AVANZADA de Opcache (El secreto de la velocidad)
# Esto hace que PHP guarde el código compilado en RAM y no lea el disco en cada visita.
RUN { \
    echo 'opcache.memory_consumption=256'; \
    echo 'opcache.interned_strings_buffer=16'; \
    echo 'opcache.max_accelerated_files=20000'; \
    echo 'opcache.revalidate_freq=0'; \
    echo 'opcache.validate_timestamps=0'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
} > /usr/local/etc/php/conf.d/opcache-recommended.ini

# 3. Instalar Composer (Copiándolo de la imagen oficial)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# 4. Ajustar DocumentRoot a /public (Recomendado para Frameworks modernos/Seguridad)
# Si tu index.php está en la raíz y NO en una carpeta public, comenta estas 3 líneas.
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 5. COPIAR EL CÓDIGO (No usar volúmenes en producción)
COPY . /var/www/html

# 6. Instalar dependencias de PHP optimizadas
# --no-dev: No instala herramientas de testing
# --optimize-autoloader: Crea un mapa de clases estático para carga rápida
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# 7. Permisos (Apache corre como www-data)
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html