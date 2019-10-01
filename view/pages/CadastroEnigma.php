<?php
    /* Pesquisa de categoria DICA no banco de dados */
	$ds_categoria = $this->banco->select("SELECT * FROM categorias");
	/* Pesquisa do tipo do enigma para cadastro */
	$ds_tipos = $this->banco->select("SELECT * FROM tipos");
	var_dump($ds_tipos);
?>
<form action="index.php?pagina=enigma-persistencia" method="POST" class="sky text-white">
	<!-- Campo Dificuldade enigma -->
	<label for="dificuldade">Dificuldade:</label>
	<div class="nes-select">
		<select name="dificuldade" id="dificuldade">
			<?php
            foreach($ds_categoria as $key => $valor){
            ?>
			<option value="<?= $ds_categoria[$key]['id_categoria_dica'];?>">
				<?= $ds_categoria[$key]['ds_categoria'];?>
			</option>
			<?php
            }
            ?>
		</select>
	</div>
	<!-- Campo -> Tipo do enigma -->
	<div class="nes-select">
		<select name="tipo" id="tipo">
			<?php
			foreach ($ds_tipos as $key => $valor) {
			?>
			<option value="<?= $ds_tipos[$key]?>"></option>
		</select>
	</div>
	<!-- Campo -> Enigma -->
	<div class="nes-field">
		<label for="">Enigma:</label>
		<input type="text" name="enigma" id="enigma" class="nes-input">
	</div>


	<button type="submit" class="nes-btn is-success">Success</button>
</form>