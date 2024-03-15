<?php

require 'vendor/autoload.php';

$availablesRoutes = 
['homepage',
];

$route = 'homepage';

if (isset($_GET['page']) && in_array($_GET['page'],$availablesRoutes)) {
    $route = $_GET['page'];
}
