<div class="modal fade" id="modal-registro-final">
    <div class="modal-dialog">
        <div class="modal-content estilo-modal">
            <div class="modal-header">
                <button class="close" aria-hidden="true" data-dismiss="modal">
                    &times;
                </button>
                <figure class="logo-iniciar-sesion">
                    <img src="img/logo/Logo-miku-xs.png" width="40">
                </figure>
                <h4 class="modal-title">¡Gracias por registrarte!</h4>
            </div>
            <div class="modal-body">
                <div class="frase-registro-final">
                    <p>Solo un paso más, completa tus datos y forma parte de la familia Miku.</p>
                </div>
                <?php echo $this->Form->create('User', array('url'=>array('controller'=>'users', 'action'=>'add'))); ?>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="name">Nombre:<span class="obligatorio"> *</span></label>
                                <?php echo $this->Form->input('name', array('class'=>'form-control', 'label'=>false)); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="lastname">Apellidos:<span class="obligatorio"> *</span></label>
                                <?php echo $this->Form->input('lastname', array('class'=>'form-control', 'label'=>false)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="email">Comprueba tu Email:<span class="obligatorio"> *</span></label>
                                <?php echo $this->Form->input('email', array('class'=>'form-control', 'label'=>false)); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="mobile">Teléfono o celular:<span class="obligatorio"> *</span></label>
                                <?php echo $this->Form->input('mobile', array('class'=>'form-control', 'label'=>false)); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="username">Usuario:<span class="obligatorio"> *</span></label>
                                <?php echo $this->Form->input('username', array('class'=>'form-control', 'label'=>false)); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="password">Contraseña:<span class="obligatorio"> *</span></label>
                                <?php echo $this->Form->input('password', array('class'=>'form-control', 'label'=> false)); ?>
                                <?php echo $this->Form->input('role', array('value'=>'user', 'type'=>'hidden')); ?>
                            </div>
                        </div>
                    </div>
                    <?php echo $this->Form->button('<i class="fa fa-save"></i> Finalizar registro', 
                        array('type' => 'submit', 'class' => 'btn btn-primary btn-lg', 'escape' => false)); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>