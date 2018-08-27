<?php
/**
 * Created by PhpStorm.
 * User: home
 * Date: 8/27/2018
 * Time: 10:03 PM
 */

namespace CodingExercise\Model\Object;


class Currency extends \SplEnum
{
    const __default = 'EUR';
    const EUR = 'EUR';
    const USD = 'USD';
    const GBP = 'GBP';
}