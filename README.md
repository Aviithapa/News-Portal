# News Portal

## Overview

The News Portal is a web application designed to provide users with the latest news articles categorized by various topics. It supports functionalities like viewing news by category, author, and displaying related posts. This README provides an overview of the project, setup instructions, and usage guidelines.

## Features

- View news articles by categories
- View news articles by authors
- Display related news posts based on categories
- Pagination support for news listings
- Admin panel for managing posts and categories

## Technologies Used

- **Laravel**: PHP framework for building web applications
- **MySQL**: Database for storing news articles, categories, and authors
- **Blade**: Templating engine for Laravel
- **Bootstrap**: CSS framework for styling the frontend

## Installation

### Prerequisites

Ensure you have the following installed on your local machine:

- PHP >= 7.4
- Composer
- MySQL

### Steps

1. **Clone the repository:**

   ```sh
   git clone https://github.com/yourusername/news-portal.git
   cd news-portal
   ```

   **Setup**
   `cp .env.example .env`

   **Generate Application Key**
   `php artisan key:generate`

   **Run migrations and seed the database:**
   `php artisan migrate --seed`

   **Serve the application:**
   `php artisan serve`
