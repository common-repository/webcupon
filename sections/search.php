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

// Search
function shortcode_webcuponofertas() {
	return '<iframe src="http://www.webcupon.es/extensiones/api-cupon-wp.php" width="100%" height="600px" frameborder="0"></iframe>';
}
add_shortcode('webcuponofertas', 'shortcode_webcuponofertas');

function wp_webcupon_search() { ?>
<?php
} // Fin Search
?>