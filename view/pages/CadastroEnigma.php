<?php
    /* Pesquisa de categoria DICA no banco de dados */
    $ds_categoria = $this->banco->select("SELECT * FROM categorias");
?>
<form action="index.php?pagina=enigma-persistencia" method="POST">
	<label for="default_select" class="text-white">Default select</label>
	<div class="nes-select">
		<select name="default_select">
			<?php
            foreach($ds_categoria as $key =>$valor){
            ?>
			<option value="<?= $ds_categoria[$key]['id_categoria_dica'];?>">
				<?= $ds_categoria[$key]['ds_categoria']; ?>
			</option>
			<?php
            }
            ?>
		</select>
	</div>
	<div class="nes-field">
		<label for="name_field" class="text-white">Your name</label>
		<input type="text" id="name_field" class="nes-input">
	</div>
	<button type="submit" class="nes-btn is-success">Success</button>
</form>