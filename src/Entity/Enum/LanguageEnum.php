<?php

namespace App\Entity\Enum;

enum LanguageEnum: int
{
    case PORTUGUESE = 1;
    case SPANISH = 2;
    case ENGLISH = 3;

    public static function getOptions():array
    {
        return [
            'Português' => self::PORTUGUESE->value,
            'Espanhol' => self::SPANISH->value,
            'Inglês' => self::ENGLISH->value,
        ];
    }
}