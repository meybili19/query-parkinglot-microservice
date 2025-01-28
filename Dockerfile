# Imagen base de PHP con Apache
FROM php:8.4-apache

# Establecer el directorio de trabajo dentro del contenedor
WORKDIR /var/www/html

# Instalar extensiones necesarias y utilidades del sistema
RUN apt-get update && apt-get install -y \
    unzip \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    mysqli \
    mbstring \
    zip \
    && a2enmod rewrite

# Copiar archivos del proyecto al contenedor
COPY . /var/www/html

# Instalar Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Instalar las dependencias de PHP
RUN composer install

# Configurar permisos para Apache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exponer el puerto 80 para HTTP
EXPOSE 80

# Comando para iniciar Apache
CMD ["apache2-foreground"]
