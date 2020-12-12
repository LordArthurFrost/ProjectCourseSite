<?php


class SiteHeadInfo
{
    private static $icon = "site_logo.svg";


    public static function getIcon(): string
    {
        return self::$icon;
    }


}