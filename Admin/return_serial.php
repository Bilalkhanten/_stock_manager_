<?php
    session_start();

    include('../dbcontroller.php');

    if($_POST['submit']=='accept'){
        
        if($_POST['serials']){
            $serials = $_POST['serials'];
            $n = count($serials);

            for($i=0; $i<$n; $i++){
                $query = 'update borrowed set RETURN_DATE = CURDATE() WHERE SERIAL_ID = "'.$serials[$i].'";';

                $result = mysqli_query($link, $query);
            }

            $query = 'update requests set REQUEST_STATUS=1 where REQUEST_ID='.$_SESSION['req_id'];
            $result = mysqli_query($link, $query);

            $query = 'update borrows set CURRENT_QUANTITY = CURRENT_QUANTITY-'.$n.' where BORROWER_ID = "'.$_SESSION['brid'].'" and ITEM_NAME = "'.$_SESSION['iname'].'"';
             
            $result = mysqli_query($link, $query);

            $query = 'update stock set TOTAL_QUANTITY = TOTAL_QUANTITY + '.$n.' where ITEM_NAME="'.$_SESSION['iname'].'"';
            
            $result = mysqli_query($link, $query);
            
            $query = 'select * from borrows;';
            
            $result = mysqli_query($link, $query);

            if($result){
                while($row = mysqli_fetch_assoc($result)){
                    if($row['CURRENT_QUANTITY'] == 0){
                        $query = 'DELETE from borrows where BORROWER_ID = "'.$row['BORROWER_ID'].'"';
                        $result1 = mysqli_query($link, $query);
                    }
                }
            }
            
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