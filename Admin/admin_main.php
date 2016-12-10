<?php
	session_start();

    if($_SESSION['USER_ID']!='admin'){
        //go to login form
        header('location:../Login/login_form.php');
        exit();
    }

	if(!($_SESSION[ 'IS_AUTHENTICATED' ] && $_SESSION[ 'IS_AUTHENTICATED' ] == 1)){
		//go to login form
        header('location:../Login/login_form.php');
        exit();
	}
?>
<!doctype html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>Admin Page</title> 
	<meta name="description" content="BlackTie.co - Free Handsome Bootstrap Themes" />	    
	<meta name="keywords" content="themes, bootstrap, free, templates, bootstrap 3, freebie,">
	<meta property="og:title" content="">

	<link rel="stylesheet" type="text/css" href="../includes/css/bootstrap.min.css">
	<link rel="stylesheet" href="../includes/fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">
    <link rel="stylesheet" href="../includes/css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="../includes/css/style.css">	
	
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	
	<link rel="prefetch" href="../includes/images/zoom.png">
    <script src="../includes/js/jquery.min.js"></script>
		
</head>

    
<body class="body_admin">
    
    <div class="navbar navbar-fixed-top" data-activeslide="1">
		<div class="container">
		
			<!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			
			<div class="nav-collapse collapse navbar-responsive-collapse">
				<ul class="nav row">
					<li data-slide="1" class="col-12 col-sm-2"><a id="menu-link-1" href="#slide-1" title="Next Section"><span class="icon icon-home"></span> <span class="text">HOME</span></a></li>
					
                    
                    <li data-slide="2" class="col-12 col-sm-3"><a id="menu-link-2"  data-target="#add_items" data-toggle="modal" href="#add_items" title="Next Section"><span class="icon icon-plus"></span> <span class="text">ADD ITEMS</span></a></li>
					
                    
                    <li data-slide="4" class="col-12 col-sm-3 dropdown"><a id="menu-link-4" class="dropdown-toggle" data-toggle="dropdown" href="#" title="Next Section"><span class="icon icon-briefcase"></span> <span class="text">HANDLE REQUESTS</span><span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a data-target="#issue_request" data-toggle="modal" href="#issue_request">Issue Request</a></li>
                          <li><a data-target="#myModal2" data-toggle="modal" href="#myModal2">Return Request</a></li> 
                        </ul>                    
                    </li>
					
                    
                    <li data-slide="5" class="col-12 col-sm-3"><a id="menu-link-5" data-target="#view_details" data-toggle="modal" href="#view_details" title="Next Section"><span class="icon icon-info-sign"></span> <span class="text">ISSUE DETAILS</span></a></li>
					
                    
                    <li data-slide="6" class="col-12 col-sm-1"><a id="menu-link-6" href="../logout.php" title="Next Section"><span class="text">LOG OUT</span></a></li>
				</ul>
				<div class="row">
					<div class="col-sm-2 active-menu"></div>
				</div>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->
    
    <div id="add_items" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Item(s)</h4>
          </div>
          <div class="modal-body">
            
              <div class="row">
                  <div class="col-sm-12 col-md-8 col-md-offset-2">
                      <form name="ins" action="add.php" method="post" class="form-horizontal admin_add_form">
                        <h2>Bill Details</h2>
                        <div class="form-group">
                            <label for="billid" class="col-sm-3 control-label"> Bill ID* </label>
                            <div class="col-sm-9">
                                <input id="billid" required class="form-control" type="text" name="bid"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="billdate" class="col-sm-3 control-label"> Bill Date* </label>
                            <div class="col-sm-9">
                                <input id="billdate" required class="form-control" type="date" name="bdate"/>
                            </div>
                        </div>


                        <h2>Vendor Details</h2>

                        <div class="form-group">
                            <label for="vendorid" class="col-sm-3 control-label"> Vendor ID* </label>
                            <div class="col-sm-9">
                                <input id="vendorid" required class="form-control" type="text" name="vid"/>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="vendorname" class="col-sm-3 control-label"> Vendor Name* </label>
                            <div class="col-sm-9">
                                <input id="vendorname" maxlength="20" required class="form-control" type="text" name="vname"/>
                            </div>
                        </div>  

                        <div class="form-group">
                            <label for="vendorphone" class="col-sm-3 control-label"> Vendor Phone </label>
                            <div class="col-sm-9">
                                <input id="vendorphone" maxlength="10" class="form-control" type="text" name="vph"/>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="vendoradd" class="col-sm-3 control-label"> Vendor Address </label>
                            <div class="col-sm-9">
                                <input id="vendoradd" maxlength="30" class="form-control" type="text" name="vadd"/>
                            </div>
                        </div> 


                        <h2>Item Details</h2>

                        <div id="itemdet0">

                            <div class="form-group">
                                <label for="itemid" class="col-sm-3 control-label"> Item ID* </label>
                                <div class="col-sm-9">
                                    <input id="itemid" required class="form-control" type="text" name="item0"/>
                                </div>
                            </div> 

                            <div class="form-group">
                                <label for="itemname" class="col-sm-3 control-label"> Item Name* </label>
                                <div class="col-sm-9">
                                    <input id="itemname" required class="form-control" type="text" name="iName0" maxlength="20"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category" class="col-sm-3 control-label"> Category* </label>
                                <div class="col-sm-9">
                                    <select name="iCategory0" id="category" class="form-control" required>
                                        <option value="Batteries">Batteries</option>
                                        <option value="Storage">Storage Devices</option>
                                        <option value="Cords">Cords/Cabels</option>
                                        <option value="Connectors">Connectors</option>
                                        <option value="Monitors">Monitors</option>
                                        <option value="CPUs">CPUs</option>
                                        <option value="Peripherals">Peripherals</option>
                                        <option value="Speakers">Speakers</option>
                                        
                                        
                                        
                                    </select>
                                    <!--<input id="category" required class="form-control" type="text" name="iCategory0"/>-->
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="iconsum" class="col-sm-3 control-label"> Consumability* </label>
                                <div class="col-sm-9">

                                    <input id="iconsum" required type="radio" name="iCon0"/ value="1" checked>Yes&nbsp&nbsp

                                    <input id="iconsum" required type="radio" name="iCon0"/ value="0">No&nbsp
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="rate0" class="col-sm-3 control-label"> Rate* </label>
                                <div class="col-sm-9">
                                    <input id="rate0" required class="form-control" type="text" name="rate0"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="tax0" class="col-sm-3 control-label"> Tax* </label>
                                <div class="col-sm-9">
                                    <input id="tax0" required class="form-control tax" type="number" step="0.01" name="tax0"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="amt0" class="col-sm-3 control-label"> Amount </label>
                                <div class="col-sm-9">
                                    <input id="amt0" class="form-control" type="number" name="amt0" readonly/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="iQty0" class="col-sm-3 control-label"> Quantity* </label>
                                <div class="col-sm-9">
                                    <input id="iQty0" required class="form-control qty" type="number" name="iQty0"/>
                                </div>
                            </div>        



                        <div id="items0"></div>
                        </div>

                        <div id="newItem"> </div>

                        <input type="number" name="nitems" id="theValue" value="0" hidden="true">

                          <br>

                        <center><button class="btn btn-primary" id = "addItem">Add item</button></center>

                        <br><br>
                          <center><input type="submit" class="btn btn-primary" value="Done"></center>
                    </form>
                  </div>
              </div>
              
              
              
          </div>
        
          
            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    
    <div id="issue_request" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Request Item(s)</h4>
          </div>
          <div class="modal-body">
            
              <div class="row">
                  <div class="col-sm-12 col-md-8 col-md-offset-2">
                      <?php
                        //Start the session to see if the user is authencticated user.
                        //session_start();

                        //Check if the user is authenticated first. Or else redirect to login page
                        if(isset($_SESSION[ 'IS_AUTHENTICATED' ]) && $_SESSION[ 'IS_AUTHENTICATED' ] == 1){

                             // make link to database
                             include('../dbcontroller.php');

                             // get all issue requests
                             $query = 'SELECT * FROM requests WHERE REQUEST_TYPE=0 AND REQUEST_STATUS=0';
                             $result = mysqli_query($link, $query);

                             // generate a table for the requests
                             echo '<form name="req" action="allot_serial.php" method="post">
                                <table class="table-bordered table-hover">
                                 <th>Request ID</th>
                                 <th>Borrower ID</th>
                                 <th>Item Name</th>
                                 <th>Quantity</th>
                                 <th>Serial IDs</th>';

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
                                 echo '</td><td><center><button type="submit" name="submit" id="submit'.$i.'" class="submit" value="accept" disabled="true">Accept </button>
                                 <button type="submit" name="submit" value="reject">Reject</button></center></td></tr>';

                                 // passing quantity to jQuery function
                                 $qty = $row['QUANTITY'];
                                 echo "<script> 
                                 var val = [];
                                 val[".$i."] = $qty; </script>";   

                                 break;
                             }

                             echo '</table></form>' ;
                        }
                    ?>
                  </div>
              </div>
              
              
              
          </div>
        
          
            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
	
    <div id="myModal2" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Return Item(s)</h4>
          </div>
          <div class="modal-body">
            
              <div class="row">
                  <div class="col-sm-12 col-md-8 col-md-offset-2">
                      <?php
                        //Start the session to see if the user is authencticated user.
                        //session_start();

                        //Check if the user is authenticated first. Or else redirect to login page
                        if(isset($_SESSION[ 'IS_AUTHENTICATED' ]) && $_SESSION[ 'IS_AUTHENTICATED' ] == 1){

                             // make link to database
                             include('../dbcontroller.php');

                             // get all issue requests
                             $query = 'SELECT * FROM requests WHERE REQUEST_TYPE=1 AND REQUEST_STATUS=0';
                             $result = mysqli_query($link, $query);

                             // generate a table for the requests
                             echo '<form name="req" action="return_serial.php" method="post">
                                <table border="1" class="table-bordered table-hover">
                                 <th>Request ID</th>
                                 <th>Borrower ID</th>
                                 <th>Item Name</th>
                                 <th>Quantity</th>
                                 <th>Serial IDs</th>';

                             $i = 0;
                             while ($row = mysqli_fetch_assoc($result)){
                                 $i++;

                                 // store session variables
                                 $_SESSION['req_id'] = $row['REQUEST_ID'];
                                 $_SESSION['brid'] = $row['BORROWER_ID'];
                                 $_SESSION['iname'] = $row['ITEM_NAME'];
								//echo $row['QUANTITY'];

                                 //enter values into table row
                                 echo '<tr>
                                    <td>' . $row['REQUEST_ID'] .'</td>
                                    <td>' . $row[ 'BORROWER_ID' ]. '</td>';

                                 echo '<td>' . $row[ 'ITEM_NAME' ]. '</td>
                                    <td>' . $row[ 'QUANTITY' ]. '</td>';




                                 // get all issued serials ids
                                 $query = 'SELECT BORROWED.SERIAL_ID FROM BORROWED,ITEM_SERIAL,AVAILABILITY WHERE BORROWED.BORROWER_ID = "'.$_SESSION['brid'].'" AND BORROWED.RETURN_DATE IS NULL AND BORROWED.SERIAL_ID = ITEM_SERIAL.SERIAL_ID AND ITEM_SERIAL.ITEM_ID = AVAILABILITY.ITEM_ID AND AVAILABILITY.ITEM_NAME = "'.$_SESSION['iname'].'"';
                                 
                                 $result1 = mysqli_query($link, $query);


                                 // display serial ids
                                 echo '<td>';
                                 echo "<select name='serials[]' id='serial".$i."' class='serial'  multiple>";

                                 while($r = mysqli_fetch_assoc($result1)){
                                     echo "<option value='".$r['SERIAL_ID']."'>".$r['SERIAL_ID']."</option>";
                                 }

                                 echo "</select>";

                                 // buttons to accept or reject the issue request
                                 echo '</td><td><center><button type="submit" name="submit" id="submit'.$i.'" value="accept" class="submit" disabled>Accept </button><button type="submit" name="submit" value="reject">Reject</button></center></td></tr>';

                                 // passing quantity to jQuery function
                                 $qty = $row['QUANTITY'];
                                 echo "<script> 
                                 var val=  [];
                                 val[".$i."] = $qty; </script>";   

                                 break;
                             }

                             echo '</table></form>' ;
                        }
                    ?>
                  </div>
              </div>
              
              
              
          </div>
        
          
            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    
    <div id="view_details" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Issue Details</h4>
          </div>
          <div class="modal-body">
            
              <div class="row">
                  <div class="col-sm-12 col-md-8 col-md-offset-2">
                      <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT borrows.ITEM_NAME, borrows.BORROWER_ID,borrows.CURRENT_QUANTITY,borrower.BORROWER_NAME FROM borrows,borrower where borrows.BORROWER_ID = borrower.BORROWER_ID order by borrows.BORROWER_ID'; 
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<table border="1" class="table-bordered table-hover">
                        <th>Borrower ID</th>
                        <th>Borrower Name</th>
                        <th>Item Name</th>
                        <th>Item Quantity</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        echo '<tr>
                            <td>'.$row['BORROWER_ID'].'</td>
                            <td>'.$row['BORROWER_NAME'].'</td>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>'.$row['CURRENT_QUANTITY'].'</td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
                  </div>
              </div>
              
              
              
          </div>
        
          
            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
	
    <div id="service_date" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Service Due<!-- onphp
                include('../dbcontroller.php');

                         // get all issue requests
                         $query = 'Select distinct(SERVICE_DATE) from item_serial where DATE(SERVICE_DATE) = DATE_ADD(CURDATE(), INTERVAL 7 DAY)';
                         $result = mysqli_query($link, $query); 

                         while ($row = mysqli_fetch_assoc($result)){
                             echo $row['SERVICE_DATE'];
                         }  
                ?--></h4>
          </div>
          <div class="modal-body">
            
              <div class="row">
                  <div class="col-sm-12 col-md-8 col-md-offset-2">
                      <?php
                        //Start the session to see if the user is authencticated user.
                        //session_start();

                        //Check if the user is authenticated first. Or else redirect to login page
                        if(isset($_SESSION[ 'IS_AUTHENTICATED' ]) && $_SESSION[ 'IS_AUTHENTICATED' ] == 1){

                             // make link to database
                             include('../dbcontroller.php');

                             // get all issue requests
                              $query = 'Select ITEM_ID, SERIAL_ID, SERVICE_DATE from item_serial where DATE(SERVICE_DATE) <= DATE_ADD(CURDATE(), INTERVAL 7 DAY) AND DATE(SERVICE_DATE) >= DATE_ADD(CURDATE(), INTERVAL 1 DAY) order by ITEM_ID';
                             $result = mysqli_query($link, $query);

                             // generate a table for the requests
                             echo '<form name="service" action="service.php" method="post">
                                <table border="1" class="table-bordered table-hover">
                                <th>Item ID</th>
                                <th>Serial ID</th>
                                <th>Service Date</th>';
                                /*Show the rows in the fetched resultset one by one*/
                                
                                while ($row = mysqli_fetch_assoc($result))
                                {
                                echo '<tr>
                                <td>'.$row['ITEM_ID'].'</td>
                                <td>'.$row['SERIAL_ID'].'</td>
                                <td class="input-group">'.$row['SERVICE_DATE'].'&nbsp&nbsp<span class="input-group-btn">   
                                        <input type="text" value="'.$row['SERIAL_ID'].'" name="serial_id" hidden>
                                        <button type="submit" class="btn btn-primary add-to-cart" >Service</button>
                                    </span></td>
                                </tr>';
                                }
                            
                                
                                echo '</table></form>';
                        }
                    ?>
                  </div>
              </div>
              
              
              
          </div>
        
          
            
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>
    
    <div class="slide story" id="slide-admin" data-slide="1">
        <div id="gradient" />
		<div class="container">
			<div id="home-row-1" class="row clearfix">
				<div class="col-12">
                    <h1 class="font-thin">WELCOME <span class="font-semibold">ADMIN</span></h1>
					<br>
					<br>
				</div><!-- /col-12 -->
                
			</div><!-- /row -->
            
            <center>
                <a data-target="#service_date" data-toggle="modal" href="#service_date"><div class="service">
                    <!--2 New Items' Service Due
                    Handle the no. of items-->
                    <?php
                        include('../dbcontroller.php');

                         // get all issue requests
                         $query = 'Select count(*) as Count from item_serial where DATE(SERVICE_DATE) <= DATE_ADD(CURDATE(), INTERVAL 7 DAY) AND DATE(SERVICE_DATE) >= DATE_ADD(CURDATE(), INTERVAL 1 DAY)';
                         $result = mysqli_query($link, $query); 

                         $row = mysqli_fetch_assoc($result);

                         echo $row['Count'] . ' New Item(s) Service Due';
                             
                    ?>
                </div></a>
            </center>
		</div><!-- /container -->
        
	</div><!-- /slide1 -->
    
    
    
    

    <div class="slide story" id="slide-3" data-slide="3">
		<div class="row">
			<div class="col-12 col-sm-6 col-lg-2" hidden>
                <a data-fancybox-group="portfolio" class="fancybox" href="../includes/images/portfolio/p12-large.jpg"><img src="../includes/images/portfolio/p12-small.jpg" alt=""></a>
            </div>
		</div><!-- /row -->
	</div><!-- /slide3 -->
</body>
    
    <!-- SCRIPTS -->
	<script src="../includes/js/html5shiv.js"></script>
	<script src="../includes/js/jquery-1.10.2.min.js"></script>
	<script src="../includes/js/jquery-migrate-1.2.1.min.js"></script>
	<script src="../includes/js/bootstrap.min.js"></script>
	<script src="../includes/js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="../includes/fancybox/jquery.fancybox.pack-v=2.1.5.js"></script>
	<script src="../includes/js/script.js"></script>
	
	

</html>
