<html>
<head>
<title> input</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
        <div class="container">
 <div class="jumbotron">
                
<form action="core.php" method="post">
<div class="form-group">
<label for="login">User Name:</label>
<input type="text" class="form-control" name="login" id="login">
</div>
<div class="form-group">
<label for="passowrd">Date of birth:</label>
<input type="password" class="form-control" name="password" id="password">
<input type="number" name="crn" value='<?php echo $_GET['crn']; ?>' hidden>
<br>
<button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
</div>
</body>

