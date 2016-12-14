<html>
<head></head>
<body>
   <h1 align=center>Tip Calculator</h1>
   <form align=center action="calculator.php" method="post">
   Bill Subtotal: $<input type="text" name="subtotal"><br>
   <?php
      for($i=0; $i < 3; $i++) {
   ?>   
      <input type="radio" name="percent"> <?php echo 10 + $i*5, "%"; ?>

   <?php   
      }
   ?>
</body>
</html>