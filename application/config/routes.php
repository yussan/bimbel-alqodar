<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */

$route['default_controller'] = 'home';
$route['404_override'] = 'error';
// autentikasi
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['forgot'] = 'auth/forgot_password';
$route['change_password'] = 'auth/change_password';
$route['me'] = 'auth/me';

require_once( BASEPATH . 'database/DB' . EXT );
$db = & DB();
//untuk posts/artikel
$q1 = 'SELECT kategori_artikel.slug as slug_kategori, artikel.slug as slug_artikel 
	FROM artikel
	JOIN kategori_artikel ON kategori_artikel.id_kategori = artikel.id_kategori';
$query1 = $db->query($q1);
$posts = $query1->result();
foreach ($posts as $row_p) {
    $route['^.*\b(' . $row_p->slug_kategori . '/' . $row_p->slug_artikel . ')\b.*$'] = 'posts';
}
//untuk kategori post/artikel
$query2 = $db->get('kategori_artikel');
$categories = $query2->result();
foreach ($categories as $row_c) {
    $route[$row_c->slug] = 'categories';
}
//untuk halaman statis/about us dll
$query3 = $db->get('halaman');
$pages = $query3->result();
foreach ($pages as $row_pg) {
    $route[$row_pg->slug] = 'pages';
}

//untuk album
$query3 = $db->get('album');
$albums = $query3->result();
foreach ($albums as $row_a) {
    $route['^.*\b(' . "album" . '/' . $row_a->slug . ')\b.*$'] = 'galeri';
}

//Detail Publikasi
$sql = "
SELECT 
  pub_slug AS SLUG_KATEGORI,
  slug AS SLUG_PUBLIKASI
FROM
  publikasi 
  JOIN kategori_publikasi USING (id_kat_publikasi)    
";
$pub = $db->query($sql)->result();
foreach ($pub as $r) {
    $route['^.*\b(' . $r->SLUG_KATEGORI . '/' . $r->SLUG_PUBLIKASI . ')\b.*$'] = 'detail_pub';
}

// Kategori Publikasi
$sql = "SELECT * FROM kategori_publikasi ORDER BY pub_kategori ASC";
$kat_pub = $db->query($sql)->result();
foreach ($kat_pub as $row_pub) {
    $route[$row_pub->pub_slug] = 'pub';
}
/* End of file routes.php */
/* Location: ./application/config/routes.php */