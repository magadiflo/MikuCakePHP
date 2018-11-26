<?php echo $this->Html->script(array('cart.js', 'jquery.animate-colors.js'), array('inline'=> false)); ?>
<hr>
<div class="container">
	<?php echo $this->Form->create(NULL, array('url'=>array('controller'=>'item_previos', 'action'=>'recalcular'))); ?>
		<h1>Sus platillos</h1>
		<hr>
		<?php $tabIndex = 1; ?>
			<?php foreach($itemPrevios as $item): ?>
				<div class="row fila-seleccion-platillos" id="row-<?php echo $item['ItemPrevio']['id']; ?>">
					<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
						<figure>
							<?php  
								echo $this->Html->link($this->Html->image('../files/platillo/foto/' . $item['Platillo']['foto_dir'] . '/' . 'vga_' . $item['Platillo']['foto'],
									array('alt'=>'imagen de menú Miku', 'class'=>'img-responsive')),
									'/platillos/view/'. $item['Platillo']['id'], array('escape' => false, 'class'=>'img-thumbnail'));
								?>
							</figure>
						</div>

						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<strong class="pedido">
								<?php echo $this->Html->link($item['Platillo']['nombre'], array('controller'=>'platillos', 'action'=>'view', $item['ItemPrevio']['platillo_id'])); ?>
							</strong>			
						</div>

						<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 precio" id="price-<?php echo $item['ItemPrevio']['id']; ?>">
							Prec. <div>S/ <?php echo $item['Platillo']['precio']; ?></div>
						</div>

						<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2">
							Cant.
							<?php echo $this->Form->input($item['ItemPrevio']['id'], 
																array('div'=>false, 
																	'class'=>'numeric form-control input-small tam-fuente', 
																	'label'=> false, 'size'=> 2, 
																	'maxlenght'=> 2,
																	'tabindex'=>$tabIndex++, 
																	'data-id'=>$item['ItemPrevio']['id'],
																	'value'=>$item['ItemPrevio']['cantidad'])); ?>
						</div>

						<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 subtotal">
							SubTotal: S/
							<div style="background-color: none;" id="subtotal_<?php echo $item['ItemPrevio']['id']; ?>" >
								<div><?php echo $item['ItemPrevio']['subtotal']; ?> </div>
							</div>
						</div>

						<div class="form-group col-xs-12 col-sm-1 col-md-1 col-lg-1">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', "#",
													array('escapeTitle'=>false, 'title'=>'Eliminar item', 'id'=>$item['ItemPrevio']['id'],
													'class'=>'remove')); ?>        
						</div>
					</div>
					<br>	
				<?php endforeach; ?>
				<hr>
				<br>
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
							<br><br>
							<span class="total">Total a ordenar:</span>
							<span id="total" class="total">
								S/ <?php echo $total_item_previos; ?> 
							</span>
							<br><br><br>
						</div>
					</div>
				</div>

		<?php echo $this->Form->button('<i class="glyphicon glyphicon-arrow-right"></i> Procesar Orden', 
				array('class'=>'btn btn-primary', 'escape'=> false, 'name'=>'procesar', 'value'=> 'procesar')); ?>
	<?php echo $this->Form->end(); ?>
</div>