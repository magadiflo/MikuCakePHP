<div class="container">
	<main class="add">
		<div class="row">
			<div class="col-md-6">
				<?php echo $this->Form->create('Categoria'); ?>
					<fieldset>
						<legend><strong><?php echo __('Nueva Categoría'); ?></strong></legend>
						<?php echo $this->Form->input('categoria', 
							array('class' => 'form-control', 'label'=>'Categoría')); ?>
					</fieldset>
				<p>
				<?php echo $this->Form->end(array('class'=>'btn btn-success', 'label'=>'Crear Categoría')); ?>
				</p>
			</div>
		</div>
	</main>
</div>