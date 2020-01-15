<?php
require_once '../core/init.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Access-Control-Allow-Methods, Access-Control-Allow-Origin, Content-Type, Authorization: X-Requested-With');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id'])) {
            User::instance()->get_one();
        } else {
            User::instance()->get_all();
        }
    break;
    case 'POST':
        User::instance()->create();
    break;
    case 'PUT':
    case 'PATCH':
        User::instance()->update();
    break;
    case 'DELETE':
        User::instance()->delete();
    break;
    default:
    echo json_encode(array('Error' => 'You tried a request that is not supported by us'));
    break;
}