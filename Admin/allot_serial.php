<?php
    session_start();

    include('../dbcontroller.php');

    if($_POST['submit']=='accept'){
        if($_POST['serials']){
            $serials = $_POST['serials'];
            $n = count($serials);

            for($i=0; $i<$n; $i++){
                $query = 'insert into borrowed values ("'.$_SESSION['brid'].'","'.$serials[$i].'","'.Date('Y-m-d').'",NULL);';

                $result = mysqli_query($link, $query);
            }

            $query = 'update requests set REQUEST_STATUS=1 where REQUEST_ID='.$_SESSION['req_id'];
            $result = mysqli_query($link, $query);

            $query = 'insert into borrows (ITEM_NAME, BORROWER_ID, CURRENT_QUANTITY) values ("'.$_SESSION['iname'].'","'.$_SESSION['brid'].'",'.$n.') on duplicate key update CURRENT_QUANTITY=CURRENT_QUANTITY+'.$n;
             
            $result = mysqli_query($link, $query);

            $query = 'update stock set TOTAL_QUANTITY = TOTAL_QUANTITY - '.$n.' where ITEM_NAME="'.$_SESSION['iname'].'"';
            
            $result = mysqli_query($link, $query);
            
            
            header('location:admin_main.php');
            
            exit();
        }
        else{
            header('location:handle_requests.php');
            exit();
        }
    }
    else if($_POST['submit']=='reject'){
        $query = 'update requests set REQUEST_STATUS=2 where REQUEST_ID='.$_SESSION['req_id'];
        $result = mysqli_query($link, $query);
        
        header('location:admin_main.php');
        
        exit();
    }
?>
