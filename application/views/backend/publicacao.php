<div id="page-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><?php echo 'Administrar '. $subtitulo ?></h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php echo 'Adicionar nova ' . $subtitulo ?>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<?php 
									echo validation_errors('<div class="alert alert-danger">', '</div>');
									echo form_open('admin/publicacao/inserir');
								?>
								   	<input type="hidden" name="txt-usuario" id="txt-usuario" value="<?php echo $this->session->userdata('userLogado')->id ?>">
									<div class="form-group">
										<label id="selectCategoria">Categoria</label>
										<select id="selectCategoria" name="selectCategoria" class="form-control">
											<?php 
												foreach($categorias  as $categoria){
											?>
											<option value="<?php echo $categoria->id?>"><?php echo $categoria->titulo?></option>
											<?php 
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Titulo</label>
										<input type="text" id="txt-titulo" value="<?php echo set_value('txt-titulo') ?>" name="txt-titulo" class="form-control" placeholder="Digite o título da publicação">
									</div>
									<div class="form-group">
										<label>Subtítulo</label>
										<input type="text" id="txt-subtitulo" name="txt-subtitulo" value="<?php echo set_value('txt-subtitulo') ?>" class="form-control" placeholder="Digite o subtítulo">
									</div>
									<div class="form-group">
										<label>Conteúdo</label>
										<textarea name="txt-conteudo" id="txt-conteudo" class="form-control" cols="30" rows="2"><?php echo set_value('txt-conteudo') ?> </textarea>
									</div>
									<div class="form-group">
										<label>Data</label>
										<input type="datetime-local" id="txt-data" name="txt-data" value="<?php echo set_value('txt-data') ?>" class="form-control">
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
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<?php echo 'Alterar ' . $subtitulo . ' existente' ?>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<style>
									img{
										width: 90px;
									}
								</style>
								<?php
									$this->table->set_heading('Foto','Titulo','Data', 'Alterar', "Excluir");
									foreach($publicacoes as $publicacao){
										if($publicacao->img == 1){
											$fotopub = img("assets/frontend/img/publicacao/". md5($publicacao->id). ".jpg");	
										}else{
											$fotopub = img("assets/frontend/img/no-image.jfif");
										}
										$titulo = $publicacao->titulo;
										$data = postadoem($publicacao->data);
										$alterar = anchor(base_url('admin/publicacao/alterar/'. md5($publicacao->id)), '<i class="fa fa-refresh fa-fw">Alterar</i>');
										$excluir= '<button type="button" class="btn btn-link" data-toggle="modal" data-target=".excluir-modal-'.$publicacao->id.'"><i class="fa fa-remove fa-fw"></i> Excluir</button>';

										echo $modal= ' <div class="modal fade excluir-modal-'.$publicacao->id.'" tabindex="-1" role="dialog" aria-hidden="true">
																			<div class="modal-dialog modal-sm">
																				<div class="modal-content">
										
																					<div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
																						</button>
																						<h4 class="modal-title" id="myModalLabel2">Exclusão de Publicação</h4>
																					</div>
																					<div class="modal-body">
																						<h4>Deseja Excluir a Publicação '.$publicacao->titulo.'?</h4>
																						<p>Após Excluida a publicação <b>'.$publicacao->titulo.'</b> não ficara mais disponível no Sistema.</p>
																						<p>Todos os itens relacionados a publicação <b>'.$publicacao->titulo.'</b> serão afetados e não aparecerão no site até que sejam editados.</p>
																					</div>
																					<div class="modal-footer">
																						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
																						<a type="button" class="btn btn-primary" href="'.base_url("admin/publicacao/excluir/".md5($publicacao->id)).'">Excluir</a>
																					</div>
										
																				</div>
																			</div>
																		</div>';												
										$this->table->add_row($fotopub, $titulo,$data, $alterar, $excluir);
									}

									$this->table->set_template(array(
										'table_open' => '<table class="table table-striped">'
									));

									echo $this->table->generate();
									echo "<div class='paginacao'>". $links_paginacao ."</div>";
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
