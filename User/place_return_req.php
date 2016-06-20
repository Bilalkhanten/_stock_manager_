<?php
    session_start();
    include('../dbcontroller.php');
    

    //if user is authenticated
    if($_SESSION[ 'IS_AUTHENTICATED' ] && $_SESSION[ 'IS_AUTHENTICATED' ] == 1){
        $brid = $_SESSION['brid'];
        $iname = $_POST['inames'];
        $qty = $_POST['qty'];
	   
        $i = $_POST['idx'];
        
        //print_r($_POST);
        
        
        if($_POST['quantity'.$i]>=1 && $_POST['quantity'.$i] <= $qty[$i]){
            $query = 'insert into requests (BORROWER_ID, ITEM_NAME, QUANTITY, REQUEST_TYPE, REQUEST_STATUS) values ("'.$brid.'","'.$iname[$i].'",'.$_POST['quantity'.$i].',1,0)';
            
            echo $query;
            $result = mysqli_query($link, $query);
        }
        
        
        header('location:user_main.php');
        
        exit();
    }
    else{
        //go to login form
        header('location:../Login/login_form.php');
        exit();
    }
?>