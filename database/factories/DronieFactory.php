<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DronieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nft_id" => rand(1,10000),
            "token_hash" => Str::random(44),
            "url" => "https://howrare.is/dronies/8018",
            "token_link" => "https://explorer.solana.com/address/Dzdy4FCRe8UmhRorHPEMtH3StHJh8Lfb9FQqyVDtzQwE",
            "image" => "https://media.howrare.is/images/dronies/752841399779748f824c2cf03d9e2135.jpg",
            "rank" => rand(1,10000),
            "score" => rand(1,10000),
            "attribute_count" => 9,
            "color" => "Red",
            "background" => "Dark",
            "back_storage" => "None",
            "body" => "Type A",
            "body_texture" => "Explosion Markings",
            "chest_accessory" => "Body Armor",
            "head" => "Type A",
            "eyes" => "Half Scope",
            "mask" => "None",
            "beak" => "Crow",
            "hat" => "None",
            "wings" => "Type E",
            "elite_prototype" => "None",
            "sale_link" => null,
            "sale_price" => null,
            "total_votes" => rand(1,100),
            "clean_score" => "2.00",
        ];
    }
}
