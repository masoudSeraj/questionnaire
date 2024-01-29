<?php

namespace App\Enums;

enum Code: int
{
    case A = 0;

    case B = 1;

    case C = 2;

    case D = 3;

    public function translate(): string
    {
        return match ($this) {
            Code::A => 'الف',
            Code::B => 'ب',
            Code::C => 'ج',
            Code::D => 'د',
        };
    }
}
