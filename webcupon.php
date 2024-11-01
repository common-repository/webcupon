<?php
/**
 * @package Web Cupón
 */
/*
Plugin Name: Web Cupón
Plugin URI: http://www.ibermega.com/plugins/webcupon/
Description: Si es suscriptor de <strong>Web Cupón</strong> instale este plugin e inserte su ID API en el campo correspondiente para mostrar sus Cupones de Descuento. Si no es suscriptor, puede serlo inscribiéndose en nuestra web en <a href="http://comercial.webcupon.es" target="_blank">Comercial Web Cupón</a>. Si quiere saber más sobre que es <strong>Web Cupón</strong>, visite: <a href="http://www.webcupon.es" target="_blank">www.webcupon.es</a>.
Version: 1.3
Author: IBERMEGA digital
Author URI: http://www.ibermega.com
License: GPLv2
*/
/*
  Copyright 2013 IBERMEGA digital (email : soporte@ibermega.com)

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
add_action('wp_enqueue_scripts','wp_webcupon_home');

function wp_webcupon_home(){
    if(is_home()){
	global $table_prefix;
	$dbh = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
	$table = $table_prefix.'options';
	$query_image = "SELECT option_value FROM $table WHERE option_name = 'wp_api_image'";
	$res_image = $dbh->get_results( $query_image );
    }
}	
?>
<?php
 // Internacionalización
 load_plugin_textdomain('wp_webcupon',false,
 plugin_basename( dirname( __FILE__ ) .'/lang' ));
 
// Menú y submenú
add_action('admin_menu', 'wp_webcupon'); {
function wp_webcupon() {
// Menú primer nivel
add_menu_page('Web Cupón Plugin', 'Web Cupón',
   'manage_options', 'wp_webcupon', 'wp_webcupon_options', 
   plugins_url( '/images/icocupon.png', __FILE__));
// Submenus
add_submenu_page('wp_webcupon', 'Web Cupón', 'Información', 'manage_options', 'wp_webcupon_info', 'wp_webcupon_info' );			  
}}

// Opción ID API
function wp_webcupon_options() {

    if (!current_user_can('manage_options'))
    {
        wp_die( __('Es necesario insertar su ID API.') );
    }

    $opt_name = 'wp_api_image';
    $hidden_field_name = 'wp_api_image_hidden';
    $data_field_name = 'wp_api_image';
    $opt_val = get_option( $opt_name );

    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'ruta_hidden') {
        $opt_val = $_POST[ $data_field_name ];
        update_option( $opt_name, $opt_val );
        ?>
    <div class="updated">
      <p><strong><?php _e('Configuración guardada.', 'webcupon' ); ?></strong></p>
    </div>
   <?php
    }
    echo '<div class="wrap">';
	?>
    <div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
    <img src='<?php echo plugins_url('/images/logo-wp-webcupon.png', __FILE__ ); ?>' width="100%" />
    </div>
	<?php
	echo "<h2>" . __( 'Configuración', 'webcupon' ) . "</h2>";
	echo "<p>" . __( 'Inserte su código ID API en el siguiente campo para activar su Cupón de Descuento en WordPress.', 'webcupon' ) . "</p>";
   ?>
  <form name="form1" method="post" action="">
    <input type="hidden" name="<?php echo $hidden_field_name; ?>" value="ruta_hidden">
    <span style="font-size:16px"><?php __("ID API: ", 'webcupon' ); ?></span>
    <input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" style="padding:10px; font-size:18px;" size="45">
    <p class="submit">
    <input type="submit" class="button button-primary" name="Submit" value="<?php esc_attr_e('Save Changes') ?>" />
    </p>
  </form>
  <div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
  <?php echo "<p><strong>" . __( '¿No tiene un ID API? Sepa más y consigua uno ahora! <a href="?page=wp_webcupon_info">Conseguir uno ahora</a>', 'webcupon' ) . "</p></strong>"; ?>
  
  <?php echo "<p><strong>" . __( 'Inserte uno de los dos Widgets donde mejor se adapte a su tema <a href="widgets.php">Agregar Widget</a>', 'webcupon' ) . "</p></strong>"; ?>
  </div>
  
  <?php echo "<h3>" . __( 'Opcional.- <small>Crea una nueva página o entrada e inserte los códigos siguientes, según la opción que desee.<br><em>Al instalar el plugin, se ha creado dos nuevas páginas automáticamente.</em></small>', 'webcupon' ) . "</h3>"; ?>
  <div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
  <?php echo "<h3>" . __( 'Listado de Ofertas', 'webcupon' ) . "</h3>"; ?>
   <?php echo "<p>" . __( 'Puede opcionalmente mostrar un listado completo de todas las ofertas de Web Cupón con búsqueda automática sin cambiar de página por precios, descuentos, productos, servicios, ciudades, províncias, países, direcciones, etc.', 'webcupon' ) . "</p>"; ?>
   <p><strong>Shortcode:</strong> <code>[webcuponofertas]</code></p>
   <p><strong>PHP:</strong> <code>&lt;?php echo do_shortcode('[webcuponofertas]');?&gt;</code></p>
  
  <hr size="1" style="border-bottom-color:#e5e5e5">
  
  <?php echo "<h3>" . __( 'Mapa de ofertas', 'webcupon' ) . "</h3>"; ?>
   <?php echo "<p>" . __( 'Puede completar el listado de antes o, simplemente añadir Web Cupón Map en su web. Un completo mapa de todas las ofertas de Web Cupón a través de Google Map.', 'webcupon' ) . "</p>"; ?>
   <p><strong>Shortcode:</strong> <code>[webcuponmap]</code></p>
   <p><strong>PHP:</strong> <code>&lt;?php echo do_shortcode('[webcuponmap]');?&gt;</code></p>
  </div>
  
  </div>
<?php
}
// Páginas
include_once dirname( __FILE__ ) . '/sections/search.php';
include_once dirname( __FILE__ ) . '/sections/map.php';
include_once dirname( __FILE__ ) . '/sections/info.php';
// Widgets
include_once dirname( __FILE__ ) . '/widget.php';
include_once dirname( __FILE__ ) . '/widget-noimage.php';
// Agregar dos nuevas páginas
include_once dirname( __FILE__ ) . '/sections/paginas.php';