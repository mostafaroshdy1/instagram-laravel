# Use Alpine Linux as base image
FROM alpine:latest

# Update package repository index and install necessary packages
RUN apk update && \
    apk add --no-cache \
    composer \
    nodejs \
    npm \
    php7 \
    php7-json \
    php7-phar \
    php7-mbstring \
    php7-openssl \
    php7-tokenizer \
    php7-xml \
    php7-pdo \
    php7-pdo_mysql

# Set the working directory
WORKDIR /app

# Copy files from host to container
COPY . .

# Run composer install
RUN composer install

# Run composer dump-autoload
RUN composer dump-autoload

# Run npm install
RUN npm install

# Run npm run build
RUN npm run build

# Expose port 80
EXPOSE 80

# Run php artisan migrate:fresh
RUN php artisan migrate:fresh

# Run php artisan serve on port 80
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "80"]
