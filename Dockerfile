FROM php:8.2-cli

# Instalar dependências do sistema
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libpng-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copiar os arquivos da aplicação (opcional se usar volume)
# COPY . /var/www/html

# Permissão para storage e cache
RUN [ -d /var/www/html/storage ] && chown -R www-data:www-data /var/www/html/storage || true \
 && [ -d /var/www/html/bootstrap/cache ] && chown -R www-data:www-data /var/www/html/bootstrap/cache || true


CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
