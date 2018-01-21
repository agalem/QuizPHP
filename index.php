<?php include 'database.php'; ?>
<?php include 'process.php'; ?>
<?php

    $query = "SELECT * FROM pytania";

    $results = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $results->num_rows; 
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
                <h1>Dr Who Quiz</h1>
            </div>
        </header>
        <main>
            <div class="container">
                <h2>Doctor Who Quiz</h2>
                <p>Sprawdź swoją wiedzę!</p>
                <ul>
                    <li><strong>Liczba pytań: </strong><?php echo $total; ?></li>
                    <li><strong>Typ: </strong>Jednokrotnego wyboru</li>
                    <li><strong>Przewidywany czas: </strong><?php echo $total * 10; ?> sekund</li>
                </ul>
                <a href="question.php?n=1" class="start">Zacznij Quiz<?php $_SESSION['score'] = 0; ?></a><br><br>
                <a href="admin.html" class="admin">Panel administratora</a>
               
            </div>
        </main>
        <footer>
            <div class="container">
                Copyright &copy; 2016, Doctor Who Quiz 
            </div>
        </footer>
    </body>
</html>
