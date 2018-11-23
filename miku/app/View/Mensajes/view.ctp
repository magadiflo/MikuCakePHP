<?php echo $this->Html->css('contactanos'); ?>
<div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form class="form-horizontal" action="#">
                                <fieldset>
									<legend class="text-center leyenda">
                                    <?php if($current_user['role'] == 'admin'): ?>
										[<?php echo h($mensaje['Mensaje']['id']); ?>] 
                                    <?php endif; ?>
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
                                </fieldset>
                            </form>
                            <?php if($current_user['role'] == 'admin'): ?>
                                <div class="form-group">
                                    <fieldset>
                                        <div class="col-md-12 text-center">
                                            <?php echo $this->Form->create('Mensaje', array('controller' => 'mensajes', 'action' => 'edit')); ?>
                                            <?php echo $this->Form->input('id', array('value'=> $mensaje['Mensaje']['id'], 'label'=>false, 'type'=>'hidden')); ?>
                                            <?php echo $this->Form->input('estado', array('value'=>'2', 'label'=>false, 'type'=>'hidden')); ?>
                                        <?php echo $this->Form->end(array('label'=>'Confirmar recepción', 'class'=>'btn btn-lg btn-success')); ?>
                                        </div>
                                    </fieldset>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
			</div>