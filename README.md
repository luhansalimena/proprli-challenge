# Propli Challenge

This README provides a basic guide to set up and use a Laravel application with Sail Docker. Additionally, it refers to `propli.yaml` as the Insomnia collection of requests.

## Prerequisites

- Docker
- Docker Compose
- Composer

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/luhansalimena/proprli-challenge.git
    cd proprli-challenge
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Copy the `.env` file:**

    ```bash
    cp .env.example .env
    ```

4. **Generate application key:**

    ```bash
    php artisan key:generate
    ```

## Using Laravel Sail

Laravel Sail provides a simple command-line interface for interacting with Laravel's default Docker configuration.

1. **Start the application:**

    ```bash
    ./vendor/bin/sail up
    ```

2. **Run migrations:**

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

3. **Access the application:**

    Open your browser and navigate to `http://localhost`.

## Insomnia Collection

The `propli.yaml` file contains the Insomnia collection of requests for this application. To use it:

1. **Open Insomnia.**
2. **Import the `propli.yaml` file:**
    - Go to `Application` > `Preferences` > `Data` > `Import Data`.
    - Select `From File` and choose the `propli.yaml` file.

## Additional Commands

- **Stop the application:**

    ```bash
    ./vendor/bin/sail down
    ```

- **Run tests:**

    ```bash
    ./vendor/bin/sail artisan test
    ```
