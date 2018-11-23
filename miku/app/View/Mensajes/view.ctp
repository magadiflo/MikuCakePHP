<?php echo $this->Html->css('contactanos'); ?>
<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form class="form-horizontal" action="#">
                                <fieldset>
									<legend class="text-center leyenda">
										[<?php echo h($mensaje['Mensaje']['id']); ?>] 
										<?php echo __('Mensaje'); ?>
										
									</legend>
									
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                        <div class="col-md-8">
											<input  type="text" class="form-control" disabled value="<?php  echo $mensaje['User']['name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" disabled value="<?php  echo $mensaje['User']['lastname']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                                        <div class="col-md-8">
										<input type="text" class="form-control" disabled value="<?php  echo $mensaje['User']['email']; ?>">	
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                        <div class="col-md-8">
											<input type="text" class="form-control" disabled value="<?php  echo $mensaje['User']['mobile']; ?>">
                                        </div>
									</div>
									
									<div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-calendar bigicon"></i></span>
                                        <div class="col-md-8">
											<input type="text" class="form-control" disabled value="<?php echo h($mensaje['Mensaje']['created']); ?>">
                                        </div>
									</div>
									
									<div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-edit bigicon"></i></span>
                                        <div class="col-md-8">
											<input type="text" class="form-control" disabled value="<?php echo h($mensaje['Mensaje']['modified']); ?>">
                                        </div>
									</div>
									
									<div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-info bigicon"></i></span>
                                        <div class="col-md-8">
											<input type="text" class="form-control" 
											disabled value="<?php echo ($mensaje['Mensaje']['estado'] == 1) ? 'Por confirmar' : 'Confirmado';?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-weixin bigicon"></i></span>
                                        <div class="col-md-8">
										<textarea class="form-control mensaje-recibido" id="message" name="message" rows="7" disabled><?php echo h($mensaje['Mensaje']['mensaje']); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 text-center">
                                            <button type="submit" class="btn btn-success btn-lg"><i class="fa fa-send-o"></i>
                                                Confirmar recepción</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
			</div>