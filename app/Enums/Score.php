<?php

namespace App\Enums;

enum Score: int
{
    case WEAK = 0;

    case MEDIUM = 25;

    case GOOD = 50;

    case GREAT = 100;
    public function translate(): string
    {
        return match ($this) {
            Score::WEAK => 'ضعیف',
            Score::MEDIUM => 'متوسط',
            Score::GOOD => 'خوب',
            Score::GREAT => 'عالی',
        };
    }
}
