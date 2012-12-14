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
        
        header('location: admin.php');
    }
    
    
    if(isset($_POST['submit'])){
        $title = addslashes($_POST['title']);
        $body = addslashes($_POST['body']);
        $category = addslashes($_POST['category']);
        
        $sql = "UPDATE final_review SET title = '$title',body = '$body',content = '$content' WHERE id = '$id'"; // create SQL statement
        
        $db->query($sql);
        
        if($result){
            $_SESSION['result'] = "Successfully updated post.";
            
            header('location: admin.php');
        }
        else{
            $_SESSION['error'] = "Error updating post, db message: " . $db->error;
            
            header('location: admin.php');
        }
    }
    
    if(isset($_POST['delete'])){
        $sql = "DELETE FROM final_review WHERE id = '$id'";
        $result = $db->query($sql);
        
        if($result){
            $_SESSION['result'] = "Successfully deleted post.";
            
            header('location: admin.php');
        }
        else{
            $_SESSION['error'] = "Error deleting post, db message: " . $db->error;
            
            header('location: admin.php');
        }
    }
?>
<?php while ($row = $result->fetch_assoc()): ?>
    <form action="edit.php?id=<?= $id ?>" method="post">
        <fieldset class="insert_post">
            <label for="title">Title:</label>
            <input type="text" name="title" value="<?= $row['title'] ?>" /><br />
            
            <label for="body">Body:</label><br />
            <textarea name="body" id="body" cols="30" rows="10"><?= $row['body'] ?></textarea><br />
            
            <label for="category">Category:</label>
            <select name="category">
                <option value="personal">personal</option>
                <option value="public">public</option>
            </select>
            <br />
            <input type="submit" name="submit" value="Update Post" />
        </fieldset>
    </form>
    <form action="edit.php?id=<?= $id ?>" method="post" class="delete">
        <input type="submit" name="delete" value="Delete Post" />
    </form>
<?php endwhile; ?>

<?php include('footer.php');