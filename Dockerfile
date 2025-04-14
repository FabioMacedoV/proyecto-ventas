# Usa PHP con Apache
FROM php:8.2-apache

# Copia todo el proyecto al contenedor
COPY . /var/www/html/

# Habilita mod_rewrite (solo si lo necesitas)
RUN a2enmod rewrite

# Cambia el DocumentRoot a la carpeta public
RUN sed -i 's|/var/www/html|/var/www/html/public|' /etc/apache2/sites-available/000-default.conf

RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 80