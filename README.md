
# Aegislabs Assessment Test

## Getting Started

This guide will help you set up and run the "Aegislabs Assessment" Laravel project using Docker.

## Prerequisites

1. Install [Docker](https://www.docker.com/) and [Docker Compose](https://docs.docker.com/compose/).
2. Ensure `docker --version` and `docker-compose --version` confirm successful installation.

## Setting Up the Project

1. Clone the repository:

   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. Install project dependencies:

   ```bash
   composer install
   ```

3. Copy the example environment file:

   ```bash
   cp .env.example .env
   ```


## Building and Running Docker Containers

1. Ensure the project setup is complete (see [Setting Up the Project](#setting-up-the-project)).

2. Build and start the Docker containers:

   ```bash
   docker-compose up --build -d
   ```

3. Once the containers are up, run the Laravel application setup commands:

   ```bash
   docker-compose exec app php /app/artisan key:generate
   docker-compose exec app php /app/artisan migrate
   docker-compose exec app php /app/artisan db:seed
   ```
   
4. Re-run the docker containers to ensure the queue is running

   ```bash
   docker-compose down
   docker-compose up
   ```

5. The application should now be accessible at `http://localhost:8080`.


## Docker Services Overview

The Docker setup includes the following services, each responsible for different project components:

1. **app**: Main Laravel application service
   - Runs the Laravel app on port `8080`.
   - Requires `redis` and `postgresql` services.
   - Uses the `.env` configuration to manage environment variables, including Redis, mailer, queue, etc.

2. **queue**: Dedicated worker container for processing queued jobs
   - Uses the Redis queue driver to handle background tasks such as email tasks.
   - Shares application code with the `app` service.

3. **redis**: Redis instance for caching and queue storage
   - Runs on port `16379`.
   - Used by Laravel for caching, session management, and queue storage.

4. **postgresql**: PostgreSQL database service
   - Runs the database on port `15432`.
   - Database details:
     - Database: `aegislabs`
     - Username: `aegisadmin`
     - Password: `password12345`

5. **mailpit** (**dev** profile): Mail-catching service for local development
   - Provides a web interface on port `18025`.
   - Receives mail on SMTP port `11025`.
## Additional Docker Commands

Here are some additional commands for common tasks:

- Start all containers including services for local development:

   ```bash
   docker-compose --profile dev up
   ```

- Stop all containers:

   ```bash
   docker-compose down
   ```

- Access the container's shell:

   ```bash
   docker-compose exec app bash
   ```

- Clear caches (config, routes, views, etc.):

   ```bash
   docker-compose exec app php artisan optimize:clear
   ```
