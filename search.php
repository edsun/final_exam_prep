<?php

    include('header.php');
    
    $keyword = $_POST['keyword'];
    
    $sql = "SELECT * FROM final_review WHERE body LIKE '%$keyword%'";
    
    $result = $db->query($sql);
    
    if($result->num_rows == 0){
        $_SESSION['error'] = 'No results found for your search.';
        
        header("location: index.php");
    }
    else{
        unset($_SESSION['error']);
    }
?>
<ul>
    <?php while($row=$result->fetch_assoc()): ?>
        <li><a href="post.php?id=<?= $row['id']?>"><?= $row['title'] ?></a></li>
    <?php endwhile; ?>
</ul>


<?php include('footer.php'); ?>