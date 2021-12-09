<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo 'Administrar '. $subtitulo ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php echo 'Adicionar novo ' . $subtitulo ?>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<?php 
									echo validation_errors('<div class="alert alert-danger">', '</div>');
									echo form_open('admin/usuarios/inserir');
								?>
								   
									<div class="form-group">
										<label>Nome do Usuário</label>
										<input type="text" id="txt-nome" value="<?php echo set_value('txt-nome') ?>" name="txt-nome" class="form-control" placeholder="Digite o nome do usuário">
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input type="email" id="txt-email" name="txt-email" value="<?php echo set_value('txt-email') ?>" class="form-control" placeholder="Digite o e-mail do usuário">
									</div>
									<div class="form-group">
										<label>Histórico</label>
										<textarea name="txt-historico" id="txt-historico" class="form-control" cols="30" rows="2"><?php echo set_value('txt-historico') ?> </textarea>
									</div>
									<div class="form-group">
										<label>User</label>
										<input type="text" id="txt-user" name="txt-user" value="<?php echo set_value('txt-user') ?>" class="form-control" placeholder="Digite o user">
									</div>
									<div class="form-group">
										<label>Senha</label>
										<input type="password" id="txt-senha" name="txt-senha" class="form-control" placeholder="Inserir senha">
									</div>
									<div class="form-group">
										<label>Confirmar senha</label>
										<input type="password" id="txt-confirmasenha" name="txt-confirmasenha" class="form-control" placeholder="Confirmar senha">
									</div>
									<button type="submit" class="btn btn-default">Cadastrar</button>
									<button type="reset" class="btn btn-default">Limpar</button>
								<?php	
									echo form_close();
								?>
							</div>
							
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php echo 'Alterar ' . $subtitulo . ' existente' ?>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<style>
									img{
										width: 60px;
									}
								</style>
								<?php
									$this->table->set_heading("Foto","Nome do usuário", 'Alterar', "Excluir");
									foreach($usuarios as $usuario){
										if($usuario->img == 1){
											$fotouser = img("assets/frontend/img/usuarios/". md5($usuario->id). ".jpg");	
										}else{
											$fotouser = img("assets/frontend/img/no-image.jfif");
										}
										$nomeuser = $usuario->nome;
										$alterar = anchor(base_url('admin/usuarios/alterar/'. md5($usuario->id)), '<i class="fa fa-refresh fa-fw">Alterar</i>');
										$excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$usuario->id.'"><i class="fa fa-remove fa-fw"></i> Excluir</button>';

										echo $modal= ' <div class="modal fade excluir-modal-'.$usuario->id.'" tabindex="-1" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-sm">
																				<div class="modal-content">
										
																					<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
																						</button>
																						<h4 class="modal-title" id="myModalLabel2">Exclusão de Usuário</h4>
																					</div>
																					<div class="modal-body">
																						<h4>Deseja Excluir o Usuário '.$usuario->nome.'?</h4>
																						<p>Após Excluido o usuário <b>'.$usuario->nome.'</b> não ficara mais disponível no Sistema.</p>
																						<p>Todos os itens relacionados ao usuário <b>'.$usuario->nome.'</b> serão afetados e não aparecerão no site até que sejam editados.</p>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
																						<a type="button" class="btn btn-primary" href="'.base_url("admin/usuarios/excluir/".md5($usuario->id)).'">Excluir</a>
																					</div>
										
																				</div>
																			</div>
																		</div>';												
										$this->table->add_row($fotouser, $nomeuser, $alterar, $excluir);
									}

									$this->table->set_template(array(
										'table_open' => '<table class="table table-striped">'
									));

									echo $this->table->generate();
								?>
							</div>
							
						</div>
						<!-- /.row (nested) -->
					</div>
					<!-- /.panel-body -->
				</div>
				<!-- /.panel -->
			</div>
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
