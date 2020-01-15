<?php
function Autoloader($classname) {
    require_once '../classes/'.$classname.'.php';
}

function output_errors($errors) {
    return implode('<br/>', $errors);
}