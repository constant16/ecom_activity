<h1>Add product</h1>
<hr>
<form method="post" action="./insertProduct">
	<div>
		Product name: <input type="text" name="product_name" id="product_name" />
	</div>
	<br>
<select id="category" name="category">
	<?php

		foreach ($this->categories as $key => $value) {
		  echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
		}
	?>
</select>
	<br>
	<div>
		Product short description: <textarea name="prod_shortd"></textarea>
	</div>
	<br>
	<div>
		Product long description : <textarea name="prod_longd"></textarea>
	</div>
	<br>
	<input type="submit" value="Add" />
</form>
<a href="<?php echo URL."index"; ?>">Back</a>