<?php
/**
 * @package Web Cupón
 */
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
/**********************************************************/
/**********************************************************/
if ( !is_admin() ) {
	// Conexión a DB
	global $table_prefix;
	$dbh = new wpdb( DB_USER, DB_PASSWORD, DB_NAME, DB_HOST );
	$table = $table_prefix.'options';
	$query_image = "SELECT option_value FROM $table WHERE option_name = 'wp_api_image'";
	$res_image = $dbh->get_results( $query_image ); 
   
   // API Web Cupón
   wp_register_script ('webcupon','http://code.webcupon.es/'.$res_image[0]->option_value,array('jquery'),'1.2.1',true);
   wp_enqueue_script('webcupon');
   
   // CSS plugin
   wp_register_style('webcupon',plugins_url().'/webcupon/css/estilo.css',false, '1.2.1', false, array('all'));
   wp_enqueue_style('webcupon');
}
/**********************************************************/
/**********************************************************/

class webcupon_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'webcupon_widget',
			__( 'Web Cupón CON imagen' ),
			array( 'description' => __( 'Cupones de Descuento ilimitados en tu WordPress con imagen visible.' ) )
		);

		if ( is_active_widget( false, false, $this->id_base ) ) {
			add_action( 'wp_head', array( $this, 'css' ) );
		}
	}

	function css() {
    // CSS
	}

	function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance['title'] );
		}
		else {
			$title = __( '' );
		}
?>
<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>
<?php 
	}

	function update( $new_instance, $old_instance ) {
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}

	function widget( $args, $instance ) {
		$count = get_option( 'webcupon_widget' );

		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'];
			echo esc_html( $instance['title'] );
			echo $args['after_title'];
		}
?>
<!-- webcupon --><div id="cupon"><h4><div class="Titulo"></div></h4><table class="ctable"><thead><tr><th class="th"><?php echo __( 'Precio', 'webcupon' ); ?></th><th class="th"><?php echo __( 'DTO', 'webcupon' ); ?></th><th class="th"><?php echo __( 'Antes', 'webcupon' ); ?></th></tr></thead><tbody><tr><td class="td"><span class="PvOferta"></span> €</td><td class="td"><span class="PvDto"></span> %</td><td class="td"><del><span class="PvReal"></span></del> €</td></tr></tbody></table><div class="DescripcionIMG"></div><div class="DescripcionOfer"></div><h5 class="h5"><?php echo __( 'Imprima su Cupón', 'webcupon' ); ?></h5><form action="http://www.webcupon.es/su-descuento/print.php" method="post" id="form1"><div class="linea"><label for="Nombre"><?php echo __( 'Nombre', 'webcupon' ); ?></label><input name="Nombre" class="campo" type="text" value="" required></div><div class="linea"><label for="Apellidos"><?php echo __( 'Apellidos', 'webcupon' ); ?></label><input name="Apellidos" class="campo" type="text" value="" required></div><div class="linea"><input name="Condiciones" type="checkbox" id="Condiciones" value="<?php echo __( 'Acepto', 'webcupon' ); ?>" checked="CHECKED" required> <?php echo __( 'Acepto la política de privacidad', 'webcupon' ); ?></div><p class="small"><?php echo __( 'Sus datos no se almacenan en ningún soporte telemático. Más información en el Cupón.', 'webcupon' ); ?></p><input type="submit" value="<?php echo __( 'Imprimir Ahora!', 'webcupon' ); ?>"><input name='img' type='hidden' id='img'><input name="NombreComercial" type="hidden" id="NombreComercial"><input name="CodigoCampa" type="hidden" id="CodigoCampa"><input name="FechaIni" type="hidden" id="FechaIni"><input name="FechaFin" type="hidden" id="FechaFin"><input name="Titulo" type="hidden" id="Titulo"><input name="DescripcionOfer" type="hidden" id="DescripcionOfer"><input name="DescripcionIMG" type="hidden" id="DescripcionIMG"><input name="PvReal" type="hidden" id="PvReal"><input name="PvDto" type="hidden" id="PvDto"><input name="PvOferta" type="hidden" id="PvOferta"><input name="Direccion" type="hidden" id="Direccion"><input name="Telf" type="hidden" id="Telf"><input name="duracion" type="hidden" id="duracion"><input name="admision" type="hidden" id="admision"></form></div><!-- /webcupon -->
<?php
		echo $args['after_widget'];
	}
}

function webcupon_register_widgets() {
	register_widget( 'webcupon_widget' );
}

add_action( 'widgets_init', 'webcupon_register_widgets' );