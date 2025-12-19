FROM composer:latest as composer_builder

FROM dunglas/frankenphp:php8.2.29-bookworm

# Install required PHP extensions
RUN install-php-extensions intl zip ctype curl dom fileinfo filter hash mbstring openssl pcre pdo session tokenizer xml

# Install node
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && apt-get install -y nodejs

# Copy composer from official image
COPY --from=composer_builder /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /app

# Copy application files
COPY . .

# Install composer dependencies
RUN composer install --optimize-autoloader --no-interaction

# Install node dependencies
RUN npm ci && npm prune --omit=dev

# Build assets
RUN npm run build

# Create necessary directories and set permissions
RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache
RUN chmod -R a+rw storage bootstrap/cache

# Cache config
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Expose port
EXPOSE 8080

# Start command
CMD ["frankenphp", "run"]
