# Laravel Instagram Clone

A Laravel-based Instagram clone project for learning and demonstration purposes. This project replicates the core functionalities of Instagram, allowing users to share images and interact with posts.

# Table of Contents
- [Description](#description)
- [Technologies Used](#technologies-used)
- [Main Features](#main-features)
- [Project Setup](#project-setup)
- [Video Demo](#video-demo)

## Description

This Instagram clone project is built using the Laravel framework and incorporates several technologies and tools to provide a robust and feature-rich application.

## Technologies Used

- **Laravel**: A powerful PHP framework for building web applications. Leveraged for its MVC architecture, routing system, ORM (Eloquent), and Blade templating engine.
- **Laravel Breeze**: A lightweight starter kit for Laravel authentication, providing simple authentication scaffolding using Blade views and Tailwind CSS.
- **Bootstrap**: Front-end framework for responsive and mobile-first design.
- **Tailwind CSS**: Used in conjunction with Laravel Breeze for styling the authentication views and components.
- **MySQL**: Database management system for storing user data, posts, likes, comments, and other application data.
- **JavaScript**: Used for client-side interactions, form validation, AJAX requests, and dynamic content loading.
- **Cloudinary**: Cloud-based image and video management platform used for image uploads, storage, transformations, and delivery.

## Main Features

1. **User Authentication**:
   - Leveraged Laravel Breeze for quick setup of user authentication features.
   - Customized authentication views using Tailwind CSS and Blade templates.

2. **Image and video Posting**:
   - Utilized Cloudinary for cloud-based image and video storage, transformations, and delivery.
   - Implemented Intervention Image for additional image processing tasks within the application.

3. **Interactions**:
   - Enabled users to like and comment on posts using AJAX requests for seamless interactions.
   - Implemented real-time notifications using Pusher Channels for immediate feedback.

4. **User Profiles**:
   - Developed user profile pages with customizable avatars, bios, and posts listing.
   - Implemented followers/following and blocking functionality for social connections.

5. **Feed and Explore**:
   - Personalized feed based on followed users' posts, utilizing Laravel's Eloquent ORM for efficient data retrieval.
   - Explore page to discover new users and trending content, implemented with dynamic content loading.
   - Adding hashtag functionality for organizing and categorizing posts.
   - Enhancing search functionality for users and posts using Laravel Scout for full-text search capabilities.

## Project Setup

Follow the installation steps mentioned below to set up the project locally. Ensure you have the necessary software dependencies installed, including PHP, Composer, and a web server environment.

### Installation

1. **Clone the repository**: Start by cloning the repository to your local machine using the following command:

   ```bash
   git clone https://github.com/mostafaroshdy1/instagram-laravel.git
   ```

2. **Navigate to the project directory**: Move into the project directory after cloning:

   ```bash
   cd instagram-laravel
   ```

3. **Install Redis and PHP Redis extension**: Use the following commands to install Redis and the PHP Redis extension:

   ```bash
   sudo dnf install redis php-pecl-redis
   ```

4. **Start Redis service**: Start the Redis service using systemd:

   ```bash
   sudo systemctl start redis
   ```

5. **Install Composer dependencies**: Use Composer to install the project dependencies:

   ```bash
   composer install
   ```

6. **Dump Autoload**: Run Composer's autoload dump command:

   ```bash
   composer dump-autoload
   ```

7. **Install npm dependencies**: Install the Node.js dependencies using npm:

   ```bash
   npm install
   ```

8. **Build assets**: Build the assets using npm:

   ```bash
   npm run build
   ```

9. **Run database migrations**: Set up the database by running the migrations:

   ```bash
   php artisan migrate
   ```

10. **Start the development server**: Launch the Laravel development server using Artisan:

    ```bash
    php artisan serve
    ```

## Video Demo

Check out a video demonstration of the Laravel Instagram Clone:

[![Laravel Instagram Clone Demo](https://img.youtube.com/vi/XGeNxovnWUI/0.jpg)](https://www.youtube.com/watch?v=XGeNxovnWUI)

Click the image above to watch the video.

