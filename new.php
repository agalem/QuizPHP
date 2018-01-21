<?php include 'database.php'; ?>
<?php

    $new_question = $_POST['newquestion'];
    $new_correct = $_POST['newchoice'];
    
    $new_choice1 = $_POST['newchoice1'];
    $new_choice2 = $_POST['newchoice2'];
    $new_choice3 = $_POST['newchoice3'];
    $new_choice4 = $_POST['newchoice4'];
    $new_choice5 = $_POST['newchoice5'];


    if($new_question != ''){
        $query = "UPDATE pytania SET tekst='$new_question' WHERE pytanie_nr=$number";
        
        $update_row = $mysqli->update($query);
    }
        


?>