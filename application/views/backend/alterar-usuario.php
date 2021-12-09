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
									
									foreach($usuarios as $usuario){
										echo form_open('admin/usuarios/salvar_alteracoes/'. md5($usuario->id). '/'.$usuario->user);
								?>
								   	<input type="hidden" name="txt-id" id="txt-id" value="<?php echo $usuario->id ?>" />
									<div class="form-group">
										<label>Nome do Usuário</label>
										<input type="text" id="txt-nome" value="<?php echo $usuario->nome ?>" name="txt-nome" class="form-control" placeholder="Digite o nome do usuário">
									</div>
									<div class="form-group">
										<label>E-mail</label>
										<input type="email" id="txt-email" name="txt-email" value="<?php echo $usuario->email ?>" class="form-control" placeholder="Digite o e-mail do usuário">
									</div>
									<div class="form-group">
										<label>Histórico</label>
										<textarea name="txt-historico" id="txt-historico" class="form-control" cols="30" rows="2"><?php echo $usuario->historico ?> </textarea>
									</div>
									<div class="form-group">
										<label>User</label>
										<input type="text" id="txt-user" name="txt-user" value="<?php echo $usuario->user ?>" class="form-control" placeholder="Digite o user">
									</div>
									<div class="form-group">
										<label>Senha</label>
										<input type="password" id="txt-senha" name="txt-senha" class="form-control" placeholder="Inserir senha">
									</div>
									<div class="form-group">
										<label>Confirmar senha</label>
										<input type="password" id="txt-confirmasenha" name="txt-confirmasenha" class="form-control" placeholder="Confirmar senha">
									</div>
									<button type="submit" class="btn btn-default">Atualizar</button>
									<button type="reset" class="btn btn-default">Limpar</button>
								<?php	
									}
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
					<div class="panel-body">
						<div class="row" style="padding-bottom: 10px;">
							<div class="col-lg-3 col-lg-offset-3">
								<?php
									if($usuario->img == 1){
										echo img("assets/frontend/img/usuarios/". md5($usuario->id). ".jpg");	
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
										echo form_open_multipart('admin/usuarios/nova_foto');
										echo form_hidden('id', md5($usuario->id));
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
