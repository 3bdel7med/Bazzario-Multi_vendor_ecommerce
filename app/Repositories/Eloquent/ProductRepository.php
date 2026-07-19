<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getActiveProducts(int $perPage = 15)
    {
        return $this->model->where('is_active', true)
                           ->where('stock', '>', 0)
                           ->latest()
                           ->paginate($perPage);
    }

    public function getProductsByVendor(int $vendorId, int $perPage = 15)
    {
        return $this->model->where('vendor_id', $vendorId)
                           ->latest()
                           ->paginate($perPage);
    }

    public function getAllProductsForAdmin(int $perPage = 15)
    {
        return $this->model->with('vendor')->latest()->paginate($perPage);
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }
}
