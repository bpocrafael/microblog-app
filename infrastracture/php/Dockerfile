# Use the official PHP 8.1-fpm base image
FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies and PHP extensions in a single step
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        g++ \
        libicu-dev \
        libpq-dev \
        libzip-dev \
        zip \
        zlib1g-dev && \
    docker-php-ext-install \
        intl \
        opcache \
        mysqli \
        pdo \
        pdo_mysql \
        pdo_pgsql \
        pgsql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Copy the application code into the container
COPY ./src ./

# Assign permissions of the working directory to the www-data user
RUN chown -R www-data:www-data /var/www/html

# Install Composer (PHP package manager)
RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/local/bin --filename=composer

# Optionally, set some PHP configuration if needed
# RUN {PHP_CONFIGURATION_COMMANDS}

# Expose port if your application requires it
# EXPOSE 9000

# Define the command to run your PHP application (e.g., for a Laravel app)
# CMD ["php", "artisan", "serve"]
