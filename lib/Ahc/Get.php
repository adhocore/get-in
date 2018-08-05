<?php

/*
 * This file is part of the GET-IN package.
 *
 * (c) Jitendra Adhikari <jiten.adhikary@gmail.com>
 *     <https://github.com/adhocore>
 *
 * Licensed under MIT license.
 */

namespace Ahc;

/**
 * GetIn - Handy Traversal of chained objects with error trap and default value.
 *
 * GetIn is generally suited for View like echo \Ahc\Get::in($object, 'getThis.getThat', 'default value')
 * But, it can be used in anyway you see fit provided the expected and default values are of similar type
 *
 * @author Jitendra Adhikari | adhocore <jiten.adhikary@gmail.com>
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
class Get
{
    public static function in($object, $methods, $default = null)
    {
        is_array($methods) or $methods = explode('.', $methods);
        while (is_object($object) and count($methods)) {
            if (!method_exists($object, $method = array_shift($methods))) {
                return $default;
            }

            $object = $object->$method();
        }

        return is_null($object) ? $default : $object;
    }
}
