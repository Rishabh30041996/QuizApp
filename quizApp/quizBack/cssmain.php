<?php 
include 'db.php';
$query = "SELECT * FROM cssquestions";
$total_questions = mysqli_num_rows(mysqli_query($connection,$query));


?>
<html>
<head>

	<title>CSS Quiz</title>
	<link rel="stylesheet" type="text/css" href="css/mainstyle.css">

</head>

<body>

	<header>
		<div class="contain">
			<p>CSS Quiz</p>
		</div>
		<hr>
	</header>

	<main>
			<div class="container">

				<h2>Test Your CSS Knowledge</h2>
				<p>
					This is a multiple choise quiz to test your CSS Knowledge.
				</p>
				<ul>
					<li><strong>Number of Questions :</strong>&nbsp<?php echo  $total_questions; ?> </li>
					<li><strong>Type :</strong> &nbsp Multiple Choise</li>
					<li><strong>Estimated Time :</strong> &nbsp <?php echo  $total_questions*.5; ?>min.</li>
				</ul><br>
				
				<a href="cssquestion.php?n=1" class="start">Start Quiz</a>

			</div>
	</main>


	<footer>
			<div>
				Copyright &copy; DL Academy
			</div>
	</footer>
</body>
</html>	
