<?php
    //Start the session to see if the user is authencticated user.
    session_start();

    //Check if the user is authenticated first. Or else redirect to login page
    if(isset($_SESSION[ 'IS_AUTHENTICATED' ]) && $_SESSION[ 'IS_AUTHENTICATED' ] == 1){
        
         // make link to database
         include('../dbcontroller.php');
         
         // get all issue requests
         $query = 'SELECT * FROM requests WHERE REQUEST_TYPE=0 AND REQUEST_STATUS=0';
         $result = mysqli_query($link, $query);
            
         // generate a table for the requests
         echo '<h1>The Requests are - </h1>' ;
        
         echo '<form name="req" action="allot_serial.php" method="post">
            <table border="0.4">
             <th>Request ID</th>
             <th>Borrower ID</th>
             <th>Item Name</th>
             <th>Quantity</th>
             <th>Serial IDs</th>
             <th></th>';
        
         $i = 0;
         while ($row = mysqli_fetch_assoc($result)){
             $i++;
             
             // store session variables
             $_SESSION['req_id'] = $row['REQUEST_ID'];
             $_SESSION['brid'] = $row['BORROWER_ID'];
             $_SESSION['iname'] = $row['ITEM_NAME'];
             
             
             //enter values into table row
             echo '<tr>
                <td>' . $row['REQUEST_ID'] .'</td>
                <td>' . $row[ 'BORROWER_ID' ]. '</td>';
                
             echo '<td>' . $row[ 'ITEM_NAME' ]. '</td>
                <td>' . $row[ 'QUANTITY' ]. '</td>';
             
             
             
             
             // get all available serials ids
             $query = 'SELECT SERIAL_ID FROM ITEM_SERIAL,AVAILABILITY WHERE SERIAL_ID NOT IN(SELECT SERIAL_ID FROM BORROWED) AND AVAILABILITY.ITEM_NAME = "'.$row['ITEM_NAME'].'" AND AVAILABILITY.ITEM_ID  = ITEM_SERIAL.ITEM_ID';
             
             $result1 = mysqli_query($link, $query);
             
             
             // display serial ids
             echo '<td>';
             echo "<select name='serials[]' id='serial".$i."' class='serial'  multiple>";
             
             while($r = mysqli_fetch_assoc($result1)){
                 echo "<option value='".$r['SERIAL_ID']."'>".$r['SERIAL_ID']."</option>";
             }
             
             echo "</select>";
             
             // buttons to accept or reject the issue request
             echo '</td><td><center><button type="submit" name="submit" id="submit'.$i.'" value="accept" disabled="true">Accept </button><button type="submit" name="submit" value="reject">Reject</button></center></td></tr>';
             
             // passing quantity to jQuery function
             $qty = $row['QUANTITY'];
             echo "<script> val[".$i."] = $qty; </script>";   
             
             break;
         }
        
         echo '</table></form>' ;
    }
    else{
        //go to login form
        header('location:../Login/login_form.php');
        exit();
    }
?>
