<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('User'); ?>
				<fieldset>
					<legend><?php echo __('Editar datos'); ?></legend>
				<?php
					echo $this->Form->input('id');
					echo $this->Form->input('name', array('class' => 'form-control', 'label' => 'Nombre'));
					echo $this->Form->input('lastname', array('class' => 'form-control', 'label' => 'Apellidos'));
					echo $this->Form->input('email', array('class' => 'form-control', 'label' => 'E-mail'));
					echo $this->Form->input('mobile', array('class' => 'form-control', 'label' => 'Teléfono/celular'));
				?>
				</fieldset>
			<p>
				<?php echo $this->Form->end(array('label' => 'Editar Usuario', 'class' =>'btn btn-success')); ?>
			</p>
		</div>
	</div>
</div>



