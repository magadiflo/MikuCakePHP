<div class="modal fade" id="cuadro-iniciar-sesion">
    <div class="modal-dialog">
        <div class="modal-content estilo-modal">
            <div class="modal-header">
                <button class="close" aria-hidden="true" data-dismiss="modal">
                    &times;
                </button>
                <figure class="logo-iniciar-sesion">
                    <img src="img/logo/Logo-miku-xs.png" width="40">
                </figure>
                <h4 class="modal-title">Inicia sesión</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 izquierda-inicia-sesion">
                        <?php echo $this->Form->create('User'); ?>
                            <h3 class="titulo-iniciar-sesion">Ya tengo cuenta</h3>
                            <div class="form-group">
                                <?php echo $this->Form->input('username', array('label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'Usuario')); ?>
                            </div>
                            <div class="form-group">
                                <?php echo $this->Form->input('password', array('label' => false, 'class' => 'form-control input-lg', 'placeholder' => 'Contraseña')); ?>
                            </div>
                            <?php echo $this->Form->button('Ingresar', array('class' => 'btn btn-primary btn-block btn-lg')); ?>
                            <!-- <a href="" class="recupera-pass" target="_blank">¿Has olvidado tu contraseña?</a> -->
                        <?php echo $this->Form->end(); ?>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <form action="#">
                            <h3 class="titulo-iniciar-sesion">Soy usuario nuevo</h3>
                            <div class="form-group" id="grupo-email-registro">
                                <input type="email" id="email-registro" name="email-registro" class="form-control input-lg"
                                placeholder="Ingrese su email" required>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="terminos-condiciones" id="terminos-condiciones" required>
                                <label for="terminos-condiciones">Acepto los <a href="" target="_blank">términos y condiciones.</a></label>
                            </div>
                            <button class="btn btn-success btn-block btn-lg" id="btn-registrar">Registrar</button>
                            <div class="frase-registrar">
                                <small>Registrate y sé parte de la familia Miku</small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>