<?php
require_once 'config.php';


if(isset($_POST['action'])){
    if($_POST['action'] == 'newCategory'){
        $name = $_POST['name'];
        echo createCategory($name);
    }

    if($_POST['action'] == 'updateCategory'){
        $id = (int)$_POST['id'];
        $name = $_POST['name'];
        
        $updateCategory = updateCategory($id, $name);
        echo $updateCategory;
    }
    if($_POST['action'] == 'deleteCategory'){
        $id = (int)$_POST['id'];

        if(deleteCategory($id)){
            echo "success";
        }

    }
}

if(isset($_GET['action'])){

    if($_GET['action'] == 'getCategory'){
        $category = getAllCategories();
        echo json_encode($category, TRUE);
    }

    if($_GET['action'] == "getCategoryById"){
        $id = (int)$_GET['id'];
        
        $category = getCategoryById($id);
        echo json_encode($category, TRUE);
    } 
}


// Get all categories
function getAllCategories() {
    global $conn;
    $query = "SELECT * FROM categories";
    $result = mysqli_query($conn, $query);
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $categories;
}

// Get a single category by ID
function getCategoryById($id) {
    global $conn;
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $category = mysqli_fetch_assoc($result);
    return $category;
}

// Create a new category
function createCategory($name) {
    global $conn;
    $query = "INSERT INTO categories (name) VALUES ('$name')";
    mysqli_query($conn, $query);
    return mysqli_insert_id($conn);
}

// Update an existing category
function updateCategory($id, $name) {
    global $conn;
    $query = "UPDATE categories SET `name`='$name' WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

// Delete a category
function deleteCategory($id) {
    global $conn;
    $query = "DELETE FROM categories WHERE id=$id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
?>
