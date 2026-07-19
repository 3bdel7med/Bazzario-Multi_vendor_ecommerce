<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getActiveProducts(int $perPage = 15);

    public function getProductsByVendor(int $vendorId, int $perPage = 15);

    public function getAllProductsForAdmin(int $perPage = 15);

    public function store(array $data);
}
