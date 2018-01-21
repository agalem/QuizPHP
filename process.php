<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php
	
	
    $query = "SELECT * FROM pytania";
    
    $result = $mysqli->query($query) or die ($mysqli->error._LINE_);
    $total = $result->num_rows;

    if(!isset($_SESSION['score'])){
            $_SESSION['score'] = 0;
    }

	if($_POST){
		$number = $_POST['number'];
		$selected_choice = $_POST['choice'];
	    $next = $number+1;
        
        
        $query = "SELECT * FROM wybor 
                WHERE pytanie_nr = $number and czy_prawda = 1";
        
       
        $result = $mysqli->query($query) or die ($mysqli->error._LINE_);
        
        
        $row = $result->fetch_assoc();
        
        
        $correct_choice = $row['id'];
        
       
        if ($correct_choice == $selected_choice) {
            $_SESSION['score']++;
            $query="UPDATE `pytania` SET `ile_odp`=`ile_odp`+1, `ile_praw`=`ile_praw`+1 WHERE `pytanie_nr`='$number'";
            $mysqli->query($query) or die ($mysqli->error._LINE_);
        } else if ($selected_choice != ''){
            $query="UPDATE `pytania` SET `ile_odp`=`ile_odp`+1, `ile_pom`=`ile_pom`+1 WHERE `pytanie_nr`='$number'";
            $mysqli->query($query) or die ($mysqli->error._LINE_);
        }
        
        
        
        
        if($number == $total) {
            header("Location: final.php");
            exit();
        } else {
            header("Location: question.php?n=".$next);
        }
    }
?>