<?php include 'database.php'; ?>
<?php 
    
    $query = "SELECT * FROM pytania ORDER BY pytanie_nr ASC";
    $result = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $result->num_rows;
?>

<?php

    $number= $_POST['number'];
    
    $new_question = $_POST['newquestion'];
    $new_correct = $_POST['newchoice'];
    
    $new_choice1 = $_POST['newchoice1'];
    $new_choice2 = $_POST['newchoice2'];
    $new_choice3 = $_POST['newchoice3'];
    $new_choice4 = $_POST['newchoice4'];
    $new_choice5 = $_POST['newchoice5'];

    if(isset($_POST['submit'])){
        
        if($new_question == '' || $new_correct == '' || $new_choice1 == '' || $new_choice2 == '' || $new_choice3 == '' || $new_choice4 == '' || $new_choice5 == '') {
            
            echo "Wszystkie pola są wymagane!";
            
        } else {
        
        if($new_question != '') {
            $query = "UPDATE `pytania` SET `tekst`='$new_question' WHERE `pytanie_nr`='$number'";
            $mysqli->query($query) or die ($mysqli->error._LINE_);
        }
        
        if($number > 0) {
            if($new_correct == 1){
            $query="UPDATE `wybor` SET `tekst`='$new_choice1', `czy_prawda`=1 WHERE `id`=1 AND `pytanie_nr`='$number'";
            $mysqli->query($query) or die ($mysqli->error._LINE_);
            } else {
            $query="UPDATE `wybor` SET `tekst`='$new_choice1', `czy_prawda`=0 WHERE `id`=1 AND `pytanie_nr`='$number'";
            $mysqli->query($query) or die ($mysqli->error._LINE_);
            }
        }
        
        if($number >= 1) {
            if($new_correct == 2){
                $query="UPDATE `wybor` SET `tekst`='$new_choice2', `czy_prawda`=1 WHERE `id`=2 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            } else {
                $query="UPDATE `wybor` SET `tekst`='$new_choice2', `czy_prawda`=0 WHERE `id`=2 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            }
        }
        
        if($number >= 2) {
            if($new_correct == 3){
                $query="UPDATE `wybor` SET `tekst`='$new_choice3', `czy_prawda`=1 WHERE `id`=3 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            } else {
                $query="UPDATE `wybor` SET `tekst`='$new_choice3', `czy_prawda`=0 WHERE `id`=3 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            }
        }
        
        if($number >= 3) {
            if($new_correct == 4){
                $query="UPDATE `wybor` SET `tekst`='$new_choice4', `czy_prawda`=1 WHERE `id`=4 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            } else {
                $query="UPDATE `wybor` SET `tekst`='$new_choice4', `czy_prawda`=0 WHERE `id`=4 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            }
        }
        if($number >= 4) {
            if($new_correct == 5){
                $query="UPDATE `wybor` SET `tekst`='$new_choice5', `czy_prawda`=1 WHERE `id`=5 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            } else {
                $query="UPDATE `wybor` SET `tekst`='$new_choice5', `czy_prawda`=0 WHERE `id`=5 AND `pytanie_nr`='$number'";
                $mysqli->query($query) or die ($mysqli->error._LINE_);
            }
        }
    
        echo 'Sukces! Pytanie zmieniono! <a href="index.php">WROĆ DO STARTOWEJ</a>';
            
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
                <div class="current">Edycja Pytania<br>
                <a href="order.php" class="edit">Zmień kolejność pytań</a>
                </div>
                <p class="question">Istniejące pytania: 
                   <?php while ($row = $result->fetch_assoc()): ?>
                       <li><?php echo $row['pytanie_nr']; ?>. <?php echo $row['tekst'] ?></li>
                    <?php endwhile; ?>
                </p>
                    
                
                Edytuj pytanie numer: 
                <form method="POST" action="edit.php">
                   <input type="number" name="number" min="1" max="<?php echo $total; ?>">
                    <p>
                        <label>Nowe pytanie:</label>
                        <input type="text" name="newquestion">
                    </p>
                    <p>
                        <label>Nowa odpowiedź #1: </label>
                        <input type="text" name="newchoice1" />
                    </p>
                    <p>
                        <label>Nowa odpowiedź #2: </label>
                        <input type="text" name="newchoice2" />
                    </p>
                    <p>
                        <label>Nowa odpowiedź #3: </label>
                        <input type="text" name="newchoice3" />
                    </p>
                    <p>
                        <label>Nowa odpowiedź #4: </label>
                        <input type="text" name="newchoice4" />
                    </p>
                    <p>
                        <label>Nowa odpowiedź #5: </label>
                        <input type="text" name="newchoice5" />
                    </p>
                    <p>
                        <label>Prawidłowa odpowiedź ma numer: </label>
                        <input type="number" name="newchoice" />
                    </p>
                    <p>
                        <input type="submit" name="submit" value="Edytuj pytanie" />
                    </p>
                </form>
                <a href="admin.html" class="back">Anuluj edycję</a>  
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2016, Doctor Who Quiz
            </div>
        </footer>
    </body>
</html>
