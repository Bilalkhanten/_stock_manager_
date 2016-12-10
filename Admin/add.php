<?php
    //start session
    session_start();
    include('../dbcontroller.php');
    

    //if user is authenticated
    if($_SESSION[ 'IS_AUTHENTICATED' ] && $_SESSION[ 'IS_AUTHENTICATED' ] == 1){
        //compulsory fields
        $bid = $_POST['bid'];
        $bdate = $_POST['bdate'];
        $vid = $_POST['vid'];
        $vname = $_POST['vname'];

        //optional fields
        if(isset($_POST['vph']))
            $vph = $_POST['vph'];
        else    $vph = 'NULL';
        
        if(isset($_POST['vadd']))
            $vadd = $_POST['vadd'];
        else    $vadd = $_POST['vadd'];
        
        //get no of items
        $nitems = $_POST['nitems'];
        
        //get all the items into a 2-D array
        $items = [];
        
        for($i=0; $i< $nitems+1; $i++){
            $tmp = [];
            $tmp[] = $_POST['item'.$i];
            $tmp[] = $_POST['iName'.$i];
            $tmp[] = $_POST['iCategory'.$i];
            $tmp[] = $_POST['iCon'.$i];
            $tmp[] = $_POST['rate'.$i];
            $tmp[] = $_POST['tax'.$i];
            $tmp[] = $_POST['amt'.$i];
            $tmp[] = $_POST['iQty'.$i];
            
            $tp = [];
            for($j=0; $j<$_POST['iQty'.$i]; $j++){
                //echo 'sid'.$i.$j;
                $tp[] = $_POST['sid'.$i.$j];
            }

            $tmp[] = $tp;
            $items[] = $tmp;
        }

        $query = 'CALL adminAdd("'.$vid.'","'.$vname.'","'.$vph.'","'.$vadd.'","'.$bid.'","'.$bdate.'")';

        //Execute query
        $result = mysqli_query($link, $query);
        
        for($i=0; $i<$nitems+1; $i++){
            $query = 'CALL adminAddItem("'.$bid.'","'.$items[$i][0].'","'.$items[$i][2].'",'.$items[$i][3].','.$items[$i][7].','.$items[$i][4].','.$items[$i][5].','.$items[$i][6].',"'.$items[$i][1].'");';
            
            $result = mysqli_query($link, $query);
            //echo $query;
        }

        for($i=0; $i<$nitems+1; $i++){
            for($j=0; $j<$items[$i][7]; $j++){
                $query = 'CALL adminAddSerial("'.$items[$i][8][$j].'","'.$items[$i][0].'","'.$bdate.'","'.$bid.'");';
                
                $result = mysqli_query($link, $query);
            }
        }

        header('location:admin_main.php');

        exit();

    }
    else{
        //go to login form
        header('location:../Login/login_form.php');
        exit();
    }
?>
