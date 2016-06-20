<?php
    session_start();
    session_unset();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>particles.js</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="author" content="Vincent Garreau" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" media="screen" href="css/style.css">
</head>
    
    
<body>
    
<div class='login'>
    <h2>Sign in</h2>
    <form name="login" method="post" action="login_check.php">
        <input name='username' placeholder='Username' type='text'/>
        <input id='pw' name='password' placeholder='Password' type='password'/>
        <input type='submit' value='Sign in'/>
    </form>
</div>
    
    


<!-- particles.js container -->
<div id="particles-js">
    <center><h1 class="header">Welcome to</br> Computer Center</h1></center>
</div>
 
<div>

   <h2 class="footer">
       Designed and Developed by <b>Aman Agarwal</b>, <b>Sachin Kukreja</b>, <b>Shruti Yash</b> and <b>Utsav Poddar</b>.
    </h2>
</div>

<!-- scripts -->
<script src="../particles.js"></script>
<script src="js/app.js"></script>

<!-- stats.js -->
<script src="js/lib/stats.js"></script>
<script>
  
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>


</body>
</html>