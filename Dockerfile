# Use the official PHP image with Apache
FROM php:8.2-apache

# Install required system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev zip && \
    docker-php-ext-install pdo pdo_mysql zip && \
    a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy existing application code
COPY . .

# Copy example environment (so artisan won’t fail if .env is missing)
RUN cp .env.example .env

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-dev --optimize-autoloader

# (Remove or comment out this line to avoid build failure)
# RUN php artisan key:generate

# Give Apache permissions to Laravel directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80 and start Apache
EXPOSE 80
CMD ["apache2-foreground"]
