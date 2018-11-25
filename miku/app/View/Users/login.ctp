<!-- <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
          < ?php echo $this->Html->link('Miku', array('controller' => 'users', 'action' => 'login'), array('class' => 'navbar-brand')) ?>
    </div>
        <div id="navbar" class="navbar-collapse collapse">
            < ?php echo $this->Form->create('User', array('class' => 'navbar-form navbar-right')); ?>
                <div class="form-group">
                < ?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Usuario')); ?>
                </div>
                <div class="form-group">
                < ?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Contraseña')); ?>
                </div>
                < ?php echo $this->Form->button('Acceder', array('class' => 'btn btn-success')); ?>
            < ?php echo $this->Form->end(); ?>
        </div>< !--/.navbar-collapse -- >
    </div>
</nav> -->
<?php echo $this->element('slider'); ?>
<!-- EL FORMULARIO LO TOMAREMOS COMO REFERENCIA PARA IMPLEMENTARLO EN EL MODAL -->
<!-- Formulario para registrarse -->
<!-- <div class="container">
    <div class="row">
		<div class="col-md-6">
			< ?php echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action'=>'add'))); ?>
			<fieldset>
				<legend>< ?php echo __('Nuevo usuario'); ?></legend>
			< ?php
				echo $this->Form->input('name', array('class'=>'form-control', 'label'=>'Nombre'));
				echo $this->Form->input('lastname', array('class'=>'form-control', 'label'=>'Apellidos'));
				echo $this->Form->input('email', array('class'=>'form-control', 'label'=>'E-mail'));
				echo $this->Form->input('mobile', array('class'=>'form-control', 'label'=>'Teléfono/Celular'));
				echo $this->Form->input('username', array('class'=>'form-control', 'label'=>'Usuario'));
                echo $this->Form->input('password', array('class'=>'form-control', 'label'=>'Contraseña'));
                echo $this->Form->input('role', array('value'=>'user', 'type'=>'hidden'));
			?>
			</fieldset>
			<p>< ?php echo $this->Form->end(array('label'=>'Registrar', 'class'=>'btn btn-success')); ?></p>
		</div>
	</div>
</div> -->
<!-- /Formulario para registrarse -->

<!-- Main jumbotron for a primary marketing message or call to action -->
<br>
<div class="container">
    <div class="jumbotron">
        <h1 class="title-bienvenida">Bienvenido</h1>
        <p class="texto-presentacion">Ha llegado la hora de dejar la preocupación por no saber qué cocinar o qué plato degustar en su día a día. 
           Deje que <strong  class="title-bienvenida">Miku</strong> se haga cargo. Le proponemos los más variados y selectos platillos para que 
           usted los disfrute a la hora que lo solicite. Experimente el cambio </p>
        <p><a class="btn btn-primary btn-lg" id="btnPasos" href="#" role="button">Leer más &raquo;</a></p>
    </div>
    <?php echo $this->element('modal-pasos-orden'); ?>
</div>    

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <h2>Entrada</h2>
            <div class="row">
                <div class="col-sm-5">
                    <?php echo $this->Html->image('entrada/causa.jpg', array('class'=>'img-presentacion img-responsive')); ?>
                </div>
                <div class="col-sm-7">
                    <p class="texto-presentacion">El primer plato para empezar su comida siempre es importante, por eso para  usted tenemos
                    los más esquisitos platillos que harán que su paladar queden maravillados. </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Principal</h2>
            <div class="row">
                <div class="col-sm-5">
                    <?php echo $this->Html->image('menu/aji.jpg', array('class'=>'img-presentacion img-responsive')); ?>
                </div>
                <div class="col-sm-7">
                    <p class="texto-presentacion">Están a su disposición los tradicionales y finos 
                        platillos elaborados con los 
                        mejores ingredientes del mercado y con una cuidadosa salubridad.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Bebidas</h2>
            <div class="row">
                <div class="col-sm-5">
                    <?php echo $this->Html->image('bebida/chicha.jpg', array('class'=>'img-presentacion img-responsive')); ?>
                </div>
                <div class="col-sm-7">
                    <p class="texto-presentacion">Tenemos bebidas naturales  y bebidas de marcas reconocidas. 
                        Siempre pensando en sus gustos. Nosotros le mostramos. ¡Usted elige!</p>
                </div>
            </div>
        </div>
    </div>
</div>