<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 
    
    $number = (int)$_GET['n'];
    $query = "SELECT * FROM pytania";
    $result = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $result->num_rows;

   
    $query = "SELECT * FROM pytania WHERE pytanie_nr = $number";
    
 
    $result = $mysqli->query($query) or die ($mysqli->error._LINE_);

    $question = $result->fetch_assoc();

    
    $query = "SELECT * FROM wybor WHERE pytanie_nr = $number";
    
    
    $choices = $mysqli->query($query) or die ($mysqli->error._LINE_);

    $ile_odp=$question['ile_odp'];
    $ile_praw=$question['ile_praw'];
    $average=$ile_praw/$ile_odp;
    
    
    
        

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Doctor Who Quiz</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <header>
            <div class="container">
                <h1>Doctor Who Quiz</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <div class="current">Pytanie <?php echo $number; ?> z <?php echo $total; ?>
                </div>
                <p class="edit"><?php 
                    
                    if($average <= 0.45){
                        echo '<img src="diff.png" class="image"/>';
                    } else if ($average <= 0.7) {
                        echo '<img src="middle.png" class="image"/>';
                    } else {
                        echo '<img src="easy.png" class="image"/>';
                    }
                    
                    
                    ?></p>
                <p class="question">
                    <?php echo $question ['tekst']; ?> 
                </p>
                <form method="post" action="process.php">
                    <ul class="choices">
                       <?php while ($row = $choices->fetch_assoc()): ?>
                           <li><input name="choice" type="radio" value="<?php echo $row['id']; ?>"><?php echo $row['tekst']  ?></li>
                       <?php endwhile; ?>
                    </ul>
                    <input type="submit" value="Dalej"> 
                    <input type="hidden" name="number" value="<?php echo $number; ?>">
                </form>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2016, Doctor Who Quiz
            </div>
        </footer>
    </body>
</html>
