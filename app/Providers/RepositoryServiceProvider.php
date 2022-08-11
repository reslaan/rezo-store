<?php

namespace App\Providers;

use App\Models\Product;
use App\Contracts\TagContract;
use App\Contracts\BrandContract;
use App\Contracts\OrderContract;
use App\Contracts\ProductContract;
use App\Contracts\CategoryContract;
use App\Repositories\TagRepository;
use App\Contracts\AttributeContract;
use App\Repositories\BrandRepository;
use App\Repositories\OrderRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Repositories\AttributeRepository;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        CategoryContract::class       => CategoryRepository::class,
        AttributeContract::class      => AttributeRepository::class,
        BrandContract::class          => BrandRepository::class,
        TagContract::class            => TagRepository::class,
        ProductContract::class        => ProductRepository::class,
        OrderContract::class        => OrderRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $repository){
            $this->app->bind($interface,$repository);
        }

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
