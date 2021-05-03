<?php include 'javascriptprocess.php'; ?>

<html>

<head>
	<title>JavaScript Quiz</title>
	<link rel="stylesheet" type="text/css" href="css/finalstyle.css">
</head>

<body>

	<header>
		<div class="contain">
			<p>JavaScript Quiz</p>
		</div>
	</header>

	<main>
			<div class="container">
				<h2>Your Result</h2> <br><br><br><br>
				<p>Congratulation You have completed this test succesfully.</p>
				<p>Your <strong>Score</strong> is <mark><?php echo $_SESSION['score']; ?> </mark> </p>
				<?php unset($_SESSION['score']); ?>

				<button type="button" class="cancelbutton" onclick="document.location='../quizFront.html'">Go Back</button>
				
			</div>

	</main>


	<footer>
			<div>
				Copyright &copy; DL Academy
			</div>
	</footer>

</body>
</html>