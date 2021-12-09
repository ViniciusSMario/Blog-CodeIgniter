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
						<?php echo 'Alterar ' . $subtitulo ?>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							<?php 
								echo validation_errors('<div class="alert alert-danger">', '</div>');
								
								foreach($publicacoes as $publicacao){	
									echo form_open('admin/publicacao/salvar_alteracoes/'. md5($publicacao->id));
							?>
								<div class="form-group">
									<label id="selectCategoria">Categoria</label>
									<select id="selectCategoria" name="selectCategoria" class="form-control">
										<?php 
											foreach($categorias  as $categoria){
										?>
											<option value="<?php echo $categoria->id ?>"
												<?php 
													if($categoria->id == $publicacao->categoria){
														echo "selected"; 
													}
												?>
											>
										<?php 
											echo $categoria->titulo
										?>
											</option>
										<?php 
											}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Titulo</label>
									<input type="text" id="txt-titulo" value="<?php echo $publicacao->titulo ?>" name="txt-titulo" class="form-control" placeholder="Digite o título da publicação">
								</div>
								<div class="form-group">
									<label>Subtítulo</label>
									<input type="text" id="txt-subtitulo" name="txt-subtitulo" value="<?php echo $publicacao->subtitulo ?>" class="form-control" placeholder="Digite o subtítulo">
								</div>
								<div class="form-group">
									<label>Conteúdo</label>
									<textarea name="txt-conteudo" id="txt-conteudo" class="form-control" cols="30" rows="2"><?php echo $publicacao->conteudo ?> </textarea>
								</div>
								<div class="form-group">
									<label>Data</label>
									<input type="datetime-local" id="txt-data" name="txt-data" value="<?php echo strftime('%Y-%m-%dT%H:%M:%S',strtotime($publicacao->data) ) ?>" class="form-control">
								</div>
								<input type="hidden" name="txt-id" id="txt-id" value="<?php echo $publicacao->id; ?>">
								<button type="submit" class="btn btn-default">Atualizar</button>
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
						<?php echo 'Imagem de destaque do ' . $subtitulo ?>
					</div>
					<style>
						img{
							width: 400px;
						}
					</style>
					<div class="panel-body">
						<div class="row" style="padding-bottom: 10px;">
							<div class="col-lg-8 col-lg-offset-1">
								<?php
									if($publicacao->img == 1){
										echo img("assets/frontend/img/publicacao/". md5($publicacao->id). ".jpg");	
									}else{
										echo img("assets/frontend/img/no-image.jfif");
									}
								?>	
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
									<?php 
										$divOpen = '<div class="form-group">';
										$divClose = '</div>';
										echo form_open_multipart('admin/publicacao/nova_foto');
										echo form_hidden('id', md5($publicacao->id));
										echo $divOpen;
										$imagem = [
											'name' => 'userfile',
											'id' => 'userfile',
											'class' => 'form-control',
										];
										echo form_upload($imagem);
										echo $divClose;
										echo $divOpen;
										$botao = [
											'name' => 'btn-adicionar',
											'id' => 'btn-adicionar',
											'class' => 'btn btn-default',
											'value' => 'Adicionar nova imagem'
										];
										echo form_submit($botao);
										echo $divClose;
										echo form_close();
									}
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
