<?php  
	$names = ["Rock", "Paper", "Scissors"];
	if(!isset($_GET['name'])) {
		die("Name parameter missing");
	}
	if(isset($_POST['logout'])) {
		header('Location: index.php');
	}
	function check($computer, $human) {
		if($computer == $human) {
			return "Tie";
		} elseif ( ($computer == 2 && $human == 0) ||
					($computer == 0 && $human== 1) ||
					($computer == 1 && $human == 2)) {
			return "You Win";
		} else {
			return "You Lose";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Afrin Dange</title>
</head>
<body style="padding: 30px;">
	<h1>Rock Paper Scissors</h1>
	<p>Welcome: <?php echo $_GET['name']; ?></p>
	<form method="POST">
		<select name="human">
			<option value="-1">Select</option>
			<option value="0">Rock</option>
			<option value="1">Paper</option>
			<option value="2">Scissors</option>
			<option value="3">Test</option>
		</select>
		<input type="submit" value="Play">
		<input type="submit" name="logout" value="logout">
	</form>
	<div style="padding: 10px; background-color: #D3D3D3; border-radius: 5px;">
		<?php 
			if(isset($_POST['human'])) {
				if($_POST['human'] >= 0 && $_POST['human'] <= 2) {
					$computer = rand(0,2);
					echo "Your Play=".$names[$_POST['human']]." Computer Play=".$names[$computer]." Result=".check($computer, $_POST['human']);
				} else {
					if($_POST['human'] == 3) {
						for($c=0; $c<3; $c++) {
							for($h=0; $h<3; $h++) {
								$r = check($c, $h);
								print "Human=$names[$h] Computer=$names[$c] Result=$r<br>";
							}
						}
					}
				}
			}
		?>
	</div>
</body>
</html>