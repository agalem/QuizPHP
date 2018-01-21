<?php session_start(); ?>
<?php include 'process.php'; ?>
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
                <h2>Zakończone!</h2>
                    <p>Gratulacje! Zakończyłeś quiz!</p>
                    <p>Twoj wynik to: <?php echo $_SESSION['score']; $_SESSION['score']=0;?> / <?php echo $total; ?></p>
                    <a href="index.php" class="start">Od początku</a><br><br>
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