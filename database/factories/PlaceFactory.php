<?php

namespace Database\Factories;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Place>
 */
class PlaceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $picturesFolder = 'pictures';
        $castlePictures = array_diff(scandir($picturesFolder), ['.', '..']);
        $images = array_filter($castlePictures, function ($file) {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $allowedExtensions = ['jpg', 'jpeg', 'png'];
            return in_array($extension, $allowedExtensions);
        });
        $randomImageFile = $images[array_rand($images)];
        $randomImagePath = $picturesFolder . '/' . $randomImageFile;

        $fakeUploadedFile = new UploadedFile(
            $randomImagePath,
            basename($randomImagePath),
            mime_content_type($randomImagePath),
            filesize($randomImagePath),
            0,
        );
        $path = $fakeUploadedFile->store();


        return [
            //random location name
            'name' => fake()->city(),
            'picture' => $randomImageFile,
            'picture_hash' => $path,
        ];
    }
}
