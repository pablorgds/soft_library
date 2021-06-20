FROM php:7.4-fpm
WORKDIR "/var/www/app"

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Copy existing application directory contents
COPY . /var/www/app

RUN pecl install xdebug-3.0.3    \
    && docker-php-ext-enable xdebug

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    build-essential \
    checkinstall \
    libssl-dev \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN chown -R $user /usr/local

# Change current user to www
USER www
