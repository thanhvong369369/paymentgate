<?php

use Slim\Http\Request;
use Slim\Http\Response;

//prefix api url
$prefix_url = '/api/paymentgate/v1';

// Routes
// Homecontroller
$app->get($prefix_url.'/home', 'HomeController:index');
$app->post($prefix_url.'/home', 'HomeController:create');
$app->get($prefix_url.'/napas', 'HomeController:resultFromNapasDefault');
$app->post($prefix_url.'/napas', 'HomeController:resultFromNapas');