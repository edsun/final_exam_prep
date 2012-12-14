<?php
    //This page is used to create a new post,
    //insert a new row into the database,
    //and redirect the user to the homepage.
    
    include('header.php');
    
    if(isset($_POST['submit'])){
        $title = addslashes($_POST['title']);
        $body = addslashes($_POST['body']);
        $category = addslashes($_POST['category']);
        
        $sql = "INSERT INTO final_review (title, body, category) VALUES ('$title', '$body', '$category')";
        $result = $db->query($sql);
        
        if(!$result){
            $_SESSION['error'] = "Error inserting a new row into the database.";
            header('location: new.php');
        }
        else{
            unset($_SESSION['error']);
            $_SESSION['result'] = "Successfully created a new post.";
            header('location: index.php');
        }
    }
?>
    <section>
        <h2>Create a new post</h2>
        <form action="new.php" method="post">
            <fieldset id="insert_post">
                <label for="title">Title:</label>
                <input type="text" name="title" /><br />
                
                <label for="body">Body:</label><br />
                <textarea name="body" id="body" cols="30" rows="10"></textarea><br />
                
                <label for="category">Category:</label>
                <select name="category">
                    <option value="personal">personal</option>
                    <option value="public">public</option>
                </select>
                <br />
                <input type="submit" name="submit" value="Create new post"/>
            </fieldset>
        </form>
    </section>
<?php include('footer.php'); ?>