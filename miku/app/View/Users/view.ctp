<div class="container">
	<main class="users-view">
		<div class="panel panel-success">
			<div class="panel-heading">
				<strong>Datos del usuario: </strong> <hr> <br>
				<span class="fa fa-user"> </span> <?php echo h($user['User']['username']); ?>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<label class="form-label"><strong>Nombre: </strong></label>
						<p><?php echo h($user['User']['name']); ?></p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<label class="form-label"><strong>Apellidos: </strong></label>
						<p> <?php echo h($user['User']['lastname']); ?></p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<label class="form-label"><strong>Email: </strong></label>
						<p><?php echo h($user['User']['email']); ?></p>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
						<label class="form-label"><strong>Celular: </strong></label>
						<p><?php echo h($user['User']['mobile']); ?></p>
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="row tam-fuente">
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<strong>Creado:</strong> <?php echo $this->Time->format('d-m-Y [h:i A]', $user['User']['created']);?>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
						<strong>Modificado:</strong> <?php echo $this->Time->format('d-m-Y [h:i A]', $user['User']['modified']);?>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>