<?php

namespace App\Enums\PowerGridDemo;

enum Diet: int
{
    case ALL = 0;
    case VEGAN = 1;
    case CELIAC = 2;

    public function labels(): string
    {
        return match ($this) {
            self::ALL => '🍽️ All diets',
            self::VEGAN => '🌱 Suitable for Vegans',
            self::CELIAC => '🥜 Suitable for Celiacs',
        };
    }

    // Returns labels for PowerGrid Select Filter
    public function labelPowergridFilter(): string
    {
        return $this->labels();
    }
}
