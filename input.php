<!DOCTYPE html>
<html>

<head>
	
	<title>Input</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $nimErr = $hpErr = $umurErr =  "";
$name = $email = $gender = $nim = $hp = $umur = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["txtnama"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["txtnama"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "harus abjad"; 
    }
  }

  if (empty($_POST["txtnim"])) {
    $nimErr = "nim is required";
  } else {
    $nim = test_input($_POST["txtnim"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($nim)) {
      $nimErr = "harus angka"; 
    }
  }

  if (empty($_POST["hp"])) {
    $hpErr = "hp is required";
  } else {
    $hp = test_input($_POST["hp"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($hp)) {
      $hpErr = "harus angka"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "format salah"; 
    }
  }

  if (empty($_POST["txtumur"])) {
    $umurErr = "Email is required";
  } else {
    $umur = test_input($_POST["txtumur"]);
    // check if e-mail address is well-formed
    if (!is_numeric($umur)) {
      $umurErr = "format salah"; 
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
	
	<div class="header">
		<h2>Register</h2>
	</div>
	<form name="RegForm" form method="post" action="database.php" onsubmit="return <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<div class="input-group">
			<label>Nim</label>
			<input type="text" name="txtnim" value="<?php echo $nim;?>">
  <span class="error">* <?php echo $nimErr;?></span>
		</div>
		<div class="input-group">
			<label>Nama</label>
			<input type="text" name="txtnama" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
        </div>
        <div class="input-group">
			<label>Umur</label>
			<input type="text" name="txtumur" value="<?php echo $umur;?>">
  <span class="error">* <?php echo $umurErr;?></span>
		</div>
		<div class="input-group">
			<label>email</label>
			<input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
		</div>
		<div class="input-group">
		<label>hp</label>
		<input type="text" name="hp" value="<?php echo $hp;?>">
  <span class="error">* <?php echo $hpErr;?></span>
		</div>
		<div class="input-group">
		<label>gender</label>
		<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
		</div>
		<a href="views/index.php">Lihat</a>
		<input type="submit" >

	</form>
	<div class="header">
		<h2>Hasil Input</h2>
	</div>
	<form name="RegForm" form method="post" action="database.php">
		<div class="input-group">
		<?php

		echo $nim;
		echo "<br>";
		echo $nim;
		echo "<br>";
		echo $nim;
		echo "<br>";
		echo $nim;
		echo "<br>";
		echo $nim;
		echo "<br>";
		
		?>
		</div>
		
	</form>
	
</body>

</html>