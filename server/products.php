<?php

require 'config.php';
// session variables;

if(!empty(isset($_POST['p_name'])) || !empty(isset($_POST['p_price'])) || isset($_FILES['productImage'])){

       $category_id = $_POST['p_category'];
       $description = $_POST['description'];
       $hot         = $_POST['hot'] == TRUE ? 1 : 0;
       $image       = $_FILES['productImage']['name'];
       $p_name      = $_POST['p_name'];
       $p_rating    = $_POST['rating'];
       $p_price     = $_POST['p_price'];
        //echo $image;
        // handle file upload
        $targetDir = './assets/uploads/';
        $targetFile = $targetDir . basename($image);
        move_uploaded_file($_FILES['productImage']['tmp_name'], '.'.$targetFile);
        if(createProduct($p_name, $description, $category_id, $p_price, $targetFile, $p_rating, $hot)){
            echo "success";
        }else{
            echo "failed";
        }  
}


if(isset($_GET['action'])){
    if(isset($_GET['action']) == 'getAllProducts'){
        $product = getAllProducts();
        echo json_encode($product, TRUE);
    }
    
}
if(isset($_POST['action']) && $_POST['action'] == 'deleteProduct'){
    $id = $_POST['id'];
    if(deleteProduct($id)){
        echo true;
    }
    else{
        echo false;
    }
}



// Get all categories for product form
function getAllCategoriesForProducts() {
    global $conn;
    $query = "SELECT id, name FROM categories";
    $result = mysqli_query($conn, $query);

    return $result;
}


// Get all products
function getAllProducts() {
    global $conn;
    $query = "SELECT products.id, products.name, products.description, categories.name as category_name, products.price, products.image, products.rating, products.hot, products.createdAt FROM products  join categories on products.category_id = categories.id";
    $result = mysqli_query($conn, $query);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $products;
}

function getAllProductsForList() {
    global $conn;
    $query = "SELECT products.id, products.name, products.description, categories.name as category_name, products.price, products.image, products.rating, products.hot, products.createdAt FROM products  join categories on products.category_id = categories.id";
    $result = mysqli_query($conn, $query);
    return $result;
}
// Get a single product by ID
function getProductById($id) {
    global $conn;
    $query = "SELECT products.id, products.name, products.description, categories.name as category_name, products.price, products.image, products.rating, products.hot, products.createdAt FROM products  join categories on products.category_id = categories.id WHERE products.id=$id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
    return $product;
}

// Create a new product
function createProduct($name, $description, $category_id, $price, $image, $rating, $hot) {
    global $conn;
    $query = "INSERT INTO products (name, description, category_id, price, image, rating, hot) VALUES ('$name', '$description', $category_id, $price, '$image', '$rating', '$hot')";
    mysqli_query($conn, $query);
    return mysqli_insert_id($conn);
}

// Update an existing product
function updateProduct($id, $name, $description, $category_id, $price, $image, $rating, $hot) {
    global $conn;
    $query = "UPDATE products SET name='$name', description='$description', category_id=$category_id, price=$price, image='$image', rating=$rating, hot='$hot' WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Delete a product
function deleteProduct($id) {
    global $conn;
    $query = "DELETE FROM products WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


//generate random number
function generate_random_number() {
    $prefix = '140';
    $middle = rand(1000, 9999);
    $suffix = chr(rand(65, 90)); // generates a random uppercase letter
    
    return $prefix . '-' . $middle . '-' . $suffix;
}

// reviews
function generate_random_review() {
    $rating = rand(1, 5);
    $num_reviews = rand(1, 30);
    
    return $rating . ' on ' . $num_reviews . ' reviews';
}


//add to wishlist
function addWishList($productId)
{
    if(isset( $_SESSION['wishlist'])){

        // Add the product ID to the user's session data
        if (!in_array($productId, $_SESSION['wishlist'])) {
            $_SESSION['wishlist'][] = $productId;
            // success message
            return true;
        }
    }else{
        $_SESSION['wishlist'][] = $productId;
        // success message
        return true;
    }
    
    return false;
}

function removeWishList($productId){
    $key = array_search($productId, $_SESSION['wishlist']);
    
    unset($_SESSION['wishlist'][$key]);
    $_SESSION['wishlist'] = array_values($_SESSION['wishlist']);
   
}
?>