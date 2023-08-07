<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Config\Router;
use App\Controller\HomeController;
use App\Controller\ProductController;

Router::add("GET", "/", HomeController::class, "index");
Router::add("GET", "/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)", ProductController::class, "categories");

Router::run();