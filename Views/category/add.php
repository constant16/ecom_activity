<h1>Add Category</h1>
<hr>
<form method="post" action="./insertCategory">
	<div>
		Category name: <input type="text" name="category_name" id="category_name" />
	</div>
	<br>
	<div>
		Category description : <textarea name="description"></textarea>
	</div>
	<br>
	<input type="submit" value="Add" />
</form>
<a href="<?php echo URL."category"; ?>">Back</a>