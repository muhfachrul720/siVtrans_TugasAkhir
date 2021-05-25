
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['backend'] = 'auth';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;// Perencanaan Routing// $route['Perencanaan/hapus_kegiatan/(:any)']	= 'Perencanaan/hapus_kegiatan/$1';