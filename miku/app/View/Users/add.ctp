<div class="container">
	<main role="main" class="add">
		<div class="row">
			<div class="col-md-6">
				<?php echo $this->Form->create('User'); ?>
				<fieldset>
					<legend>
						<strong><?php echo __('Nuevo usuario [Admin]'); ?></strong>
					</legend>
				<?php
					echo $this->Form->input('name', array('class'=>'form-control', 'label'=>'Nombre'));
					echo $this->Form->input('lastname', array('class'=>'form-control', 'label'=>'Apellidos'));
					echo $this->Form->input('email', array('class'=>'form-control', 'label'=>'E-mail'));
					echo $this->Form->input('mobile', array('class'=>'form-control', 'label'=>'Teléfono/Celular'));
					echo $this->Form->input('username', array('class'=>'form-control', 'label'=>'Usuario'));
					echo $this->Form->input('password', array('class'=>'form-control', 'label'=>'Contraseña'));
				?>
				</fieldset>
				<p>
					<?php echo $this->Form->end(array('label'=>'Crear usuario', 'class'=>'btn btn-success')); ?>
				</p>
			</div>
		</div>
	</main>
</div>
