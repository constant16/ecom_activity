<div class="container">
  <a href="./index">Products</a><a href="./index">Products Category</a>
  <br>
  <h2>Categories</h2>
  <p>This table contains different products category</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Category Description</th>
      </tr>
    </thead>
    <tbody>
      <?php

      	foreach ($this->categories as $key => $value) {
      		echo '
      			<tr>
        			<td>'.$value['id'].'</td>
        			<td>'.$value['name'].'</td>
        			<td>'.$value['description'].'</td>
              <td><a href="./category/deleteCategory/'.$value['id'].'">Delete</a></td>
      			</tr>
      		';
      	}

      ?>
    </tbody>
  </table>

    <a href="./category/addCategory">Add Category</a>
</div>