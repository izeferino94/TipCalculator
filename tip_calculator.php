<html>
<head>
   <style>
   .buttonHolder{ 
      text-align: center;
	  
   }
   
   .costs {
	   width: 250px;
	   border: 1px solid black;
	   padding: 7px;
	   text-align: left;
	   line-height: 1.5;
	   margin: 0 auto;
	   font-family: Tahoma, Geneva, sans-serif;
	   background-color: #2374AB;
	   color: #D6FFF6;
   }
   
   #main {
	   width: 300px;
	   border: 1px solid black;
	   padding: 20px;
	   line-height: 1.5;
	   margin: 0 auto;
	   font-family: Tahoma, Geneva, sans-serif;
	   background-color: #003554;
	   color: #D6FFF6;
   }
   
   .err {
	   font-family: Tahoma, Geneva, sans-serif;
       color: #D6FFF6;
   }
   
   </style>
</head>
<body bgcolor="#0A2239">
   <div id="main">
   <h1 align=center style="color:#4DCCBD;">Tip Calculator</h1>
   <form action="tip_calculator.php" method="post">
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
   <br>
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
   <br>
   <input type="radio" name="percent" value="customPerc" 
      <?php
	     if(isset($_POST["percent"]) && $_POST["percent"] == 'customPerc') {
			 echo ' checked="checked" ';
		 }
	   ?>> Custom:
   <input type="text" name="custom" size="1" value="<?php 
      if(isset($_POST["custom"])) {
		  echo $_POST["custom"];
	  }
	  else
	  {
		  echo "";
	  }
   ?>">%
   <br>
   Split: <input type="text" name="split" size="2" value="<?php 
      if(isset($_POST["split"])) {
		  echo $_POST["split"];
	  }
	  else
	  {
		  echo "";
	  }
   ?>"> person(s)
   <br><br>
   <div class="buttonHolder">
      <input type="submit">
   </div>
   <br>
   
   <?php
      if(isset($_POST["percent"]) && isset($_POST["subtotal"]) && !empty($_POST["subtotal"])) {
		  $subtotal = $_POST["subtotal"];
   ?>
            <div class="costs">
	             <?php
			         $percent = $_POST["percent"];
					 if($percent == 'customPerc') {
						 $percent = $_POST["custom"];
					 }
					 if($percent <= 0 || !is_numeric($percent) || !is_numeric($subtotal) || $subtotal <= 0 || (isset($_POST["split"]) && $_POST["split"] <= 0)) {
				 ?>
				<p align="center">Invalid Input: Must be a numeric value greater than 0!</p>
				<?php
					 }
					 else {
				 ?>
				
			Tip: <?php
						$tip = ($percent / 100) * $subtotal;
					    echo '$', number_format((float)$tip, 2, '.', '');
				 ?>
			<br>
			Total: <?php
			          $total = $tip + $subtotal;
					  echo '$', number_format((float)$total, 2, '.', '');
			     ?>
			<br>
			<?php
			   if(isset($_POST["split"])) {
				   $splitNum = $_POST["split"];
				   if($splitNum > 1) {
					   $tipSplit = $tip / $splitNum;
					   $totalSplit = $total / $splitNum;
			?>
			          Tip Each: <?php
					    echo '$', number_format((float)$tipSplit, 2, '.', '');
				 ?>
					  <br>
					  Total Each: <?php
					  echo '$', number_format((float)$totalSplit, 2, '.', '');
					 }
			     ?>
			<?php
				   }
				}
			   }
			?>
	        </div>
   </div>
</body>
</html>