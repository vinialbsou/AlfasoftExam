FROM php:8.1-cli

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

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html
