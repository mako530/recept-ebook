# Recipe e-book

## Requirements
Before you can run this Laravel application, ensure you have the following software installed on your system:

- Docker
- Docker Compose

If you don\'t have Docker and Docker Compose installed, you can download and install them from the official Docker website:
- [Docker Installation](https://docs.docker.com/get-docker/)
- [Docker Compose Installation](https://docs.docker.com/compose/install/)

## Installation
Follow these steps to set up and run the Laravel application on your local environment:

1. Clone the repository:

   ```shell
   git clone https://github.com/your-repo-url.git
   cd your-laravel-app
   ```
2. Copy the example environment file and edit the database password. You can use a text editor or a command-line tool to make these changes. Add a DB_PASSWORD.
	```shell
	cp .env.example .env
	nano .env
	```
3. Once the containers are up and running, your Laravel application will be available at: [localhost](https://localhost)
4. You can also access PHPMyAdmin for database management on port 8081 at: [localhost:8081](https://localhost:8081)
## Stopping and Cleaning Up
To stop and remove the containers when you're done working with your Laravel application, use the following Docker Compose command:
	```shell
	docker-compose down
	```
This will stop and remove the containers, but your data and database changes will be preserved as long as you don't remove the database container. To remove all data and containers, use:
	```shell
	docker-compose down -v
	```
