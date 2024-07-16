<?php

namespace App\Utils;
trait StringFormatter
{
    public static function displayStars($rating): string
    {
        $fullStar = '★';
        $emptyStar = '☆';
        $maxStars = 5;

        return str_repeat($fullStar, $rating) . str_repeat($emptyStar, $maxStars - $rating);
    }


    public static function formatPhoneNumber($phoneNumber): string
    {
        return trim(chunk_split($phoneNumber, 2, ' '));
    }

}