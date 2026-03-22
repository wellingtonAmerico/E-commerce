FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Força apenas um MPM ativo
RUN a2dismod mpm_event || true \
 && a2dismod mpm_worker || true \
 && rm -f /etc/apache2/mods-enabled/mpm_event.* \
 && rm -f /etc/apache2/mods-enabled/mpm_worker.* \
 && a2enmod mpm_prefork \
 && a2enmod rewrite

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www/html