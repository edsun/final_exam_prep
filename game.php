<?php
    //This page is generated for a post, using the get parameter to find the specific post,
    //The user wants to find.
    
    //We include the header file, connects to our database and starts our proper HTML page
    include('header.php');
    
    if(!isset($_SESSION['remember'])){
        $_SESSION['remember'] = rand(0, 100);
    }
    
    if(isset($_POST['submit'])){
        if($_POST['guess'] == $_SESSION['remember']){
            $_SESSION['result'] = "YOU GUESSED CORRECTLY CONGRATULATIONS! A new number has been generated, try again :)";
            
            unset($_SESSION['remember']);
            
            header('location: game.php');
        }
        else{
            $_SESSION['result'] = "You guessed wrong, please try again!";
            
            header('location: game.php');
        }
    }
?>

<form method="post" action="game.php">
    <label for="guess">Guess the number(0-100):</label>
    <input type="text" name="guess" />
    <input type="submit" name="submit" value="Submit guess" />
</form>

<?php include('footer.php');