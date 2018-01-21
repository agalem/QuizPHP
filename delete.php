<?php include 'database.php' ?>
<?php
    
    $query = "SELECT * FROM pytania";
    $result = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $result->num_rows;

    if(isset($_POST['submit'])){
        
        $number=$_POST['number'];
        
        if($number != ''){
            
            
            
            if($number == $total){
                
                $query="CALL delete_question($number)";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
                
                echo "Pytanie usunięto! <a href=\"admin.html\">PANEL ADMINISTRATORA</a>";
                
           } else if ($number < $total) {
                
                $query="CALL delete_and_update($number)";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
                
                echo "Pytanie usunięto i zaktualizowano dane! <a href=\"admin.html\">PANEL ADMINISTRATORA</a>";
            }
        }
    }

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
                <div class="current">Usuń pytanie<br>
                </div>
                <p class="question">Istniejące pytania: 
                   <?php while ($row = $result->fetch_assoc()): ?>
                       <li><?php echo $row['pytanie_nr']; ?>. <?php echo $row['tekst'] ?></li>
                    <?php endwhile; ?>
                </p>
                
                <br><br><p>Wybierz numer usuwanego pytania:</p>
                <p class="warning">(UWAGA! Usunięcia nie można cofnąć!)</p>    
                <form method="post" action="delete.php">
                    <input type="number" min="1" max="$total" name="number">
                    <input type="submit" name="submit" value="Potwierdź">
                </form>
                <a href="admin.html" class="back">Powrót</a>
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2016, Doctor Who Quiz
            </div>
        </footer>
    </body>
</html>
