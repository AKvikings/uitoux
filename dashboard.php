<?php
// Start the session    
session_start();
if(!$_SESSION['user_id']){
    header('Location : ./index.php');
}
?>
<?php require "./server/products.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UI to UX</title>
    <link rel="icon" type="image/png" href="./assets/images/logo.png">
    <!-- roboto google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <!--bootstrap-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/header-mobile.css">
    <!-- external js -->
    <link rel="stylesheet" href="vendor/owl-carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/select2/css/select2.min.css">

    <!-- font - fontawesome -->
	<link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
</head>

<body>
    <div class="site">
        <!-- header -->
        <?php include "./header.php";?>
        <!-- site body -->
        <div class="site__body">
			<div class="block-space block-space--layout--after-header"></div>
			<div class="block">
				<div class="container container--max--xl">
					<div class="row">
						<div class="col-12 col-lg-3 d-flex">
							<div class="account-nav flex-grow-1">
								<h4 class="account-nav__title">Navigation</h4>
								<ul class="account-nav__list">
									
									<li class="account-nav__item " id="category"><a href="#">Category</a></li>
									<li class="account-nav__item" id="product"><a href="#">Products</a></li>
									<li class="account-nav__item" id="order"><a href="#">Order History</a></li>
									
									<li class="account-nav__item" ><a href="logout.php">Logout</a></li>
								</ul>
							</div>
						</div>
						<div class="col-12 col-lg-9 mt-4 mt-lg-0">
							<div class="dashboard" id="category_div" style="display:none;">
                                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">Add Category</button>
                                <div class="dashboard__orders card">
									<div class="card-header">
										<h5>Categories</h5>
									</div>
									<div class="card-divider"></div>
									<div class="card-table">
										<div class="table-responsive-sm">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="categoriesTableBody">
                                                    
                                                </tbody>
                                            </table>
										</div>
									</div>
								</div>
							</div>
                            <div class="dashbaord" id="product_div" style="display:none;">
                                <button class="btn btn-primary mb-3" data-toggle="modal" id="addProductBtn" data-target="#addProductModal">Add Product</button>
                                <div class="dashboard__orders card">
									<div class="card-header">
										<h5>Products</h5>
									</div>
									<div class="card-divider"></div>
									<div class="card-table">
										<div class="table-responsive-sm">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Category</th>
                                                        <th>Price</th>
                                                        <th>Image</th>
                                                        <th>rating</th>
                                                        <th>hot</th>
                                                        <th>createdAt</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="productsTableBody">
                                                    
                                                </tbody>
                                            </table>
										</div>
									</div>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="block-space block-space--layout--before-footer"></div>
        </div>
        <!-- end site body-->
        <!-- site__footer -->
        <?php include "./footer.html"; ?>
        <!-- site__footer / end -->
    </div>
    <!-- category modal -->
    <!-- Add -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="addCategoryForm">
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="cat_name" name="name" required>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" form="addCategoryForm" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>
    <!-- edit -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="editCategoryForm">
						<div class="form-group">
                            <input type="hidden" name="cat_id" id="cat_id">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="cat_name" name="name" >
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" form="editCategoryForm" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Product modal -->
    <!-- Add -->
    <div class="modal fade" id="addProductModal" tabindex="-1" role="dialog" aria-labelledby="addProductModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addProductModalLabel">Add  Product</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="addProductForm" method="POST" action="./server/products.php">
						<div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name"><b>Name</b></label>
                                    <input type="text" class="form-control" id="p_name" name="p_name" placeholder="Enter the product name">
                                </div>
                                <div class="col-md-6">
                                    <label for="price"><b>Price</b></label>
                                    <input type="text" name="p_price" id="p_price" class="form-control" placeholder="Enter the price">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="category"><b>Category</b></label>
                                    <select name="p_category" class="form-control" id="p_category" required>
                                        <option value="">Select Category</option>
                                        <?php 
                                            
                                            $result = getAllCategoriesForProducts();
                                            while($row = mysqli_fetch_assoc($result)) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="image"><b>Select the image</b></label>
                                    <input type="file" name="productImage" id="productImage" accept=".jpg, .jpeg, .png" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="rating"><b>Rating for the product</b></label>
                                    <input type="number" name="rating" id="rating" max="5" min="0" class="form-control" placeholder="Select the number">
                                </div>
                                <div class="col-md-6">
                                    <label for="tag"><b>Is it a Hot product</b></label><br>
                                    <input type="radio" name="hot" value="1"> Yes 
                                    <input type="radio" name="hot" value="0" checked> No 
                                </div>
                            </div>
							<label for="description"><b>Description</b></label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="5"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" form="addProductForm" class="btn btn-primary">Save</button>
				</div>
			</div>
		</div>
	</div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/owl-carousel/owl.carousel.min.js"></script>
    <script src="vendor/select2/js/select2.min.js"></script>
   <!--  <script src="assets/js/main.js"></script> -->
    <script>
        $(document).ready(function() {
            
            //tabs 
            // Set default active tab
            $("#category").addClass("account-nav__item--active");
            $("#category_div").show();

            // Add click event to tabs - category
            $("#category").click(function() {
                // Remove active class from all tabs and content
                $("#product").removeClass("account-nav__item--active");
                $("#order").removeClass("account-nav__item--active")
                $("#product_div").hide();
                $("#order_div").hide();

                // Add active class to clicked tab
                $("#category").addClass("account-nav__item--active");

                // Show content of clicked tab
                $("#category_div").show();
            });

            
            // Add click event to tabs - products
            $("#product").click(function() {
                // Remove active class from all tabs and content
                $("#category").removeClass("account-nav__item--active");
                $("#order").removeClass("account-nav__item--active")
                $("#category_div").hide();
                $("#order_div").hide();

                // Add active class to clicked tab
                $("#product").addClass("account-nav__item--active");

                // Show content of clicked tab
                $("#product_div").show();
            });

            //display category
            $.ajax({
                url: "./server/categories.php",
                method: "GET",
                data: {action: 'getCategory'},
                success: function(data) {
                    console.log(data);
                    var categories = JSON.parse(data);
                    var categoriesTableBody = $("#categoriesTableBody");
                    categoriesTableBody.empty(); // clear the table body
                    for (var i = 0; i < categories.length; i++) {
                        var category = categories[i];
                        var row = $("<tr>");
                        row.append($("<td>").text(category.id));
                        row.append($("<td>").text(category.name));
                        row.append($("<td>").html(`<button class="btn btn-primary editCategoryBtn" data-category-id="${category.id}">Edit</button>
                                                    <button class="btn btn-danger deleteCategoryBtn" data-category-id="${category.id}">Delete</button>`));
                        categoriesTableBody.append(row);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            });

            //add category
            $('#addCategoryForm').submit(function(e) {
                e.preventDefault(); // Prevent the default form submit behavior
                
                // Serialize the form data into a URL-encoded string
                var category = $('#cat_name').val()
                
                // Submit the form via AJAX
                // Create a new category
                $.ajax({
                    url: './server/categories.php',
                    type: 'POST',
                    data: { name: category, action: 'newCategory' },
                    success: function(response) {
                        if(response != ''){
                            location.reload();
                        }
                        // Display a success message
                    }
                });
            });

            // When edit button is clicked
            $(document).on('click', '.editCategoryBtn', function() {
                var categoryId = $(this).data('category-id');
                $('#editCategoryForm #cat_id').val(categoryId); // set the id input value
                $('#editCategoryModal').modal('show'); // show the edit modal
                 // Create a new category
                 $.ajax({
                    url: './server/categories.php',
                    type: 'GET',
                    data: { id: categoryId, action: 'getCategoryById' },
                    success: function(data) {

                        var categories = JSON.parse(data);
                        console.log(categories.name);
                        $('#editCategoryForm #cat_name').val(categories.name);

                        
                    }
                });
            });

            //update category
            $('#editCategoryModal').submit(function(e) {
                e.preventDefault(); // Prevent the default form submit behavior
                
                // Serialize the form data into a URL-encoded string
                var id = $("#editCategoryForm #cat_id").val();
                var category = $('#editCategoryForm #cat_name').val();
                console.log(category+'  '+id);
                // Submit the form via AJAX
                // Create a new category
               $.ajax({
                    url: './server/categories.php',
                    type: 'POST',
                    data: { id:id,name: category, action: 'updateCategory' },
                    success: function(response) {
                        console.log(response);
                        if(response != '')
                            location.reload();
                        
                        // Display a success message
                    }
                }); 
            });

            // Delete Category
            $(document).on('click', '.deleteCategoryBtn', function(){
                let categoryId = $(this).data('category-id');
                let confirmDelete = confirm("Are you sure you want to delete this category?");
                if (confirmDelete) {
                    $.ajax({
                        url: './server/categories.php',
                        method: 'POST',
                        data: { id: categoryId, action:'deleteCategory' },
                        success: function(response) {
                            if (response == "success") {
                                alert("Category deleted successfully.");
                                // reload category 
                               location.reload();
                            } else {
                                alert("Something went wrong. Category not deleted.");
                            }
                        }
                    });
                }
            });

            // get products data from server
            function loadProducts(){
                $.ajax({
                    url: './server/products.php',
                    method: 'GET',
                    dataType: 'json',
                    data: {action:"getAllProducts"},
                    success: function(products) {
                        $.each(products, function(index, product) {
                            // append product data to table row
                            $('#productsTableBody').append(
                                '<tr>' +
                                '<td>' + product.id + '</td>' +
                                '<td>' + product.name + '</td>' +
                                '<td>' + product.description + '</td>' +
                                '<td>' + product.category_name + '</td>' +
                                '<td>' + product.price + '</td>' +
                                '<td><img src="' + product.image + '" width="50"></td>' +
                                '<td>' + product.rating + '</td>' +
                                '<td>' + product.hot + '</td>' +
                                '<td>' + product.createdAt + '</td>' +
                                '<td>' +
                                // '<button class="btn btn-primary edit-product-btn" data-product-id="' + product.id + '" data-toggle="modal" data-target="#editProductModal">Edit</button>' +
                                '<button class="btn btn-danger delete-product-btn" data-product-id="' + product.id + '">Delete</button>' +
                                '</td>' +
                                '</tr>'
                            );
                        });
                    },
                    error: function() {
                        alert('Error: Failed to get products data!');
                    }
                });
            }
            loadProducts();

            //function to add product from server
           $('#addProductForm').on('submit',(function(e){
                e.preventDefault();
                
                // Add Product Modal
                var addProductForm = $('#addProductForm');
               
               
                $.ajax({
                    url: './server/products.php',
                    type: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(response) {
                        console.log(response);
                        if(response == 'success'){
                            $("#productsTableBody tr").remove();
                            loadProducts();
                            $('#addProductModal').modal('hide');
                            addProductForm[0].reset();
                        }
                    }
                }); 
            })); 
            
            // handle edit button click
            $(document).on('click', '.edit-product-btn', function() {
                var productId = $(this).data('product-id');
                // call function to populate edit product form with data
                populateEditProductForm(productId);
            });

            // handle delete button click
            $(document).on('click', '.delete-product-btn', function() {
                var productId = $(this).data('product-id');
                if (confirm('Are you sure you want to delete this product?')) {
                    // call function to delete product from server
                    deleteProduct(productId);
                }
            });

            // function to populate edit product form with data
            function populateEditProductForm(productId) {
                // get product data from server
                $.ajax({
                    url: 'get_product.php',
                    method: 'GET',
                    data: {id: productId},
                    dataType: 'json',
                    success: function(product) {
                        // populate edit product form fields with data
                        $('#editProductForm input[name="id"]').val(product.id);
                        $('#editProductForm input[name="name"]').val(product.name);
                        $('#editProductForm textarea[name="description"]').val(product.description);
                        $('#editProductForm select[name="category_id"]').val(product.category_id);
                        $('#editProductForm input[name="price"]').val(product.price);
                        $('#editProductForm input[name="image"]').val('');
                    },
                    error: function() {
                        alert('Error: Failed to get product data!');
                    }
                });
            }

            // function to delete product from server
            function deleteProduct(productId) {
                // send delete request to server
                $.ajax({
                    url: './server/products.php',
                    method: 'POST',
                    data: {id: productId, action: 'deleteProduct'},
                    success: function(data) {
                        // remove product row from table
                        $('#productsTableBody tr[data-product-id="' + productId + '"]').remove();
                        if(data){
                            location.reload();
                        }
                    },
                    error: function() {
                        alert('Error: Failed to delete product!');
                    }
                });
            }

            
                        
        });
    </script>
</body>

</html>

