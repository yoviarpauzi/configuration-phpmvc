<?php

namespace App\Controller;

class HomeController
{
    public function index()
    {
        $model = [
            'title' => "Belajar PHP MVC",
            'content' => "Selamat Belajar"
        ];
        echo "HomeController Index";
    }
}