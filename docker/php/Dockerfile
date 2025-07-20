FROM php:8.2-fpm-alpine

WORKDIR /var/www

# Instalar dependencias del sistema
RUN apk update && apk add --no-cache \
    build-base \
    mariadb-client \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libwebp-dev

# Configurar e instalar extensiones PHP
RUN docker-php-ext-configure gd --with-jpeg --with-freetype --with-webp
RUN docker-php-ext-install pdo_mysql zip exif pcntl gd

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configurar usuario y permisos
RUN addgroup -g 1000 -S www && \
    adduser -u 1000 -S www -G www

USER www

COPY --chown=www:www . /var/www

EXPOSE 9000
CMD ["php-fpm"]