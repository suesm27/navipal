<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "main/show_home";
$route['404_override'] = '';
$route['home'] = "main/show_home";
$route['guide_dashboard'] = 'guides/show_guide_dashboard/$1';

//end of routes.php