<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pages/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Route for new registration
$route['register-customer'] = 'users/register';
$route['register-restaurant'] = 'users/register';

//Route for login
$route['login'] = 'users/login';

//Route for logout
$route['logout'] = 'users/logout';

//Route to page where a returant can add new menu items.
$route['menu_items/create'] = 'menu_items/create';

//Route for ajax search of menu items
$route['menu_items/search'] = 'menu_items/search';

//Route to display list of menu items
$route['menu_items'] = 'menu_items/index';

//Route to display list of menu items
$route['menu_items/index'] = 'menu_items/index';

//Route for displaying a particular menu item with a given id
$route['menu_items/(:any)'] = 'menu_items/view/$1';

//Route to checkout page after clicking on Buy Now button
$route['orders/(:any)'] = 'orders/index/$1';

//Route to make payment and place order
$route['place-order'] = 'orders/place_order';

//Route to show order history of customer
$route['order-history'] = 'orders/history';

//Route to show orders taken by a restaurant
$route['view-orders'] = 'orders/view_orders';

//Route to view the static pages: Home and About
$route['(:any)'] = 'pages/view/$1';
