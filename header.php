<?php
    require('connect.php');
    session_start();
    
    $sql = "SELECT * FROM final_review LIMIT 0,5";
    $result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edward's Final Review Site!</title>
        <link rel="stylesheet" type="text/css" href="css/pagestyle.css" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
	  $(document).ready(function() {
	    $("form.delete").submit(function() {        
		   return confirm("Are you sure you want to delete this page?");
	    });
	  });  
	</script>
    </head>
    <body>
        <header id="header">
            <h1>Awesome website!</1>
        </header>
        <nav id="nav">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="game.php">Guessing Game</a></li>
                <?php while($row=$result->fetch_assoc()): ?>
                    <li><a href="post.php?id=<?= $row['id']?>"><?= $row['title'] ?></a></li>
                <?php endwhile; ?>
            </ul>
            <form action="search.php" method="post">
                <label for="keyword">Search:</label>
                <input type="text" name="keyword" />
                <input type="submit" name="submit" value="Search"/>
            </form>  
            <p class="admin">
                <a href="admin.php">Admin</a>
            </p>
        </nav>

        <!--Start our main section for content-->
        <section id="main_content">
            <!--This article should be invisible, unless there is an error-->
            <?php if(isset($_SESSION['error'])): ?>
                <article id="feedback">
                    <p><?= $_SESSION['error'] ?></p>
                    <?php unset($_SESSION['error']) ?>
                </article>
            <?php endif; ?>
            <?php if(isset($_SESSION['result'])): ?>
                <article id="feedback">
                    <p><?= $_SESSION['result'] ?></p>
                    <?php unset($_SESSION['result']) ?>
                </article>
            <?php endif; ?>