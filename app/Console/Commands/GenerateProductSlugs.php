<?php

namespace App\Console\Commands;

use App\Model\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateProductSlugs extends Command
{
    protected $signature = 'products:generate-slugs';
    protected $description = 'Generate slugs for existing products';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $products = Product::whereNull('slug')->get();
        $count = 0;

        foreach ($products as $product) {
            $slug = Str::slug($product->product_name);
            $baseSlug = $slug;
            $counter = 1;

            while (Product::where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
                $slug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $product->slug = $slug;
            $product->save();
            $count++;
        }

        $this->info("Generated slugs for {$count} products.");
    }
}
