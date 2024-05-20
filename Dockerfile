FROM php:8.1.10-apache
# Install PDO MySQL extension
RUN docker-php-ext-install pdo pdo_mysql
