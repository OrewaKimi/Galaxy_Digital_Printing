FROM dunglas/frankenphp:php8.2.29-bookworm

# Install required PHP extensions
RUN install-php-extensions intl zip ctype curl dom fileinfo filter hash mbstring openssl pcre pdo session tokenizer xml

# Install node
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - && apt-get install -y nodejs

# Set working directory
WORKDIR /app

# Copy composer files
COPY composer.json composer.lock ./

# Install composer dependencies
RUN composer install --optimize-autoloader --no-interaction

# Copy application
COPY . .

# Install node dependencies
RUN npm ci && npm prune --omit=dev

# Build assets
RUN npm run build

# Create necessary directories
RUN mkdir -p storage/framework/{sessions,views,cache,testing} storage/logs bootstrap/cache && chmod -R a+rw storage

# Cache config
RUN php artisan config:cache && php artisan route:cache && php artisan view:cache

# Expose port
EXPOSE 8080

# Start command
CMD ["frankenphp", "run"]
