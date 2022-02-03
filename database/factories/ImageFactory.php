<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //indicamos direccion donde almacenara la imagen
            'url' => 'posts/' . $this->faker->image('public/storage/posts',640, 480, null, false)//ancho de la img y alto
        ];
    }
}
