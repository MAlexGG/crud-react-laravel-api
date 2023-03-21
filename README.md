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
![Crud-React-UI](https://user-images.githubusercontent.com/73828751/147887251-cc96092e-6ebf-47d1-974d-61814f38b6e4.jpg)

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
