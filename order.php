<?php include 'database.php'; ?>
<?php 
    
    $query = "SELECT * FROM pytania ORDER BY pytanie_nr ASC";
    $result = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $result->num_rows;

        
    if(isset($_POST['submit'])){
        
        $number=$_POST['number'];
        $newnumber=$_POST['newnumber'];
        
        if($number < 1 | $newnumber > $total | $number == '' | $newnumber == ''){
            echo "Poprzedni jak i nowy nume pytania muszą być w zakresie 1 - <?php echo $total?> !";
        } else {
            
            $query="CALL change_number($number, $newnumber)";
            $mysqli->query($query) or die ($mysqli->error._LINE_);
            
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
                <div class="current">Zamiana kolejności<br>
                </div>
                <p class="question">Aktualna kolejność: 
                   <?php while ($row = $result->fetch_assoc()): ?>
                       <li><?php echo $row['pytanie_nr']; ?>. <?php echo $row['tekst']; ?></li>
                    <?php endwhile; ?>
                </p>
                
                <form method="post" action="order.php">
                    <label>Atualny numer:</label>
                    <input type="number" name="number" min="1" max="<?php echo $total; ?>">
                    
                    <br><br>
                    
                    <label>Zamień na numer:</label>
                    <input type="number" name="newnumber" min="1" max="<?php echo $total; ?>">
                    
                    <br><br>
                    
                    <input type="submit" name="submit" value="Zamień">
                    
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
