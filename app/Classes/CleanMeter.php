<?php

namespace App\Classes;

use App\Models\Dronie;
use Illuminate\Support\Facades\File;

class CleanMeter
{
    private $dronie;
    private $penalty = 0;
    private $cleanScore = 0;
    private $category = 'Unrated';

    public function setDronie(Dronie $dronie)
    {
        $this->dronie = $dronie;
    }

    public function getDronie()
    {
        return $this->dronie;
    }

    public function getRules()
    {
        $file = File::get(storage_path('app/clean-gang-rules.json'));

        return json_decode($file, true);
    }

    public function getPenalty()
    {
        // Caching this value so we don't have to calculate it every time
        if ($this->penalty != 0) {
            return $this->penalty;
        }

        $rules = self::getRules();

        // First we'll check the attributes
        foreach ($rules['attribute_rules'] as $attributeRule => $options) {
            foreach ($options as $option => $value) {
                if ($this->dronie->{$attributeRule} == $option) {
                    $this->penalty += $value;
                }
            }
        }

        // Then we'll check to see if the dronie has any combinations.
        foreach ($rules['combination_rules'] as $combinationRule) {
            
            $matched = true;

            foreach ($combinationRule['rules'] as $attribute => $value) {
                if ($this->dronie->{$attribute} != $value) {
                    $matched = false;
                }
            }

            if ($matched) {
                $this->penalty += $combinationRule['modifier'];
            }
        }

        return $this->penalty;
    }

    public function getCleanScore()
    {
        $this->cleanScore = 100;

        $this->cleanScore -= $this->getPenalty();

        return $this->cleanScore;
    }

    public function getCategory()
    {
        $categories = [
            81 => "NOT CLEAN",
            84 => "CLEAN ADJACENT",
            87 => "SUB CLEAN",
            89 => "SEMI CLEAN",
            91 => "CLEAN",
            93 => "PURE CLEAN",
            100 => "TRUE CLEAN" 
        ];

        foreach ($categories as $score => $category) {
            if ($this->getCleanScore() >= $score) {
                $this->category = $category;
            }
        }

        return $this->category;
    }
}