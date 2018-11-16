<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', '::Miku:: Restaurante online');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php echo $this->Html->charset(); ?>
	<?php echo $this->Html->meta(array('name' => 'viewport', 'content' => 'width=device-width, minimum-scale=1, maximum-scale=1')); ?>
	<?php echo $this->Html->meta(array('http-equiv' => 'X-UA-Compatible', 'content' => 'IE=edge,chrome=1')); ?>
	<?php echo $this->Html->meta(array('name' => 'description', 'content' => 'Restaurante online miku')); ?>

	<title>
		<?php echo $cakeDescription ?>
	</title>
	<?php
		
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('style.css', 'bootstrap.min', 'font-awesome', 'fileinput.min.css'));
		echo $this->Html->script(array('jquery-3.3.1.min', 'bootstrap.min', 'script', 'fileinput.min.js'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<script type="text/javascript">
		//#foto, id asignado en Platillos/add.ctp
		//Con el método asociado llamamos al plugin fileinput.min
		$("#foto").fileinput();
		//Indicamos la ruta base/raiz del proyecto. Se usará en el addtocart.js
		var basePath = "<?php echo Router::url('/'); ?>"
	</script>
</head>
<body>
	<?php echo $this->element('menu'); ?>	

	<div id="notificacion">
		<?php echo $this->Session->flash(); ?>
	</div>
	
	<div id="container" role="main">
		<?php echo $this->fetch('content'); ?>
	</div>

	<?php echo $this->element('sql_dump'); ?>
</body>
	
</html>