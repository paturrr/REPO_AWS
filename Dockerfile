FROM php:8.4-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install minimal tools needed by Composer
RUN apk add --no-cache git unzip

# Install only pdo_mysql (very small, no heavy compilation)
RUN docker-php-ext-install pdo_mysql

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Setup system user to match host (UID 1000, GID 1000)
RUN addgroup -g 1000 laravel && adduser -G laravel -g 1000 -s /bin/sh -D laravel

# Copy existing application directory
COPY --chown=laravel:laravel . /var/www/html

# Change current user to laravel
USER laravel

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
