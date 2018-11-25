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
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="nombre">Nombre:<span class="obligatorio"> *</span></label>
                                <input type="text" id="nombre" name="nombre" class="form-control" required autofocus>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="apellidos">Apellidos:<span class="obligatorio"> *</span></label>
                                <input type="text" id="apellidos" name="apellidos" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="email-comprueba">Comprueba tu Email:<span class="obligatorio"> *</span></label>
                                <input type="email" id="email-comprueba" name="email-comprueba" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="telefono">Teléfono o celular:<span class="obligatorio"> *</span></label>
                                <input type="text" id="telefono" name="telefono" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="pass-registro">Contraseña:<span class="obligatorio"> *</span></label>
                                <input type="password" id="pass-registro" name="pass-registro" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label for="pass-registro-repite">Repita su contraseña:<span class="obligatorio"> *</span></label>
                                <input type="password" id="pass-registro-repite" name="pass-registro-repite" class="form-control"
                                required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="btn-finalizar-registro" class="btn btn-primary"><i class="fa fa-save"></i>
                    Finalizar registro</button>
                </form>
            </div>
        </div>
    </div>
</div>