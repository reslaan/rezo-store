<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  factory(\App\Models\Product::class,20)->create();

      Product::create([
        'id' => 1,
        'name' => 'American fried rice',
        'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'short_description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
        'price' => 11.0,
        'selling_price' => 11.0,
        'qty' => 11,
        'slug' => 'American-fried',
        'sku' => 's45ese',
        'manage_stock' => false,
        'in_stock' => true,
        'is_active' => true,
        'brand_id' => 1,
        'created_at' => '2019-08-30 12:21:43',
        'updated_at' => '2019-09-03 22:58:30',
      ]);
      Product::create([
        'id' => 2,
        'name' => 'Calas',
        'price' => 15.0,
        'selling_price' => 15.0,
       // 'description' => 'Calas are dumplings composed primarily of cooked rice, yeast, sugar, eggs, and flour; the resulting batter is deep-fried. It is traditionally a breakfast dish, served with coffee or cafe au lait, and has a mention in most Creole cuisine cookbooks.',
        'short_description' => 'Calas are dumplings composed primarily of cooked rice, yeast, sugar, eggs, and flour; the resulting batter is deep-fried. It is traditionally a breakfast dish, served with coffee or cafe au lait, and has a mention in most Creole cuisine cookbooks.',
        'slug' => 'American-fried-rice',
        'qty' => 11,
        'sku' => '434fsf',
        'manage_stock' => false,
        'in_stock' => true,
        'is_active' => true,
        'brand_id' => 1,
        'created_at' => '2019-08-31 13:03:37',
        'updated_at' => '2019-08-31 13:36:16',
      ]);
      Product::create([
        'id' => 3,
        'name' => 'Pizza Margherita',
        'price' => 8.0,
        'selling_price' => 8.0,
       // 'description' => 'Tomato sauce, Firm mozzarella cheese, grated. Fresh soft mozzarella cheese, separated into small clumps. Fontina cheese, grated. Parmesan cheese, grated.',
        'short_description' => 'Tomato sauce, Firm mozzarella cheese, grated. Fresh soft mozzarella cheese, separated into small clumps. Fontina cheese, grated. Parmesan cheese, grated.',
        'slug' => 'American',
        'qty' => 11,
        'sku' => 'er234',
        'manage_stock' => false,
        'in_stock' => true,
        'is_active' => true,
        'brand_id' => 1,
        'created_at' => '2019-10-17 23:06:51',
        'updated_at' => '2019-10-17 23:06:51',
      ]);
      Product::create([
        'id' => 4,
        'name' => 'Pizza Montanara',
        'price' => 6.2,
        'selling_price' => 8.0,
        //'description' => 'Tomato sauce, mozzarella, mushrooms, pepperoni, and Stracchino (soft cheese)',
        'short_description' => 'Tomato sauce, mozzarella, mushrooms, pepperoni, and Stracchino (soft cheese)',
        'slug' => 'Americ',
        'qty' => 11,
        'sku' => 'be565',
        'manage_stock' => false,
        'in_stock' => true,
        'is_active' => true,
        'brand_id' => 1,
        'created_at' => '2019-10-18 10:09:53',
        'updated_at' => '2019-10-18 10:12:15',
      ]);


    }
}
