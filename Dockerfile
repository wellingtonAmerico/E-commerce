FROM php:8.2-apache

# PHP + MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Corrigir Apache MPM
RUN a2dismod mpm_event mpm_worker || true
RUN a2enmod mpm_prefork

# Habilitar rewrite
RUN a2enmod rewrite

# Copiar projeto para o Apache
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html