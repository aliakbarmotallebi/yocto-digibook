<?php
namespace App\Contracts;


interface AuthInterfacce
{
    /**
     * @param $user
     * @param bool $remember
     * @return mixed
     */
    public static function login($user);

    /**
     * @return mixed
     */
    public static function check();

    /**
     * @return mixed
     */
    public static function logout();

    /**
     * @return mixed
     */
    public static function user();
}