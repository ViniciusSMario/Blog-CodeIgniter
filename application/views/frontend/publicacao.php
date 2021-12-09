 <!-- Page Content -->
 <div class="container">

<div class="row">

	<!-- Blog Entries Column -->
	<div class="col-md-8">
		<?php 
			foreach($postagens as $postagem){
				?>
				<h2>
					<?php echo $postagem->titulo ?>
				</h2>
				<p class="lead">
					por <a href="<?php echo base_url('autor/' .$postagem->idautor . '/' .limpar($postagem->nome)) ?>"><?php echo $postagem->nome ?></a>
				</p>
				<p><span class="glyphicon glyphicon-time"></span> Postado em <?php echo postadoem($postagem->data) ?></p>
				<hr>
				<p><i><?php echo $postagem->subtitulo ?></i></p>
				<?php
					if($postagem->img == 1){
						$fotopub = base_url("assets/frontend/img/publicacao/". md5($postagem->id). ".jpg");	
				?>
					<img class="img-responsive" src="<?php echo $fotopub ?>" alt="">
					<hr>
				<?php
					}
				?>
				<p><?php echo $postagem->conteudo ?></p>
		
				<hr>
				<?php
			}
		?>
		

	
	</div>


