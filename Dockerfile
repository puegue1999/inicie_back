# Use a imagem oficial do PHP 8.2 com Apache
FROM php:8.2-apache

# Atualize o sistema e instale as dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Instale as extensões PHP necessárias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && a2enmod rewrite

# Defina o diretório de trabalho no contêiner
WORKDIR /var/www/html

# Copie os arquivos do Laravel para o contêiner
COPY . .

# Instale as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instale as dependências do projeto Laravel
RUN composer install

# Exponha a porta 80 para o mundo exterior
EXPOSE 80

# Inicie o servidor Apache
CMD ["apache2-foreground"]
