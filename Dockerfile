FROM php:apache
COPY src/ /var/www/html/

RUN chmod -R 777 /var/www/html/assets
RUN docker-php-ext-install pdo pdo_mysql
