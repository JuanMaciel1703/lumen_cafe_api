<?php

use Illuminate\Database\Seeder;

class ProductHasImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxNumberOfImages = 5;

        $images = \App\Image::all();
        $products = \App\Product::all();

        foreach ($products as $product) {
            if (count($product->images)) {
                continue;
            }

            $numberOfImages = rand(1, $maxNumberOfImages);

            for ($imageCount = 1; $imageCount <= $numberOfImages; $imageCount++) {
                $randomIndex = array_rand($images->toArray());
                $randomImage = $images->get($randomIndex);
                
                $product->images()->save($randomImage);
            }
        }
    }
}
