

# Laravel 12 + Inertia.js + Vue 3 Setup Guide

This guide explains how to create a **Laravel 12 project** with **Inertia.js** and **Vue 3**, along with TailwindCSS, Element Plus, and other useful packages.

---

step 1 create project laravel inertia vue3

command : composer create-project laravel/laravel laravel12-inertia-vue


step2 

 composer require laravel/jetstream
 php artisan jetstream:install inertia

or 

composer require laravel/breeze --dev
php artisan breeze:install vue



step3   fix for work with tailwandcss

using command: npm install -D @tailwindcss/typography

-> in tailwandcss.config.js 
 plugins: [
        forms, typography,
        require('@tailwindcss/typography')
    ],



step4 config in .env 

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=postApp-db
DB_USERNAME=root
DB_PASSWORD=

then using command: php artisan migrate




