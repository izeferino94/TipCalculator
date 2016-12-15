<html>
<head></head>
<body>
   <h1 align=center>Tip Calculator</h1>
   <form align=center action="tip_calculator.php" method="post">
   Bill Subtotal: $<input type="text" name="subtotal" value="<?php 
      if(isset($_POST["subtotal"])) {
		  echo $_POST["subtotal"];
	  }
	  else
	  {
		  echo "";
	  }
   ?>"><br><br> 
   Tip Percentage:
   <?php
      for($i=0; $i < 3; $i++) {
		  $x = 10 + $i*5;
   ?>   
      <input type="radio" name="percent" value="<?php echo $x; ?>"
         <?php 
	        if(isset($_POST["percent"]) && $_POST["percent"] == $x) {
			   echo ' checked="checked"';
		    }
         ?>>
	  <?php echo $x, "%"; ?>
   <?php   
      }
   ?>
   <br><br>
   <input type="submit">
</body>
</html>