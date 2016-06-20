<?php
	session_start();
	if($_SESSION['USER_ID']=='admin'){
		//go to login form
        header('location:../Login/Login/login_form.php');
        exit();
	}
	
	if(!($_SESSION[ 'IS_AUTHENTICATED' ] && $_SESSION[ 'IS_AUTHENTICATED' ] == 1)){
		//go to login form
        header('location:../Login/Login/login_form.php');
        exit();
	}
?>
<!doctype html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	
	<title>User Request</title> 
	<meta name="description" content="BlackTie.co - Free Handsome Bootstrap Themes" />	    
	<meta name="keywords" content="themes, bootstrap, free, templates, bootstrap 3, freebie,">
	<meta property="og:title" content="">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fancybox/jquery.fancybox-v=2.1.5.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/font-awesome.min.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="css/style.css">	
	
	<link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,600,300,200&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	
	
	<link rel="prefetch" href="images/zoom.png">
    <script src="../jquery.min.js"></script>
	
    <script type="text/javascript">
        var link;
        $(document).ready(function(){
           $(".al").click(function(){
                link = $(this).attr('value');
               
               console.log(link);
           });
        });
    </script>
    
</head>

<body>
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
					<li data-slide="2" class="col-12 col-sm-3"><a id="menu-link-2" href="#slide-2" title="Next Section"><span class="icon icon-th-large"></span> <span class="text">CONSUMABLE PRODUCTS</span></a></li>
					<li data-slide="4" class="col-12 col-sm-3"><a id="menu-link-4" href="#slide-4" title="Next Section"><span class="icon icon-th"></span> <span class="text">NON-CONSUMABLE PRODUCTS</span></a></li>
					<li data-slide="5" class="col-12 col-sm-3"><a id="menu-link-5" href="#slide-5" title="Next Section"><span class="icon icon-list-alt"></span> <span class="text">YOUR ITEMS</span></a></li>
					<li data-slide="6" class="col-12 col-sm-1"><a id="menu-link-6" href="../logout.php" title="Next Section"><span class="text">LOG OUT</span></a></li>
				</ul>
				<div class="row">
					<div class="col-sm-2 active-menu"></div>
				</div>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->
	
	
	<!-- === Arrows === -->
	<div id="arrows">
		<div id="arrow-up"></div>
		<div id="arrow-down"></div>
		<div id="arrow-left" class="disabled visible-lg"></div>
		<div id="arrow-right" class="disabled visible-lg"></div>
	</div><!-- /.arrows -->
	
	
	<!-- === MAIN Background === -->
	<div class="slide story" id="slide-1" data-slide="1">
        <div id="gradient" />
		<div class="container">
			<div id="home-row-1" class="row clearfix">
				<div class="col-12">
                    <h1 class="font-semibold">Place Your Request</h1>
					<br>
					<br>
				</div><!-- /col-12 -->
			</div><!-- /row -->
			
		</div><!-- /container -->
	</div><!-- /slide1 -->
	
	<!-- === Slide 2 === -->
    
        <div class="slide story" id="slide-2" data-slide="2">
            <div class="container">
                <div class="row title-row">
                    <div class="col-12 font-thin">Consumable Products<span class="font-semibold"></div>
                </div><!-- /row -->


                <div class="row line-row">
                    <div class="hr">&nbsp;</div>
                </div><!-- /row -->

                <table class="table table-hover table-responsive table-bordered">
                    <tbody>
                        <tr>
                           
                            <th>Category</th>
                            
                        </tr>
                        <tr>
                            

                            <td><a data-target="#Batteries" data-toggle="modal" href="#Batteries">Batteries</a></td>
                            
                        </tr>
                        
                         <tr>
                            
                            <td><a data-target="#Storage" data-toggle="modal" href="#Storage">Storage Devices</a></td>
                             
                        </tr>
                        
                        <tr>
                            

                            <td><a data-target="#Cords" data-toggle="modal" href="#Cords">Cords/Cables</a></td>
                            
                        </tr>
                        
                         <tr>
                            

                            <td><a data-target="#Connectors" data-toggle="modal" href="#Connectors">Connectors</a></td>
                            
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        
        
    <div class="slide story" id="slide-4" data-slide="4">
            <div class="container">
                <div class="row title-row">
                    <div class="col-12 font-thin">Non-Consumable Products<span class="font-semibold"></div>
                </div><!-- /row -->


                <div class="row line-row">
                    <div class="hr">&nbsp;</div>
                </div><!-- /row -->

                 <table class="table table-hover table-responsive table-bordered">
                    <tbody>
                        <tr>
                           
                            <th>Category</th>
                            
                        </tr>
                        <tr>
                            

                            <td><a data-target="#Peripherals" data-toggle="modal" href="#Peripherals">Peripherals</a></td>
                            
                        </tr>
                        
                         <tr>
                            
                            <td><a data-target="#Monitors" data-toggle="modal" href="#Monitors">Monitors</a></td>
                             
                        </tr>
                        
                         <tr>
                            

                            <td><a data-target="#Speakers" data-toggle="modal" href="#Speakers">Speakers</a></td>
                            
                        </tr>
                        
                         <tr>
                            

                            <td><a data-target="#CPUs" data-toggle="modal" href="#CPUs">CPUs</a></td>
                            
                        </tr>
						
                        
                    </tbody>
                </table>
               
            </div>
        </div>
    </div>

    
    
        <div class="slide story" id="slide-5" data-slide="5">
            <div class="container">
                <div class="row title-row">
                    <div class="col-12 font-thin">Your Items</div>
                </div><!-- /row -->


                <div class="row line-row">
                    <div class="hr">&nbsp;</div>
                </div><!-- /row -->
                
                <?php
				//session_start();				
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT ITEM_NAME, CURRENT_QUANTITY FROM borrows where BORROWER_ID = "'.$_SESSION['USER_ID'].'"'; 
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
            
                echo '<form name="place_req" id="ret_form" action="place_return_req.php" method="post">
                    <input type="number" id="idx" name="idx" value="-1" hidden>
                    <table class="table table-hover table-responsive table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Issued</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        $query = 'select CURRENT_QUANTITY from borrows where ITEM_NAME="'.$row['ITEM_NAME'].'" and BORROWER_ID = "'.$_SESSION['USER_ID'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['inames'] = [];
                        $_SESSION['inames'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['CURRENT_QUANTITY'];
                            
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["CURRENT_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    
                                    
                                    <span class="input-group-btn">
                                        <button id ="ret_item'.$i.'" class="btn btn-primary add-to-cart ret_item">Return </button>
                                    </span>
                                </div>

                            </td>
                            <td>'.$row['CURRENT_QUANTITY'].'</td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table></form>';
                
                    ?>
                 
            </div>
        </div>

	<!-- === SLide 3 - Portfolio -->
	<div class="slide story" id="slide-3" data-slide="3">
		<div class="row">
			<div class="col-12 col-sm-6 col-lg-2" hidden>
                <a data-fancybox-group="portfolio" class="fancybox" href="images/portfolio/p12-large.jpg"><img src="images/portfolio/p12-small.jpg" alt=""></a>
            </div>
		</div><!-- /row -->
	</div><!-- /slide3 -->
    
    <!--Example for one category-->
    

	
	
	
    <div id="Batteries" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Batteries</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME FROM item INNER JOIN availability ON item.ITEM_ID = availability.ITEM_ID WHERE CONSUMABILITY = 1 and CATEGORY = "Batteries" GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                            
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>
    
    <div id="Storage" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Storage Devices</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME
                FROM item INNER JOIN availability
                ON item.ITEM_ID = availability.ITEM_ID
                WHERE CONSUMABILITY = 1 and CATEGORY = "Storage"
                GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>    
    
    <div id="Cords" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Cords/Cables</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME
                FROM item INNER JOIN availability
                ON item.ITEM_ID = availability.ITEM_ID
                WHERE CONSUMABILITY = 1 and CATEGORY = "Cords"
                GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>
    
    <div id="Connectors" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Connectors</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME
                FROM item INNER JOIN availability
                ON item.ITEM_ID = availability.ITEM_ID
                WHERE CONSUMABILITY = 1 and CATEGORY = "Connectors"
                GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>
    
    	
    <div id="Peripherals" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Peripherals</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME FROM item INNER JOIN availability ON item.ITEM_ID = availability.ITEM_ID WHERE CONSUMABILITY = 0 and CATEGORY = "Peripherals" GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>
	
	
    <div id="Monitors" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Monitors</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME FROM item INNER JOIN availability ON item.ITEM_ID = availability.ITEM_ID WHERE CONSUMABILITY = 0 and CATEGORY = "Monitors" GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>
	
	
    <div id="Speakers" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Speakers</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME FROM item INNER JOIN availability ON item.ITEM_ID = availability.ITEM_ID WHERE CONSUMABILITY = 0 and CATEGORY = "Speakers" GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>
    
    <div id="CPUs" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">CPUs</h4>
          </div>
          <div class="modal-body">
            <?php
                /*Connect to mysqli server*/
                include ('../dbcontroller.php');
              
                /*Create query*/
                $qry = 'SELECT item.ITEM_ID, availability.ITEM_NAME
                FROM item INNER JOIN availability
                ON item.ITEM_ID = availability.ITEM_ID
                WHERE CONSUMABILITY = 0 and CATEGORY = "CPUs"
                GROUP BY availability.ITEM_NAME';
                
                /*Execute query*/
                $result = mysqli_query($link, $qry);
                
                /*Draw the table for Players*/
                echo '<form name="place_req" action="place_issue_req.php" method="post">
                    <table class="table-hover table-bordered" border="1">
                        <th>Item Name</th>
                        <th>Item Quantity</th>
                        <th>Total Items Available</th>';
              
                /*Show the rows in the fetched resultset one by one*/
                if($result)
                {
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result))
                    {
                        /* get available quantity of a particular item name*/
                        $query = 'select TOTAL_QUANTITY from stock where ITEM_NAME="'.$row['ITEM_NAME'].'"';
                        $res = mysqli_query($link, $query);
                        $qty = mysqli_fetch_assoc($res);
                        
                        /* set SESSION variables */
                        $_SESSION['brid'] = $_SESSION['USER_ID'];
                        $_SESSION['iname'] = [];
                        $_SESSION['iname'][$i] = $row['ITEM_NAME'];
                        $_SESSION['qty'] = [];
                        $_SESSION['qty'][$i] = $qty['TOTAL_QUANTITY'];
                        
                        echo '<tr>
                            <td>'.$row['ITEM_NAME'].'</td>
                            <td>

                                <div class="input-group">
                                    <input type="text" name="inames[]" value="'.$row["ITEM_NAME"].'" hidden="true">
                                    <input type="number" name="qty[]" value="'.$qty["TOTAL_QUANTITY"].'" hidden="true">
                                    <input type="number" name="quantity'.$i.'" value="0" min="0" class="form-control" placeholder="Type quantity here...">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-primary add-to-cart">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Add for order</button>
                                    </span>
                                </div>

                            </td>
                            <td><center>'.$qty['TOTAL_QUANTITY'].'</center></td>
                            </tr>';

                        $i++;
                    }
                }
                
                echo '</table>';
                
                ?>
          </div>
          <div class="modal-footer">
            <button type="submit" id="submit" name="submit" class="btn btn-default">Request Complete</button>
             
            <?php echo '</form>'; ?>
          </div>
        </div>

      </div>
    </div>
	
	
</body>

	<!-- SCRIPTS -->
	<script src="js/html5shiv.js"></script>
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/jquery-migrate-1.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox.pack-v=2.1.5.js"></script>
	<script src="js/script.js"></script>
	

</html>