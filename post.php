<?php
    //This page is generated for a post, using the get parameter to find the specific post,
    //The user wants to find.
    
    //We include the header file, connects to our database and starts our proper HTML page
    include('header.php');
    
    //Get the ID
    $id = $_GET['id'];
    
    //The ID must be numeric
    if(!is_numeric($id)){
        $_SESSION['error'] = "ID Must be numeric.";
        
        header('location: index.php');
    }
    else{
        unset($_SESSION['error']);
    }
    
    $sql = "SELECT * FROM final_review WHERE id = '$id'";
    $result = $db->query($sql);
    
    if($result->num_rows == 0){
        $_SESSION['error'] = "Error finding post with id of '$id'";
        
        header('location: index.php');
    }
?>
<?php while ($row = $result->fetch_assoc()): ?>
    <article class="posting">
        <h2><?= $row['title'] ?></h2>
        <p><?= $row['body'] ?></p>
        <h3>Post category: <?= $row['category'] ?></h3>
    </article>
<?php endwhile; ?>

<?php include('footer.php');