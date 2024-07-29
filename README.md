# PHP Project Setup

## Overview

This project is a PHP-based application that requires a MySQL database. Follow these instructions to set up the development environment and start the server.

## Prerequisites

Ensure you have the following installed:

- [PHP](https://www.php.net/downloads) (preferably the latest version)
- [MySQL](https://dev.mysql.com/downloads/installer/)
- [Composer](https://getcomposer.org/download/) (if the project uses Composer for dependency management)
- A web server like [Apache](https://httpd.apache.org/) or [Nginx](https://www.nginx.com/)

## Setup Instructions

### 1. Clone the Repository

Clone the project repository to your local machine:

```bash
git@github.com:cassimHamisi/votesystem.git
cd votesystem

### 2. Set Up the MySQL Database
 Create a Database:

  Open your MySQL command line or use a database management tool like phpMyAdmin or MySQL Workbench. Create a new database for the project. For example:
```
  CREATE DATABASE votesystem
  ```
  
###3. Import the Database File:

Locate the your-database-file.sql file in the project root directory. Import this file into your newly created database. You can do this using the MySQL command line:
```
  mysql -u your_username -p your_database_nam < votesystem.sql
  ```

### 4. Configure Database Connection

Edit the Configuration File:

Open the configuration file where database connection details are specified. This is usually named config.php, .env, or database.php. Update it with your database credentials:


```
<?php
$dbHost = 'localhost'; // or your database host
$dbName = 'your_database_name';
$dbUser = 'your_username';
$dbPass = 'your_password';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
```
###5 . Start PhP sever:
```
php -S localhost:8000
```
