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

// Información
function wp_webcupon_info() { ?>
<div class="wrap">
<div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
    <img src='<?php echo plugins_url('../images/logo-wp-webcupon.png', __FILE__ ); ?>' width="100%" />
    </div>

  <h2><img src='<?php echo plugins_url('/images/icocupon.png', __FILE__ ); ?>' /> Información</h2>


<div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
  <a href="http://comercial.webcupon.es" class="button button-primary" target="new">Suscribirme</a>
  <a href="http://www.webcupon.es/login" class="button button-primary" target="new">Acceder a Mi Cuenta</a>
  <a href="http://news.webcupon.es/anunciantes/" class="button button-primary" target="new">Más Información</a>
  </div>
<div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
  <?php echo "<h3>" . __( '¿Qué es Web Cupón?', 'webcupon' ) . "</h3>"; ?>
  <?php echo "<p>" . __( 'Web Cupón, es un servicio de e-Marketing para todo tipo de empresas y poder ofrecer <strong>Cupones de Descuento ilimitados y gratuitos</strong> a todos aquellos visitantes de su web que lo soliciten, sin registro y prepagos por Internet. Su cliente potencial, simplemente, imprime el Cupón en formato PDF de forma personalizada y acude a su establecimiento para canjearlo por el descuento que usted previamente ha ofrecido mediante nuestro sistema de distribución de cupones.', 'webcupon' ) . "</p>"; ?>
  <?php echo "<p>" . __( 'Además de aparecer los cupones en su WordPress, también son publicados en nuestro catálogo oficial en <a href="http://www.webcupon.es" target="new">www.webcupon.es</a> donde por medio de intensa campaña en Internet, Radio y/o Televisión redirigimos a sus clientes potenciales hacia su oferta, que será como destino, el formulario del Cupón de Descuento ubicado en su propia página web. También son publicados mediante extensión de Google Chrome para los usuarios de este explorador.', 'webcupon' ) . "</p>"; ?>
</div>

<div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
  <?php echo "<h3>" . __( '¿Cómo funciona?', 'webcupon' ) . "</h3>"; ?>
  <?php echo "<p>" . __( 'La mejor forma de ver como funciona nuestro sistema de cupones es con una promoción gratuita de 15 días al suscribirse mensualmente a nuestro servicio por solo 40€/mes (impuestos incluidos). Si está utilizando cualquier otro servicio de promoción de cupones, saque cuentas de cuanto le cuesta al mes sus ofertas.', 'webcupon' ) . "</p>"; ?>
  <?php echo "<p>" . __( 'Al suscribirse, le enviaremos por correo las claves de acceso para que empiece a publicar su mejor oferta durante 15 días. Si transcurrido el plazo no desea continuar, podrá cancelar la suscripción con tan solo un clic y sin coste alguno. Y, por el contrario desea continuar, no tendrá que hacer nada ya que la entidad PayPal realizará el primer cargo mensual a partir del quinceavo día. Además, si no tiene página web, le proporcionamos una mientras dure su suscripción con nosotros. Una página web totalmente personalizada por usted desde su zona de gestión con el cupón de descuento ya incluído.', 'webcupon' ) . "</p>"; ?>
  </div>
  
<div style="padding:10px; background-color:#fafafa; border: 1px solid #e5e5e5;margin-bottom: 30px;">
  <a href="http://comercial.webcupon.es" class="button button-primary" target="new">Suscribirme</a>
  <a href="http://www.webcupon.es/login" class="button button-primary" target="new">Acceder a Mi Cuenta</a>
  <a href="http://news.webcupon.es/anunciantes/" class="button button-primary" target="new">Más Información</a>
  </div>
  
</div>
<?php
} // Fin información
?>