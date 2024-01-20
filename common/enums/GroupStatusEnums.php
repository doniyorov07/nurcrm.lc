<?php


namespace common\enums;

interface GroupStatusEnums
{

    public const WAITING = 1;

    public const ACTIVE = 10;

    public const INACTIVE = 0;


    public const LABELS = [
        self::WAITING => "Guruh yig'ilyapti",
        self::ACTIVE => "Guruh faol",
        self::INACTIVE => "Guruh yopilgan",
    ];
}