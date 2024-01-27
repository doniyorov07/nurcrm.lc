<?php

function env($key, $default = null)
{
    if (isset($_ENV[$key])) {
        return $_ENV[$key];
    } elseif (isset($_SERVER[$key])) {
        return $_SERVER[$key];
    }

    return $default;
}

if (!function_exists('icon')) {
    function icon($name = null, $options = [])
    {
        $icon = 'ri';
        $type = 'line';

        if (isset($options['icon'])) {
            $icon = $options['icon'];
        }

        if (isset($options['type'])) {
            $type = $options['type'];
        }

        $name = $icon . '-' . $name . '-' . $type;

        if (isset($options['class'])) {
            $name .= ' ' . $options['class'];
        }

        $options['class'] = $name;

        return \yii\helpers\Html::tag('i', '', $options);
    }
}