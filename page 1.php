<!DOCTYPE html>
<html>
<head>
	<title>Page 1</title>
</head>
<body>
	<h1>Page 1</h1>
	<?php

	$bookname = $publishername = $publisherage = "";

		
		$booknameErr = $publishernameErr = $publisherageErr = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (empty($_POST["bookname"])) {
				$booknameErr = "Book name is required";
			} else {
				$bookname = test_input($_POST["bookname"]);
				
				if (!preg_match("/^[a-zA-Z ]*$/",$bookname)) {
					$booknameErr = "Only letters and white space allowed";
				}
			}

			
			if (empty($_POST["publishername"])) {
				$publishernameErr = "Publisher name is required";
			} else {
				$publishername = test_input($_POST["publishername"]);
				/
				if (!preg_match("/^[a-zA-Z ]*$/",$publishername)) {
					$publishernameErr = "Only letters and white space allowed";
				}
			}

		
			if (empty($_POST["publisherage"])) {
				$publisherageErr = "Publisher age is required";
			} else {
				$publisherage = test_input($_POST["publisherage"]);
				
				if (!is_numeric($publisherage)) {
					$publisherageErr = "Publisher age must be a number";
				}
			}

			
			if (empty($booknameErr) && empty($publishernameErr) && empty($publisherageErr)) {
				header("Location: page2.php?bookname=$bookname&publishername=$publishername&publisherage=$publisherage");
				exit;
			}
		}

		
		function test_input($data) {
			$data = trim($data)
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label for="bookname">Book Name:</label>
		<input type="text" name="bookname" id="bookname" value="<?php echo $bookname;?>">
		<span class="error"><?php echo $booknameErr;?></span><br><br>
		<label for="publishername">Publisher Name:</label>
		<input type="text" name="publishername" id="publishername" value="<?php echo $publishername;?>">
		<span class="error"><?php echo $publishernameErr;?></span><br><br>
		<label for="publisherage">Publisher Age:</label>
		<input type="text" name="publisherage" id="publisherage" value="<?php echo $publisherage;?>">
		<span class="error"><?php echo $publisherageErr;?></span><br><br>
		<input type="submit" value

<input type="reset" value="Reset">
</form>



