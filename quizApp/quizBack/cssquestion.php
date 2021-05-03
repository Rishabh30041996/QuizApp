<?php 

	include 'db.php';
	session_start(); 
	//Set Question Number
	$number = $_GET['n'];

	//Query for the Question
	$query = "SELECT * FROM cssquestions WHERE question_number = $number";

	// Get the question
	$result = mysqli_query($connection,$query);
	$question = mysqli_fetch_assoc($result); 

	//Get Choices
	$query = "SELECT * FROM cssoptions WHERE question_number = $number";
	$choices = mysqli_query($connection,$query);

	// Get Total questions
	$query = "SELECT * FROM cssquestions";
	$total_questions = mysqli_num_rows(mysqli_query($connection,$query));
 	
	
?>

<html>
<head>

	<title>CSS Quiz</title>
	<link rel="stylesheet" type="text/css" href="css/questionstyle.css">

</head>

<body>

	<header>
		<div class="container">
			<p>CSS Quiz</p>
		</div>
	</header>

	<main>
			<div class="container">

				<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div>
				<p class="question"><?php echo $question['question_text']; ?> </p>

				<form method="POST" action="cssprocess.php">

					<ul class="choicess">
						<?php while($row=mysqli_fetch_assoc($choices)){ ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['option_']; ?></li>
						<?php } ?>	
					</ul>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					<input type="submit" name="submit" value="Submit" class="submitbutton">

				</form>
				
			</div>

	</main>


	<footer>
			<div class="container">
				Copyright &copy; DL Academy
			</div>
	</footer>

</body>
</html>