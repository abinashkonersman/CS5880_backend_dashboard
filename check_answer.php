<!DOCTYPE html>
<html>
<head>
    
    <link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elegent Tab Forms,Login Forms,Sign up Forms,Registration Forms,News latter Forms,Elements"./>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
</script>
<script src="js/jquery.min.js"></script>
    
    
	<meta charset="utf-8">
	<title>Your Score Board :</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Your Score Board</h1>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
		<?php
			$conn = new mysqli('localhost', 'root', '', 'loginsystem');

			$score = 0;

			foreach($_POST['questionid'] as $question):
				$info = explode("||", $question);

				$questionid = $info[0];
				$iterate = $info[1];

				$sql = "SELECT * FROM truefalse WHERE questionid = '$questionid'";
				$query = $conn->query($sql);
				$row = $query->fetch_array(); 

				?>
				<div>
					<p><?php echo $iterate; ?>. <?php echo $row['question']; ?></p>
					<p>Correct Answer: <?php if($row['answer']==1){ echo 'True';} else{ echo 'False';} ?></p>
					<?php
						if (isset($_POST['answer_'.$iterate])){
							?>
							You Answered: <?php if($_POST['answer_'.$iterate] == 1){echo 'True';} else{echo 'False';} ?><br>
							<?php
							if ($_POST['answer_'.$iterate] == $row['answer']){
								echo '<span class="glyphicon glyphicon-check"></span> Correct<br><br>';
								$score = $score + 1;
							}
							else{
								echo '<span class="glyphicon glyphicon-remove"></span> Wrong<br><br>';
							}
						}
					?>		
				</div>
				<?php
				
			endforeach;

		?>
		<h2>Score: <?php echo $score; ?></h2>
		</div>
	</div>
</div>
</body>
</html>