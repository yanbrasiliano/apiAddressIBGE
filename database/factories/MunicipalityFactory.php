<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MunicipalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'district' => 'Serrinha',
            'name' => 'Araci',
            'id_ibge' => '2902104',
						'id_city' =>'29016' ,
                      
        ];
    }
}
