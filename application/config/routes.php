<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// $route['pinjaman/delete/(:any)'] = 'pinjaman/delete_pinjaman/$1';
// $route['pinjaman/edit/(:any)'] = 'pinjaman/edit_pinjaman/$1';
$route['pinjaman/detail/(:any)'] = 'pinjaman/detail_pinjaman/$1';
$route['pinjaman/add'] = 'pinjaman/add_pinjaman';
$route['pinjaman'] = 'pinjaman/index';

$route['potongan/edit'] = 'potongan/edit_potongan';
$route['potongan'] = 'potongan/index';

$route['jabatan/delete/(:any)'] = 'jabatan/delete_jabatan/$1';
$route['jabatan/edit/(:any)'] = 'jabatan/edit_jabatan/$1';
$route['jabatan/detail/(:any)'] = 'jabatan/detail_jabatan/$1';
$route['jabatan/add'] = 'jabatan/add_jabatan';
$route['jabatan'] = 'jabatan/index';

$route['keluarga/edit/(:any)'] = 'keluarga/edit_keluarga/$1';
$route['keluarga/delete/(:any)'] = 'keluarga/delete_keluarga/$1';
$route['keluarga/detail/(:any)'] = 'keluarga/detail_keluarga/$1';
$route['keluarga'] = 'keluarga/index';

$route['tunjangan/edit'] = 'tunjangan/edit_tunjangan';
$route['tunjangan/delete/(:any)'] = 'tunjangan/delete_tunjangan/$1';
$route['tunjangan/detail/(:any)'] = 'tunjangan/detail_tunjangan/$1';
$route['tunjangan'] = 'tunjangan/index';

$route['honor/delete/(:any)'] = 'honor/delete_honor/$1';
$route['honor/detail/(:any)'] = 'honor/detail_honor/$1';
$route['honor'] = 'honor/index';

$route['pegawai/delete/(:any)'] = 'pegawai/delete_pegawai/$1';
$route['pegawai/edit/(:any)'] = 'pegawai/edit_pegawai/$1';
$route['pegawai/detail/(:any)'] = 'pegawai/detail_pegawai/$1';
$route['pegawai/add'] = 'pegawai/add_pegawai';
$route['pegawai'] = 'pegawai/index';
$route['login'] = 'users/index';
$route['default_controller'] = 'home/index';

$route['(:any)'] = 'home/index/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
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

