<?php
/**
 * Created by PhpStorm.
 * User: Niek
 * Date: 3-11-2018
 * Time: 23:06
 */

namespace App;


use ReflectionClass;

class UserRole
{
    const NORMAL = 1;
    const MODERATOR = 2;

    static function getRoles() {
        $oClass = new ReflectionClass(__CLASS__);
        return array_flip($oClass->getConstants());
    }
}