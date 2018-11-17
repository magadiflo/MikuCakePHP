<?php //echo "debug: " . debug($itemPrevios); ?>
<!-- Se implementará luego la funcionalidad para que el usuario cambie elimine su platillo seleccionado -->
<?php //echo $this->Html->script(array('cart.js', 'jquery.animate-colors.js'), array('inline'=> false)); ?>
<hr>
<div class="container">
	<?php echo $this->Form->create(NULL, array('url'=>array('controller'=>'item_previos', 'action'=>'recalcular'))); ?>
		<h1>Platillos seleccionados</h1>
		<hr>
		<div class="row">
			<div class="col col-sm-1">Imagen</div>
			<div class="col col-sm-7">Platillo</div>
			<div class="col col-sm-1">Precio</div>
			<div class="col col-sm-1">Cantidad</div>
			<div class="col col-sm-1">SubTotal</div>
			<div class="col col-sm-1">Eliminar</div>
		</div>
		<?php $tabIndex = 1; ?>
		<?php foreach($itemPrevios as $item): ?>
			<div class="row" id="row-<?php echo $item['ItemPrevio']['id']; ?>">
				<div class="col col-sm-1">
					<figure>
						<?php echo $this->Html->image('../files/platillo/foto/'.$item['Platillo']['foto_dir']. '/'. 'thumb_' . $item['Platillo']['foto'], 
													array('class' => 'img-pedidos')); ?>
					</figure>
				</div>
				<div class="col col-sm-7">
					<strong>
						<?php echo $this->Html->link($item['Platillo']['nombre'], array('controller'=>'platillos', 'action'=>'view', $item['ItemPrevio']['platillo_id'])); ?>
					</strong>			
				</div>
				<div class="col col-sm-1" id="price-<?php echo $item['ItemPrevio']['id']; ?>">
					<?php echo $item['Platillo']['precio']; ?>
				</div>
				<div class="col col-sm-1">
					<?php echo $this->Form->input($item['ItemPrevio']['id'], 
														array('div'=>false, 
															'class'=>'numeric form-control input-small', 
															'label'=> false, 'size'=> 2, 
															'maxlenght'=> 2,
															'tabindex'=>$tabIndex++, 
															'data-id'=>$item['ItemPrevio']['id'],
															'value'=>$item['ItemPrevio']['cantidad'])); ?>
				</div>
				<div class="col col-sm-1" style="background-color: none;" id="subtotal_<?php echo $item['ItemPrevio']['id']; ?>" >
					<?php echo $item['ItemPrevio']['subtotal']; ?>
				</div>
				<div class="col col-sm-1">
					<?php echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', "#",
											array('escapeTitle'=>false, 'title'=>'Eliminar item', 'id'=>$item['ItemPrevio']['id'],
											'class'=>'remove')); ?>        
				</div>
			</div>
			<br>
		<?php endforeach; ?>
		<hr>
		<div class="row">
			<div class="col col-sm-12">
				<div class="pull-right tr">
					<?php echo $this->Html->link('Quitar platillos', 
						array('controller' => 'item_previos', 'action'=>'quitar'),
						array('class'=>'btn btn-danger', 'confirm'=>'¿Está seguro de quitar todos los platillos agregados?')); 
					?>
					<?php echo $this->Form->button('Recalcular', 
						array('class'=>'btn btn-default', 'escape'=>false, 'name'=>'recalcular', 'value'=>'recalcular')); 
					?>
					<br><br><br><br>
					<span class="total">Total a ordenar:</span>
					<span id="total" class="total">
						S/ <?php echo $total_item_previos; ?> 
					</span>
					<br><br><br>
				</div>
			</div>
		</div>
		<!-- El formulario siempre pasará por la opción de recalcular -->
		<?php echo $this->Form->button('<i class="glyphicon glyphicon-arrow-right"></i> Procesar Orden', 
			array('class'=>'btn btn-primary', 'escape'=> false, 'name'=>'procesar', 'value'=> 'procesar')); ?>
	<?php echo $this->Form->end(); ?>
</div>