 <!-- Page Content -->
 <div class="container">

<div class="row">

	<!-- Blog Entries Column -->
	<div class="col-md-8">

		<h1 class="page-header">
			<?php echo $titulo ?> >
			<small>
				<?php 
					if($subtitulo != ''){
						echo $subtitulo;
					}else{
						foreach($subtitulo_db as $db_subtitulo){
							echo $db_subtitulo->titulo;			
						}
					}
				?>
				</small>
		</h1>

		<?php 
			foreach($autores as $autor){
		?>
			<div class="col-md-4">
				<?php
					if($autor->img == 1){
						$mostrarImg = "assets/frontend/img/usuarios/". md5($autor->id). ".jpg";	
					}else{
						$mostrarImg = "assets/frontend/img/no-image.jfif";
					}
				?>	
                <img class="img-responsive img-circle" src="<?php echo base_url($mostrarImg) ?>" alt="">
            </div>
			<div class="col-md-8">
				<h2>
					<?php echo $autor->nome?>
				</h2> 
				<hr>
				<p> <?php echo $autor->historico?></p>
				<hr>
			</div>
		<?php
			}
		?>
		

	
	</div>


