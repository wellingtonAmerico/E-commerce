# Base PHP + Apache
FROM php:8.2-apache

# Conexão My SQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# projeto > Apache
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html