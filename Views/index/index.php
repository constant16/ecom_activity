<div class="container">
  <a href="./index">Products</a>  <a href="./category">Product Categories</a>
  <br>
  <h2>Products</h2>
  <p>This table contains different gun products</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Product Name</th>
        <th>Product Category</th>
      </tr>
    </thead>
    <tbody>
      <?php

      	foreach ($this->products as $key => $value) {
      		echo '
      			<tr>
        			<td>'.$value['product_id'].'</td>
        			<td>'.$value['name'].'</td>
        			<td>'.$value['description'].'</td>
              <td><a href="./index/deleteProduct/'.$value['product_id'].'">Delete</a></td>
      			</tr>
      		';
      	}

      ?>
    </tbody>
  </table>

  <a href="./index/addProduct">Add Product</a>
</div>