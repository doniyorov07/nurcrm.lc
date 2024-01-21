<?php


namespace common\enums;

interface DaysEnums
{
    public const ODD_DAYS = 1;
    public const EVEN_DAYS = 2;

    public const LABELS = [
        self::ODD_DAYS => "Toq kunlar",
        self::EVEN_DAYS => "Juft kunlar",
    ];

    public const COLOR = [
        self::ODD_DAYS => '<i class="badge badge-success">Faol</i>',
        self::EVEN_DAYS => '<i class="badge badge-danger">Faol dssads</i>',
    ];
}