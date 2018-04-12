<?php
function typeFormat($value, $type) {
    if($type == 'float' || $type == 'int') {
        if(!is_numeric($value)) return 0;
    }
    switch($type) {
        case 'int':
            $value = (int) $value;
        break;
        case 'float':
            $value = (float) $value;
        break;
        case 'bool':
            if($value != 'yes') $value = 'no';
        break;
    }
    return $value;
}