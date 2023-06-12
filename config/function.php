<?php

function moneyFormat($str)
{
    return 'Rp. ' . number_format($str, '0', '', '.');
}

function redirect($value)
{
    header("Location:$value");
}
