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
									foreach($categorias as $categoria){
										echo form_open('admin/categoria/salvar_alteracoes/'. md5($categoria->id));

								?>
									<input type="hidden" value="<?php echo $categoria->id ?>" id="txt-id" name="txt-id" class="form-control">
									<div class="form-group">
										<label>Nome da Categoria</label>
										<input type="text" value="<?php echo $categoria->titulo ?>" id="txt-categoria" name="txt-categoria" class="form-control" placeholder="Digite o nome da categoria">
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
			<!-- /.col-lg-6 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
