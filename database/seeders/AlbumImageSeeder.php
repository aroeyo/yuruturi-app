<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Storage;

class AlbumImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $imageFiles = range(1, 35);

    foreach (range(1, 120) as $index) {
        // 画像ファイルをランダムに選ぶ
        $imageFile = $faker->randomElement($imageFiles) . '.jpg';

        // 画像ファイルを storage/app/public/images にコピー
        $imagePath = 'images/' . $imageFile;

        // 実際の画像をストレージに保存
        Storage::disk('public')->put($imagePath, file_get_contents(public_path('images/' . $imageFile)));

        DB::table('albumimages')->insert([
            'species_id' => $faker->randomElement([1, 3]),
            'lure_id' => $faker->randomElement([1, 3]),
            'location_id' => $faker->randomElement([1, 3]),
            'user_id' => 1,
            'image_file' => $imagePath, // 実際の画像パス
            'size' => $faker->numberBetween(10, 100),
            'catchtime' => $faker->dateTimeBetween('-1 year', 'now'),
            'notes' => $faker->optional()->sentence(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        }
    }
}
