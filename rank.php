<?php include 'database.php'; ?>
<?php 
    
    $query = "SELECT * FROM pytania ORDER BY pytanie_nr ASC";
    $result = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $result->num_rows;


    $query = "SELECT * FROM pytania ORDER BY ile_praw DESC";
    $easy = $mysqli->query($query) or die ($mysqli->error._LINE_);

    $query = "SELECT * FROM pytania ORDER BY ile_praw ASC";
    $diff = $mysqli->query($query) or die ($mysqli->error._LINE_);

    $query = "SELECT * FROM pytania ORDER BY ile_pom DESC";
    $missed = $mysqli->query($query) or die ($mysqli->error._LINE_);
        
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
                <div class="current">Ranking<br>
                </div>
                <p class="question">Istniejące pytania: 
                   <?php while ($row = $result->fetch_assoc()): ?>
                       <li><?php echo $row['pytanie_nr']; ?>. <?php echo $row['tekst']; ?></li>
                    <?php endwhile; ?>
                </p>
                
                <p class="question_rank">Pytania w kolejności od najłatwiejszych:
                  <p class="shadow">Nr. pytania. Treść: Ile prawidłowych odpowiedzi/ Ile wszystkich odpowiedzi</p>
                   <?php while ($row = $easy->fetch_assoc()): ?>
                       <li><?php echo $row['pytanie_nr']; ?>. <?php echo $row['tekst']; ?>:  <?php echo $row['ile_praw']; ?> / <?php echo $row['ile_odp']; ?></li>
                    <?php endwhile; ?>
                </p>   
                   
                <p class="question_rank">Pytania w kolejności od najtrudniejszych:
                  <p class="shadow">Nr. pytania. Treść: Ile prawidłowych odpowiedzi/ Ile wszystkich odpowiedzi</p>
                   <?php while ($row = $diff->fetch_assoc()): ?>
                       <li><?php echo $row['pytanie_nr']; ?>. <?php echo $row['tekst']; ?>:  <?php echo $row['ile_praw']; ?> / <?php echo $row['ile_odp']; ?></li>
                    <?php endwhile; ?>
                </p>
                  
                <p class="question_rank">Najczęściej pomijane pytania:
                  <p class="shadow">Nr. pytania. Treść: Ile razy pominięte</p>
                   <?php while ($row = $missed->fetch_assoc()): ?>
                       <li><?php echo $row['pytanie_nr']; ?>. <?php echo $row['tekst']; ?>:  <?php echo $row['ile_pom']; ?></li>
                    <?php endwhile; ?>
                </p>
                   
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
