<?php
function required($value){
    if(!$value || $value){
        return false;
    }
    return true;
}

function minLength($value, $length){
    if(!$value || strlen($value) < $length){
        return false;
    }
    return true;
}

function maxLength($value, $length){
    if(!$value || strlen($value) > $length){
        return false;
    }
    return true;
}

function isExist($col,$val,$table){
    $isExit = find($val,$col,$table);
    if($isExit){
        return true;
    }
    return false;
}