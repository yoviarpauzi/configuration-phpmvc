<?php

namespace App\Controller;

class ProductController
{
    public function categories(string $productId, string $categoryId)
    {
        echo "Product $productId, Category $categoryId";
    }
}
?>