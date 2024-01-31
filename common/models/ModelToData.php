<?php


namespace common\models;

use common\enums\LidsEnums;
use yii\helpers\ArrayHelper;

class ModelToData
{

        public static function getCourse(): array
        {
            return ArrayHelper::map(
                    Course::find()->all(),
                    'id',
                    'name',
            );
        }

        public static function getGroup(): array
        {
            return ArrayHelper::map(
                Group::find()->all(),
                'id',
                function ($model) {
                    return $model->group_name . ' ( '. $model->course->name .') ' . ' [' . $model->hour . ']' ;
                }
            );
        }

        public static function getDays(): array
        {
            return [
                'dushanba' => 'dushanba',
                'seshanba' => 'seshanba',
                'chorshanba' => 'chorshanba',
                'payshanba' => 'payshanba',
                'juma' => 'juma',
                'shanba' => 'shanba',
                'yakshanba' => 'yakshanba',
            ];
        }

        public static function getTeacher()
        {
            return ArrayHelper::map(
                Teacher::find()->all(),
                'id',
                'full_name',
            );
        }























    public static function getHour(): array
    {
        return ArrayHelper::map(
            [
                '6:00' => ['time' => '6:00'],
                '6:30' => ['time' => '6:30'],
                '7:00' => ['time' => '7:00'],
                '7:30' => ['time' => '7:00'],
                '8:00' => ['time' => '8:00'],
                '8:30' => ['time' => '8:30'],
                '9:00' => ['time' => '9:00'],
                '9:30' => ['time' => '9:30'],
                '10:00' => ['time' => '10:00'],
                '10:30' => ['time' => '10:30'],
                '11:00' => ['time' => '11:00'],
                '11:30' => ['time' => '11:30'],
                '12:00' => ['time' => '12:00'],
                '12:30' => ['time' => '12:30'],
                '13:00' => ['time' => '13:00'],
                '13:30' => ['time' => '13:30'],
                '14:00' => ['time' => '14:00'],
                '14:30' => ['time' => '14:30'],
                '15:00' => ['time' => '15:00'],
                '15:30' => ['time' => '15:30'],
                '16:00' => ['time' => '16:00'],
                '16:30' => ['time' => '16:30'],
                '17:00' => ['time' => '17:00'],
                '17:30' => ['time' => '17:30'],
                '18:00' => ['time' => '18:00'],
                '18:30' => ['time' => '18:30'],
                '19:00' => ['time' => '19:00'],
                '19:30' => ['time' => '19:30'],
                '20:00' => ['time' => '20:00'],
                '20:30' => ['time' => '20:30'],
            ],
            function ($item) {
                return $item['time'];
            },
            'time'
        );
    }
}