<?php
/* Copyright 2013 IBERMEGA digital (email : soporte@ibermega.com)

  This program is free software; you can redistribute it and/or
  modify it under the terms of the GNU General Public License
  as published by the Free Software Foundation; either version 2
  of the License, or (at your option) any later version.
  
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.
  
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

// Crear dos nuevas páginas para mostar Directorio y Mapa de Ofertas

global $wpdb;

$dashboard_check = get_page_by_title('Directorio de Ofertas');
$author_check = get_page_by_title('Mapa de Ofertas');
$dashboard_check_id = $dashboard_check ->ID;
$author_check_id = $author_check ->ID;
//Directorio
$dashboard_page = array(
    'post_type' => 'page',
    'post_name' => 'directorio-de-ofertas',
    'post_title' => 'Directorio de Ofertas',
	'post_content'  => '[webcuponofertas]',
    'post_status' => 'publish',
    'post_author' => 1,
	'comment_status' => 'closed',
    'ping_status'   => 'closed',
	'menu_order'   => 98,
    'post_category' => array(1),
);
//Mapa
$author_page = array(
    'post_type' => 'page',
    'post_name' => 'mapa-de-ofertas',
    'post_title' => 'Mapa de Ofertas',
	'post_content'  => '[webcuponmap]',
    'post_status' => 'publish',
    'post_author' => 1,
	'comment_status' => 'closed',
    'ping_status'   => 'closed',
	'menu_order'   => 99,
    'post_category' => array(1),
);
if(!isset($dashboard_check_id)){
    wp_insert_post($dashboard_page);
    $dashboard_page_data = get_page_by_title('Directorio de Ofertas');
    $dashboard_page_id = $dashboard_page_data ->ID;
    update_post_meta($dashboard_page_id, '_wp_page_template','dashboard.php');
}
if(!isset($author_check_id)){
    wp_insert_post($author_page);
    $author_page_data = get_page_by_title('Mapa de Ofertas');
    $author_page_id = $author_page_data ->ID;
    update_post_meta($author_page_id, '_wp_page_template','dashboard.php');
}