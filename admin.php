<?php
    //This page is generated for a post, using the get parameter to find the specific post,
    //The user wants to find.
    
    //We include the header file, connects to our database and starts our proper HTML page
    include('header.php');
    
    $sql = "SELECT * FROM final_review";
    $result = $db->query($sql);
?>
<?php if($result->num_rows == 0): ?>
    <p>No posts currently. <a href="new.php">Add a New One.</a></p>
<?php else: ?>
    <ul>
        <?php while($row=$result->fetch_assoc()): ?>
            <li><a href="edit.php?id=<?= $row['id']?>"><?= $row['title'] ?></a></li>
        <?php endwhile; ?>
    </ul>
<?php endif; ?>
<?php include('footer.php');