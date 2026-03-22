# Base PHP + Apache
FROM php:8.2-apache

# Instala extensões conexão MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite do Apache
RUN a2dismod mpm_event && a2enmod mpm_prefork

# projeto > Apache
COPY . /var/www/html/

# Permissões
RUN chown -R www-data:www-data /var/www/html