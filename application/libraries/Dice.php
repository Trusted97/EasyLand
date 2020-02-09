<?php

require_once(APPPATH.'libraries/Calc.php');
require_once(APPPATH.'libraries/CalcSet.php');
require_once(APPPATH.'libraries/CalcDice.php');
require_once(APPPATH.'libraries/CalcOperation.php');
require_once(APPPATH.'libraries/Random.php');

/**
 *
 */
class Dice
{
    public function __construct()
    {
        $CI =& get_instance();
    }

    public function calc_dice($expression)
    {
        $calc = new Calc($expression);

        return $calc->infix()." => ".$calc();
    }
}
