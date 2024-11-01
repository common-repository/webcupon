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

// Map
function shortcode_webcuponmap() {
	return '<iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps/ms?msa=0&amp;msid=207503059902635759519.0004c727873ce53d8637b&amp;hl=es&amp;ie=UTF8&amp;t=m&amp;ll=40.229218,-3.581543&amp;spn=8.050292,14.0625&amp;z=6&amp;output=embed"></iframe>';
}
add_shortcode('webcuponmap', 'shortcode_webcuponmap');

function wp_webcupon_map() { ?>
<?php
} // Map
?>