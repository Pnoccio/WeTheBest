<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("Location:../login/");

	/* $_SESSION['user'] = array(
		'fname' => $fname, 'lname' => $lname, 'email' => $email, 'gender' => $gender,
		'dob' => $dob, 'adres' => $adres, 'region' => $region, 'district' => $district,
		'phone' => $phone, 'pwd' => $pwd, 'pic' => $pic
	); */
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile Page</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../profile/profile.css">
</head>

<body>
	<header>
		<!-- HEADING GOES HERE -->
		<?php
		include '../includes/header.php';
		?>
	</header>

	<div class="container">
		<main>
			<aside>
				<div id="profile-img">
					<?php
					$id = $_SESSION['user']['id'];
					include '../includes/connect.php';
					$sql = "SELECT profile_picture FROM users WHERE id = '$id'";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0) {
						while ($rows = $result->fetch_assoc()) {
							$pic = $rows['profile_picture'];
						}
					}
					if ($pic == 'NULL') {
						echo '<img src="../img/avatar.png" alt="" />';
					} else {
						echo '<img src="../profileImages/' . $pic . '" alt="" />';
					}
					?>
					<!-- <img src="../img/avatar.png" alt="" /> -->
				</div>


				<img src="../img/right-alignment.png" alt="" id="menu-list">


				<nav>
					<ul>
						<li>
							<form action="../register/" method="POST">

								<a href=""><input type="submit" value="Edit profile" name="edit_profile"></a>
							</form>
						</li>
						<li><a href="../complaint_form/index.php">fire complain</a></li>
					</ul>
				</nav>
			</aside>
			<section>
				<div id="form-container">
					<form action="#" method="post">
						<div class="form-contents-container">
							<div class="user-infor">
								<div class="heading">
									<h3>Personal Information</h3>
								</div>
								<div class="input-container">
									<label for="">First Name</label>
									<input type="text" value="<?php echo $_SESSION['user']['fname']; ?>" id="" disabled />
								</div>
								<div class="input-container">
									<label for="">Middle Name</label>
									<input type="text" value="<?php echo $_SESSION['user']['lname']; ?>" id="" placeholder="" disabled />
								</div>
								<div class="input-container">
									<label for="">SurName</label>
									<input type="text" value="<?php echo $_SESSION['user']['lname']; ?>" id="" placeholder="" disabled />
								</div>
								<div class="input-container">
									<label for="gender">Gender</label>
									<input type="text" value="<?php echo $_SESSION['user']['gender']; ?>" id="gender" disabled />
								</div>
								<div class="input-container">
									<label for="">Birth Date</label>
									<input type="text" value="<?php echo $_SESSION['user']['dob']; ?>" id="" disabled />
								</div>

								<div class="input-container">
									<label for="">Phone number</label>
									<input type="text" value="<?php echo $_SESSION['user']['phone']; ?>" id="" placeholder="" disabled />
								</div>
							</div>

							<div class="location-infor">
								<div class="heading">
									<h3>Location Information</h3>
								</div>
								<div class="input-container">
									<label for="">Region</label>
									<input type="text" value="<?php echo $_SESSION['user']['region']; ?>" id="" disabled />
								</div>
								<div class="input-container">
									<label for="">Address</label>
									<input type="text" value="<?php echo $_SESSION['user']['adres']; ?>" id="" placeholder="" disabled />
								</div>
							</div>
</body>

</html>