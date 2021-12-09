 <!-- Page Content -->
 <div class="container">

<div class="row">

	<!-- Blog Entries Column -->
	<div class="col-md-8">

		<h1 class="page-header">
			<?php echo $titulo ?> >
			<small><?php echo $subtitulo ?></small>
		</h1>

		<?php 
			foreach($postagens as $postagem){
				?>
				<h2>
					<a href="<?php echo base_url('postagem/' .$postagem->id . '/' .limpar($postagem->titulo)) ?>"><?php echo $postagem->titulo ?></a>
				</h2>
				<p class="lead">
					por <a href="<?php echo base_url('autor/' .$postagem->idautor . '/' .limpar($postagem->nome)) ?>"><?php echo $postagem->nome ?></a>
				</p>
				<p><span class="glyphicon glyphicon-time"></span> Postado em <?php echo postadoem($postagem->data) ?></p>
				<hr>
				<?php
					if($postagem->img == 1){
						$fotopub = base_url("assets/frontend/img/publicacao/". md5($postagem->id). ".jpg");	
				?>
					<img class="img-responsive" src="<?php echo $fotopub ?>" alt="">
					<hr>
				<?php
					}
				?>				
				<hr>
				<p><?php echo $postagem->subtitulo ?></p>
				<a class="btn btn-primary" href="<?php echo base_url('postagem/' .$postagem->id . '/' .limpar($postagem->titulo)) ?>">Leia mais <span class="glyphicon glyphicon-chevron-right"></span></a>
		
				<hr>
				<?php
			}
		?>
		

	
	</div>


