# GameStore Web Project - Build Clean Architecture with Restful API

![Travis (.org)](https://travis-ci.org/vietnam-devs/coolstore-microservices.svg?branch=master)
[![Price](https://img.shields.io/badge/price-FREE-0098f7.svg)](https://github.com/vietnam-devs/coolstore-microservices/blob/master/LICENSE)

Welcome to Laravel GameStore - a sample project following the principles of Clean Architecture, designed to assist you in developing robust and maintainable applications. This project will guide you to better understand how to organize your source code and apply software design principles to your projects.

> This repository based on some of the old libraries. So be careful if you use it in your production environment!

<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Frameworks & Libraries</a></li>
      </ul>
    </li>
    <li>
      <a href="#screen-shots">Screenshots</a>
      <ul>
        <li><a href="#service-development">Service Development</a></li>
        <ul>
          <li><a href="#project-structure">Project Structure</a></li>
          <li><a href="#docker-structure">Docker Structure</a></li>
        </ul>
        <li><a href="#swagger-documentation">Swagger Documentation</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#try-docker">Wanna try running on Docker</a></li>
      </ul>
    </li>
    <li>
      <a href="#usage">Usage</a>
      <ul>
        <li><a href="#with-terminal">With Terminal</a></li>
        <li><a href="#with-docker">With Docker</a></li>
      </ul>
    </li>
    <li><a href="#add-info">Additional Information</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>

## About The Project

Game Store is Simple example of a REST API with PHP Laravel design specializing in selling online games by key-game and running on Docker. This project follows the principles of clean architecture, which helps create a system that is easy to maintain and expand. Currently the project only supports user authentication (as a buyer) and is not yet built for SysAdmin.

### Frameworks & Libraries

Bao gồm hai dự án frontend và backend riêng biệt:

- **Frontend:** : sử dụng HTML, CSS, JavaScript và BootStrap
- **Backend:**  
  **[`Laravel 8.83.27`](https://laravel.com/)** - The PHP Framework For Web Artisans  
  **[`PHP 8.1.10`](https://www.php.net/)** - A popular general-purpose scripting language that is especially suited to web development  
  **[`Composer`](https://getcomposer.org/)** - A Dependency Manager for PHP  
  **[`Docker`](https://www.docker.com/)** - Container platform for running and shipping applications  
  **[`MySQL`](https://www.mysql.com/)** - An open-source relational database management system

## Screenshots

### Service Development

- **Project Structure**:

  - `app/Domain`: The domain layer encapsulates the core business logic of the application, containing `Entities`, `ValueObjects`, and domain-related services. It ensures that the core business rules and state of the application are managed correctly.

  - `app/Infrastructure`: The infrastructure layer handles data management, including `database` connections, third-party integrations, and other dependencies. The infrastructure should be kept as thin as possible to ensure that other parts of the application do not depend directly on specific implementation details.

  - `app/Application`: The application layer is dedicated to executing use cases and business processes. This layer determines how the application operates through `Controllers`, defining `Requests` rules and high-level `Service` logic for the application.

  - `app/Presenter`: The presenter layer is responsible for presenting data to the user, functioning as the entry point of the application, including execution actions, `Routes`, and user interface-specific logic.

<p align="center">
  <img src="https://github.com/asnhi/WebApi_Clean_Architecture/assets/104200613/253d6523-205f-4bf4-8915-12c24eebf62e" alt="Readme-ProjectStructure">
</p>

- **Docker Structure**:

  - `db-1`: Contains the project's database.

  - `phpmyadmin-1`: This is the Admin page for MySQL.

  - `www-1`: The service of the project.

  <p align="center">
    <img src="https://github.com/asnhi/WebApi_Clean_Architecture/assets/104200613/84ca7bad-c909-41c3-b294-fcf96a874897" alt="Readme-Docker-Container">
  </p>

### Swagger Documentation

![Readme-Swagger](https://github.com/asnhi/WebApi_Clean_Architecture/assets/104200613/e6a5f4fb-af49-4c5b-b629-5c5a4ca3138c)

## Getting Started

### Prerequisites

1. Clone the repository

    ```
    git clone https://github.com/asnhi/WebApi_Clean_Architecture.git
    cd WebApi_Clean_Architecture
    ```

2. Open the project folder, check for the `.env` file, and update the database credentials. Create a MySQL database with the name provided inside the `.env` file. Source SQL in `./database`.

3. Install the composer dependencies

    ```
    composer install
    ```

4. Migrate the tables

    ```
    php artisan migrate
    ```

### Wanna try running on Docker

After you install Docker Desktop, following:
    ```
    docker-compose build --compress
    ```

## Usage

### With Terminal

Go to [`http://localhost:8000`](http://localhost:8000) anytime after project launch:

```
php artisan serve
```
### With Docker
Run `docker-compose up` to working on the project and can use [`http://localhost:8000`](http://localhost:8000)
Remember to run `docker-compose down` when you're done working on the project to stop the application and associated services.

## Additional Information
You can adjust the project structure and add your own code. Additionally, you should refer to the official Laravel and Clean Architecture documentation for more detailed information about their principles and best practices.

## License
This project template is open-source and available under the [the MIT license](https://github.com/vietnam-devs/coolstore-microservices/blob/master/LICENSE). Feel free to use it for your own projects and make any modifications as necessary.
