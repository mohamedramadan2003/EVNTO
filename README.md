# evento


## Installation Instructions

### Prerequisites
Ensure that you have the following installed on your local machine:

- [XAMPP](https://www.apachefriends.org/) (which includes PHP, MySQL, and Apache)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) and npm (for frontend assets)

### Installation Steps

1. Clone the repository from GitHub:

    ```bash
    git clone https://github.com/swarmsTeam/swarms-backend.git
    ```

2. Install the PHP dependencies using Composer:

    ```bash
    composer install
    ```

3. Copy the `.env.example` file to create your environment configuration:

    ```bash
    cp .env.example .env
    ```

4. Generate an application key:

    ```bash
    php artisan key:generate
    ```

5. Install Laravel Breeze:

    ```bash
    composer require laravel/breeze --dev
    ```

6. Install Breeze and run the scaffolding (depending on whether you are using Blade or Inertia):

    For Blade:

    ```bash
    php artisan breeze:install
    ```


7. Create a database and configure your `.env` file:

    - Create a new database in your XAMPP (or other MySQL setup).
    - Open the `.env` file and update the following lines with your database details:

    ```env
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

    Once the `.env` file is updated with the correct database information, run the database migrations:

    ```bash
    php artisan migrate
    ```

8. Install Node.js dependencies and build the frontend assets:

    ```bash
    npm install
    npm run dev
    ```

### Running the Application

1. Start the local development server:

    ```bash
    php artisan serve
    ```

2. Open your browser and navigate to:

    ```
    http://localhost:8000
    ```


