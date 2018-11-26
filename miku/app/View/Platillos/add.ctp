<div class="container">
	<main role="main" class="add-platillo">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
				<?php echo $this->Form->create('Platillo', array('type'=>'file', 'novalidate' => 'novalidate')); ?>
					<fieldset>
						<legend><strong><?php echo __('Nuevo Platillo'); ?></strong></legend>
						<?php
							echo $this->Form->input('categoria_id', array('class'=>'form-control', 'label'=>'Categoría'));
							echo $this->Form->input('nombre', array('class'=>'form-control', 'label'=>'Nombre'));
							echo $this->Form->input('descripcion', array('class'=>'form-control', 'label'=>'Descripción'));
							echo $this->Form->input('precio' , array('class'=>'form-control', 'label'=>'Precio'));
							echo $this->Form->input('foto' , array('type'=>'file', 'label'=>'Foto', 
																	'id'=>'foto', 'class'=>'file', 
																	'data-show-upload' => 'false', 
																	'data-show-caption' => 'true'));
							echo $this->Form->input('foto_dir', array('type'=>'hidden'));
							echo $this->Form->input('estado', array('class'=>'form-control', 'value'=>1, 'type'=>'hidden'));
						?>
					</fieldset>
				<p><?php echo $this->Form->end(array('label'=>'Crear platillo', 'class'=>'btn btn-success')); ?></p>
			</div>
		</div>
	</main>
</div>