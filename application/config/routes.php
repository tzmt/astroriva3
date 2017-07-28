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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
$route['astrologer-details/(:num)/(:any)'] = 'astrologer_details/index/$1';
$route['astrologer-details/(:any)/(:any)/products'] = 'astrologer_details/show_products/$1';
$route['astrologer-details/(:any)/(:any)/products/(:any)/(:any)'] = 'astrologer_details/product_details/$1';

$route['astrology/branches/list'] = 'astrology/branches';
$route['astrology/branches/(:any)/details'] = 'astrology/branches_details/$1;';

$route['astrology/(:any)'] = 'astrology/index/$1';
$route['astrology/(:any)/(:any)'] = 'astrology/index/$1';
$route['astrology/(:any)/(:any)/(:any)'] = 'astrology/index/$1';

$route['astrology-video-class'] = 'astrology/video_class/';
$route['astrologer/list-astrologer/(:any)'] = 'astrologer_list/list_astrologer/$1';
$route['astrologer-details/appointment/(:any)'] ='astrologer_details/appointment/$1';

$route['ayurved'] = 'astrology/ayurved';
$route['ayurved/details/(:any)'] = 'astrology/ayurved_details/$1';
$route['yoga'] = 'astrology/yoga';
$route['yoga/details/(:any)'] = 'astrology/yoga_details/$1';
$route['shiksha'] = 'astrology/shiksha';
$route['astrology/getDetailsAboutYou'] = 'astrology/getDetailsAboutYou';

$route['services'] = 'astrology/services';
$route['services/(:num)/(:any)'] = 'astrology/services_details/$1/$2';

$route['astrologyajax/getajaxrashi'] = 'astrology/getajaxrashi';

$route['shop/(:num)'] = 'shop/index/$1';

$route['astrologer/search'] = 'astrologer_list/search';
