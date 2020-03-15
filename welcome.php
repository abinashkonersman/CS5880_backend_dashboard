<!DOCTYPE html>
<html>
<head>
    
    <link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    
    
    
    
<script src="js/jquery.min.js"></script>
	<meta charset="utf-8">
	<title>Quizes</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    
</head>
<body>
<div class="container">
    
    
	<h1 class="page-header text-center">Please Answer The Following Questions:</h1>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form method="POST" action="check_answer.php">
				<?php
					$iterate = 1;
					$conn = new mysqli('localhost', 'root', '', 'loginsystem');

					//this will arrange the questions randomly and 10 only
					$sql = "SELECT * FROM truefalse ORDER BY rand() LIMIT 10";
					$query = $conn->query($sql);
					while($row = $query->fetch_array()){
						?>
						<div>
							<input type="hidden" value="<?php echo $row['questionid']; ?>||<?php echo $iterate; ?>" name="questionid[]">
							<p><?php echo $iterate; ?>. <?php echo $row['question']; ?></p>
							<input type="radio" name="answer_<?php echo $iterate; ?>" value="1"> True
	  						<input type="radio" name="answer_<?php echo $iterate; ?>" value="0"> False
						</div><br>
						<?php

					$iterate++;	
					}
					
				?>
				<button type="submit" class="btn btn-primary">Submit</button>
				<br><br>
			</form>
		</div>
	</div>
</div>
</body>
</html>