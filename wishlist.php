<?php
// Start the session    
session_start();
require "./server/products.php";

if(isset($_POST['action']) && $_POST['action'] == 'unWishList' ){
    if(removeWishList($_POST['producId'])){
        echo true;
    }
    else {
        echo false;
    }
} 
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>UI to UX | WishList</title>
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

<body><!-- site -->
	<div class="site"><!-- site__mobile-header -->
		<?php require "./header.php";?>
		<div class="site__body">
			<div class="block-header block-header--has-breadcrumb block-header--has-title">
				<div class="container">
					<div class="block-header__body">
						<nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
							<ol class="breadcrumb__list">
								<li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
								<li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a
										href="index.html" class="breadcrumb__item-link">Home</a></li>
								<li class="breadcrumb__item breadcrumb__item--parent"><a href=""
										class="breadcrumb__item-link">Breadcrumb</a></li>
								<li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last"
									aria-current="page"><span class="breadcrumb__item-link">Current Page</span></li>
								<li class="breadcrumb__title-safe-area" role="presentation"></li>
							</ol>
						</nav>
						<h1 class="block-header__title">Wishlist</h1>
					</div>
				</div>
			</div> <?php if(isset($_SESSION['wishlist'])){
				?>
			<div class="block">
				<div class="container container--max--xl">
					<div class="wishlist">
						<table class="wishlist__table">
							<thead class="wishlist__head">
								<tr class="wishlist__row wishlist__row--head">
									<th class="wishlist__column wishlist__column--head wishlist__column--image">Image
									</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--product">
										Product</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--stock">Stock
										status</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--price">Price
									</th>
									<th class="wishlist__column wishlist__column--head wishlist__column--button"></th>
									<th class="wishlist__column wishlist__column--head wishlist__column--remove"></th>
								</tr>
							</thead>
							<tbody class="wishlist__body">
								<?php 
								// retrieve the wishlist items from the database
								$wishlist_items = array();
								foreach ($_SESSION['wishlist'] as $product_id) {
									$product = getProductById($product_id); // assuming this function exists
									if ($product) {
										$wishlist_items[] = $product;
									}
								}
								foreach ($wishlist_items as $item) {

								?>
								<tr class="wishlist__row wishlist__row--body">
									<td class="wishlist__column wishlist__column--body wishlist__column--image">
										<div class="image image--type--product"><a href="product-full.html"
												class="image__body"><img class="image__tag"
													src="<?=$item['image']?>" alt=""></a></div>
									</td>
									<td class="wishlist__column wishlist__column--body wishlist__column--product">
										<div class="wishlist__product-name"><a href=""><?=$item['name']?></a></div>
										<div class="wishlist__product-rating">
											<div class="wishlist__product-rating-stars">
												<div class="rating">
													<div class="rating__body">
													<?php 
														for ($i=0; $i < 5; $i++) { 
															
															if($item['rating'] > 0){
																echo '<div class="rating__star rating__star--active"></div>';
																--$item['rating'];
															}else {
																echo '<div class="rating__star"></div>';
															}
														}
													?>
													</div>
												</div>
											</div>
											<div class="wishlist__product-rating-title"><?=generate_random_review()?></div>
										</div>
									</td>
									
									<td class="wishlist__column wishlist__column--body wishlist__column--stock">
										<div class="status-badge status-badge--style--success status-badge--has-text">
											<div class="status-badge__body">
												<div class="status-badge__text">In Stock</div>
											</div>
										</div>
									</td>
									<td class="wishlist__column wishlist__column--body wishlist__column--price">$<?=$item['price']?>
									</td>
									<td class="wishlist__column wishlist__column--body wishlist__column--button">
										<button type="button" class="btn btn-sm btn-primary">Add to cart</button>
									</td>
									<td class="wishlist__column wishlist__column--body wishlist__column--remove">
										<button type="button" id="unWishList-<?=$item['id']?>" data-custom-value="<?=$item['id']?>" class="wishlist__remove btn btn-sm btn-muted btn-icon unWishlist">
											<svg width="12" height="12">
												<path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
												c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
												C11.2,9.8,11.2,10.4,10.8,10.8z"></path>
											</svg>
										</button>
									</td>
								</tr>
								<?php 
								}
								?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php } else { echo "<h2 style='text-align: center; color: #20E1A5'>No products available</h2>";}?>
			<div class="block-space block-space--layout--before-footer"></div>
		</div><!-- site__body / end -->
		 <!-- site__footer -->
		 <?php include "footer.html"; ?>
        <!-- site__footer / end -->
	</div><!-- site / end -->
	

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/owl-carousel/owl.carousel.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		$(document).ready(function() {
            $(document).on('click', '.unWishlist', function(e) {
                //e.preventDefault(); // prevent form submission
                var id = $(this).data("custom-value"); // get value of ID field
                              

                $.ajax({
                    url: './wishlist.php',
                    method: 'POST',
                    data: {action:"unWishList", producId: id},
                    success: function(response) {
                        
                        if(response){
                            alert("Product Removed from Wishlist!"); // show the alert
							location.reload();
                        }
                        else{
                            alert('some problem in server!');
                        }
                    }
                });
                
            });
        });
	</script>
</body>

</html>