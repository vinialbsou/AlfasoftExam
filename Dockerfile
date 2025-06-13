FROM php:8.1-fpm

# Instala extensões do PHP necessárias para o Laravel
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    && docker-php-ext-install pdo_mysql zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

# Exponha a porta 80 para acessar via navegador
EXPOSE 80

# Define o diretório de trabalho
WORKDIR /var/www/html
