<?php


namespace common\enums;

interface StatusEnums
{
    public const ACTIVE = 1;
    public const INACTIVE = 0;

    public const LABELS = [
        self::ACTIVE => "Faol",
        self::INACTIVE => "No-Faol",
    ];

    public const COLOR = [
        self::ACTIVE => '<i class="badge badge-success">Faol</i>',
        self::INACTIVE => '<i class="badge badge-danger">Faol dssads</i>',
    ];
}