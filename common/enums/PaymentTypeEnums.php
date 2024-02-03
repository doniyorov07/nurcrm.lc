<?php


namespace common\enums;

interface PaymentTypeEnums
{

    public const CASH = 1;

    public const CLICK = 2;

    public const BANK = 3;


    public const LABELS = [
        self::CASH => "Naqd pul",
        self::CLICK => "Click",
        self::BANK => "Bank hisobi",
    ];
}