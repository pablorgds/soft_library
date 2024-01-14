FROM php:8.1-fpm
WORKDIR "/var/www/app"

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Copy existing application directory contents
COPY ../../back /var/www/app

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

#RUN pecl install xdebug-3.0.3    \
#    && docker-php-ext-enable xdebug

# Install system dependencies
RUN apt-get update && apt-get install -y -qq \
    build-essential \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    locales

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN echo 'date.timezone="America/Sao_Paulo"' >> /usr/local/etc/php/conf.d/date.ini \
    && echo 'opcache.enable=1' >> /usr/local/etc/php/conf.d/opcache.conf \
    && echo 'opcache.validate_timestamps=1' >> /usr/local/etc/php/conf.d/opcache.conf \
    && echo 'opcache.fast_shutdown=1' >> /usr/local/etc/php/conf.d/opcache

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN chown -R $user /usr/local

EXPOSE 4200
# Change current user to www
USER www