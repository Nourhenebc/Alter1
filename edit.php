<?php
	include('conn.php');
	$id = $_GET['pk6'];
	$query = mysqli_query($conn, "SELECT * FROM `privilege` WHERE id='$id'");
	$row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Basic MySQLi Commands</title>
	<link rel="stylesheet" href="style1.css">
    <style>
	form {
		max-width: 500px;
		margin: 0 auto;
		padding: 20px;
		border: 1px solid #ccc;
		border-radius: 5px;
	}

	label {
		display: block;
		margin-bottom: 10px;
		font-weight: bold;
	}

	input[type="text"] {
		display: block;
		width: 100%;
		padding: 10px;
		margin-bottom: 20px;
		border: 1px solid #ccc;
		border-radius: 5px;
		font-size: 16px;
	}

	input[type="submit"],
	a {
		display: inline-block;
		padding: 10px 20px;
		background-color: #333;
		color: #fff;
		border: none;
		border-radius: 5px;
		font-size: 16px;
		cursor: pointer;
		margin-right: 10px;
		transition: background-color 0.2s ease-out, transform 0.2s ease-out;
	}
    input[type="submit"] {
  display: inline-block;
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  margin-right: 10px;
  position: relative;
  animation: move 2s infinite;
}

@keyframes move {
  0% {
    left: 0;
    background-color: #333;
  }
  50% {
    left: 50px;
    background-color: #f00;
  }
  100% {
    left: 0;
    background-color: #0f0;
  }
}

	h2 {
		font-size: 24px;
		font-weight: bold;
		margin-top: 0;
		text-align: center;
		animation: rainbow-text 3s ease-out infinite;
	}

	@keyframes rainbow-text {
		0% {
			color: #ff0000;
		}

		17% {
			color: #ff7f00;
		}

		34% {
			color: #ffff00;
		}

		51% {
			color: #00ff00;
		}

		68% {
			color: #0000ff;
		}

		85% {
			color: #4b0082;
		}

		100% {
			color: #8f00ff;
		}
	}
    input[type="submit"], a {
	display: inline-block;
	padding: 10px 20px;
	background-color: #333;
	color: #fff;
	border: none;
	border-radius: 5px;
	font-size: 16px;
	cursor: pointer;
	margin-right: 10px;
	position: relative;
	animation: move 2s ease-in-out infinite, color-change 2s ease-in-out infinite;
}

@keyframes move {
	0% { left: 0; }
	50% { left: 50px; }
	100% { left: 0; }
}

@keyframes color-change {
	0% { background-color: #333; }
	25% { background-color: #FF5733; }
	50% { background-color: #DAF7A6; }
	75% { background-color: #900C3F; }
	100% { background-color: #333; }
}

</style>





</head>
<body>
	<form method="POST" action="update.php?id=<?php echo $id; ?>"onsubmit="return validateForm()">
		<h2>Edit</h2>
		<label>ID</label>
		<input type="text" value="<?php echo $row['id']; ?>" name="id" readonly>
		<label>Type:</label>
		<input type="text" value="<?php echo $row['Type']; ?>" name="Type" id="Type">
		<label>file </label>
		<input type="text" value="<?php echo $row['file']; ?>" name="file">
		<label>Description </label>
		<input type="text" value="<?php echo $row['description']; ?>" name="description">
		<input type="submit" name="submit" value="Update">
		<a href="view.php">Back</a>
	</form>
</body>
</html>
<script>
function validateForm() {
  // Check the length of all fields except the submit button
  var inputs = document.querySelectorAll("input:not([type='submit'])");
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].value.length < 3) {
      alert("Please enter a value of at least 3 characters for all fields.");
      return false;
    }
  }
  
  // Check that the Type field has a valid value
  var type = document.getElementById("Type").value.toLowerCase();
  if (type !== "advanced" && type !== "non advanced") {
    alert("Please enter 'Advanced' or 'Non Advanced' for the Type field.");
    return false;
  }
  
  return true;
} </script>