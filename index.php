<?php
    //Load our header file (connects to our DB)
    include('header.php');
    
    $sql = "SELECT * FROM final_review";
    $result = $db->query($sql);
?>
<?php if($result->num_rows == 0): ?>
  <p>There are no posts currently.</p>  
<?php else: ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <article class="posting">
            <h2><?= $row['title'] ?></h2>
            <p><?= $row['body'] ?></p>
            <h3>Post category: <?= $row['category'] ?></h3>
        </article>
    <?php endwhile; ?>
<?php endif; ?>
        
<?php include('footer.php') ?>

