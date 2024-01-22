<?php


namespace common\enums;

interface LidsEnums
{

    public const WAITING = 1;

    public const ACTIVE = 10;

    public const INACTIVE = 0;

    public const SUCCESS = 7;

    public const MALE = 4;

    public const FEMALE = 5;

    public const LABELS = [
        self::WAITING => "Sinov darsida",
        self::ACTIVE => "Guruhga qo\shilgan",
        self::INACTIVE => "Muzlatilgan",
        self::SUCCESS => "Tugatgan",
        self::MALE => "Erkak",
        self::FEMALE => "Ayol",
    ];
}