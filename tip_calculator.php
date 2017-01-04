<html>
<head>
   <style>
   div {
	   width: 200px;
	   border: 1px solid black;
	   padding: 20px;
	   text-align: left;
	   margin: 0 auto;
   }
   </style>
</head>
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
   <br><br>
   
   <?php
      if(isset($_POST["percent"]) && isset($_POST["subtotal"]) && !empty($_POST["subtotal"])) {
		  $subtotal = $_POST["subtotal"];
		  if(is_numeric($subtotal) && $subtotal > 0) {
   ?>
            <div>
	        Tip: <?php
			         $percent = $_POST["percent"];
					 $tip = ($percent / 100) * $subtotal;
					 echo '$', number_format((float)$tip, 2, '.', '');
			     ?>
			<br><br>
	        Total: <?php
			          $total = $tip + $subtotal;
					  echo '$', number_format((float)$total, 2, '.', '');
			       ?>
	        </div>
   <?php
		  }   
	  }
   ?>
</body>
</html>