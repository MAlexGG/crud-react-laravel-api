Working with Authorization and Authentication
============

## Table of Contents
1. [General Info](#general-info)
2. [Technologies](#technologies)
3. [Installation](#installation)

***
## General Info

This is a website for pedagogical purposes for fullstack bootcamp students, it's a PHP API with auth and tokens that makes a simple CRUD, the back repo: https://github.com/MAlexGG/crud-react-laravel-api-front.git

### UI Design

<img width="576" alt="crud" src="https://user-images.githubusercontent.com/73828751/226593718-88fe7dbc-6424-4fb8-87ba-d6e2aecfbd19.png">

## Technologies
It was developed with PHP Laravel, with storage link and sanctum, the UI was designed in Figma. 

## Installation
- Required PHP v.8
- Required Laravel v.8
- git clone <repository>
- composer install
- composer require laravel/sanctum
- composer require aprendible/storage-link-route
- run to create storge link: http://127.0.0.1:8000/storage-link
- composer remove aprendible/storage-link-route
- php artisan serve
