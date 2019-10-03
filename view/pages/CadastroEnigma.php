<?php
    /* Pesquisa de categoria DICA no banco de dados */
	$ds_categoria = $this->banco->select("SELECT * FROM categorias");
	/* Pesquisa do tipo do enigma para cadastro */
	$ds_tipos = $this->banco->select("SELECT * FROM tipos");
	/* miscelania */
	$data = date('Y-m-d');
	echo "<h2 class='text-white'>". $data ."</h2>";
?>
<form action="index.php?pagina=enigma-persistencia" enctype="multipart/form-data" method="POST" class="sky text-white">
	<!-- Campo Dificuldade enigma -->
	<label for="dificuldade">Dificuldade:</label>
	<div class="nes-select">
		<select name="dificuldade" id="dificuldade">
			<?php
            foreach($ds_categoria as $key => $valor){
            ?>
			<option value="<?= $ds_categoria[$key]['id_categoria_dica'];?>">
				<?= utf8_encode($ds_categoria[$key]['ds_categoria']);?>
			</option>
			<?php
            }
            ?>
		</select>
	</div>
	<!-- Campo -> Tipo do enigma -->         
	<label for="tipo">Tipo:</label>
	<div class="nes-select">
		<select name="tipo" id="tipo">
			<?php
			foreach ($ds_tipos as $key => $valor) {
			?>
			<option value="<?= $ds_tipos[$key]['id_tipos']?>">
				<?= utf8_encode($ds_tipos[$key]['ds_tipo'])?>
			</option>
			<?php
			}
			?>
		</select>
	</div>
	<!-- Campo -> Enigma -->
	<div class="nes-field">
		<label for="enigma">Enigma:</label>
		<input type="text" name="enigma" id="enigma" class="nes-input">
	</div>
	<!-- Arquivo -->
	<div class="nes-field">
		<label for="arquivo" class="nes-field">Arquivo:</label>
		<input type="file" name="arquivo" id="arquivo" class="nes-input">
	</div>
	<!-- Resposta -->
	<div class="nes-field">
		<label for="resposta">Resposta:</label>
		<input type="text" name="resposta" id="resposta" class="nes-input">
	</div>
	<button type="submit" class="nes-btn is-success">Success</button>
</form>