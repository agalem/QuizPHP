<?php include 'database.php';?>
<?php
    
    if(isset($_POST['submit'])){
        
		$question_number = $_POST['question_number'];
		$question_text = $_POST['question_text'];
		$correct_choice = $_POST['correct_choice'];
        
        
        $choice1 = $_POST['choice1'];
		$choice2 = $_POST['choice2'];
		$choice3 = $_POST['choice3'];
		$choice4 = $_POST['choice4'];
		$choice5 = $_POST['choice5'];
        
        if($question_text == '' || $correct_choice == '' || $choice1 == '' || $choice2 == '' || $choice3 == '' || $choice4 == '' || $choice5 == '') {
            
            echo "Wszystkie pola są wymagane!";
            
        } else {
    
        
            $query = "INSERT INTO `pytania`(pytanie_nr, tekst)
                        VALUES('$question_number','$question_text')";


            $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);


            if($insert_row){

                if($choice1 != ''){
                    if($correct_choice == 1){
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(1,'$question_number',1,'$choice1')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    } else {
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(1,'$question_number',0,'$choice1')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    }
                }
                if($choice2 != ''){
                    if($correct_choice == 2){
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(2,'$question_number',1,'$choice2')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    } else {
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(2,'$question_number',0,'$choice2')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    }
                }
                if($choice3 != ''){
                    if($correct_choice == 3){
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(3,'$question_number',1,'$choice3')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    } else {
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(3,'$question_number',0,'$choice3')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    }
                }
                if($choice4 != ''){
                    if($correct_choice == 4){
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(4,'$question_number',1,'$choice4')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    } else {
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(4,'$question_number',0,'$choice4')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    }
                }
                if($choice5 != ''){
                    if($correct_choice == 5){
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(5,'$question_number',1,'$choice5')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    } else {
                        $query="INSERT INTO `wybor` (id, pytanie_nr, czy_prawda, tekst) 
                        VALUES(5,'$question_number',0,'$choice5')";

                        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
                    }
                }
                echo 'Sukces! Pytanie dodano! <a href="admin.html">WROĆ</a>';
            }
        }
    }

    if($correct_choice == ''){
        $error='Proszę wybrać prawidłową odpowiedź';
    }
    

    $query = "SELECT * FROM `pytania`";
	//Get The Results
	$questions = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$total = $questions->num_rows;
	$next = $total+1;
?>    


<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8" />
	<title>Doctor Who Quiz</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<header>
		<div class="container">
			<h1>Doctor Who Quiz</h1>
		</div>
	</header>
	<main>
		<div class="container">
			<h2>Dodaj pytanie</h1>
			<?php
				if(isset($msg)){
					echo '<p>'.$msg.'</p>';
				}
			?>
			<form method="post" action="add.php">
				<p>
					<label>Pytanie numer <?php echo $next; ?>: </label>
					<input type="hidden" value="<?php echo $next; ?>" name="question_number" />
				</p>
				<p>
					<label>Treść pytania: </label>
					<input type="text" name="question_text" />
				</p>
				<p>
					<label>Odpowiedź #1: </label>
					<input type="text" name="choice1" />
				</p>
				<p>
					<label>Odpowiedź #2: </label>
					<input type="text" name="choice2" />
				</p>
				<p>
					<label>Odpowiedź #3: </label>
					<input type="text" name="choice3" />
				</p>
				<p>
					<label>Odpowiedź #4: </label>
					<input type="text" name="choice4" />
				</p>
				<p>
					<label>Odpowiedź #5: </label>
					<input type="text" name="choice5" />
				</p>
				<p>
					<label>Prawidłowa odpowiedź ma numer: </label>
					<input type="number" name="correct_choice" />
				</p>
				<p>
					<input type="submit" name="submit" value="Dodaj" />
				</p>
				<a href="admin.html" class="back">Anuluj dodawanie</a>
				
			</form>
		</div>
	</main>
	<footer>
		<div class="container">
			Copyright &copy; 2016, PHP Quizzer
		</div>
	</footer>
</body>
</html>