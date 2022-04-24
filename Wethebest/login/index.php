<?php
include '../includes/connect.php';
error_reporting(0);
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pwd = $_POST['pswd'];
  $sql = "SELECT * FROM users WHERE email = '$email' AND pasword = '$pwd'";
  $result = mysqli_query($con, $sql);
  // echo mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) {
    session_start();
    while ($rows = $result->fetch_assoc()) {
      $id = $rows['id'];
      $fname = $rows['first_name'];
      $lname = $rows['last_name'];
      $email = $rows['email'];
      $gender = $rows['gender'];
      $dob = $rows['dob'];
      $addres = $rows['addres'];
      $region = $rows['region'];
      $district = $rows['district'];
      $phone = $rows['phone'];
      $pwd = $rows['pasword'];
      $pic = $rows['profile_picture'];
    }
    $_SESSION['user'] = array(
      'fname' => $fname, 'lname' => $lname, 'email' => $email, 'gender' => $gender,
      'dob' => $dob, 'addres' => $addres, 'region' => $region, 'district' => $district,
      'phone' => $phone, 'pwd' => $pwd, 'pic' => $pic, 'id' => $id
    );
    header("Location:../profile/");
  } else {
    header("Location:../register/");
  }
}
session_start()
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="BCS">
  <title>BCS Foundation | Welcome</title>
  <link rel="stylesheet" href="../css/style.css">
  <style>
    .dark {
      width: 30vw;
      margin: 200px auto;
      padding: 3px;
      border-radius: 10px;
    }

    .dark h3 {
      text-align: center;
    }

    form .input-control {
      margin: 10px;
      padding: 2px;
    }

    .input-control input {
      width: 100%;
      outline: none;
      height: 20px;
      border: none;
      border-radius: 4px;
    }

    form button {
      border-radius: 30px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      border: none;
      background: transparent;
      border: 1px solid #fff;
      font-size: 1rem;
      color: #fff;
      transition: .3s;
    }

    form button:hover {
      background: #f44336;
      transition: 1s;
    }
  </style>
</head>

<body>
  <header>
    <!-- HEADING GOES HERE -->
    <?php
    include '../includes/header.php';
    ?>
  </header>
  <div class="dark">
    <h3>Login</h3>
    <form class="quote" method="POST">
      <div class="input-control">
        <label for="email">Email</label><br>
        <input type="email" placeholder="username@gmail.com" id="email" name="email" required>
      </div>
      <div class="input-control">
        <label for="password">Password</label><br>
        <input type="password" placeholder="Password" name="pswd" required>
      </div>
      <!-- <div class="input-control">
          <label>Message</label><br>
          <textarea placeholder="Message"></textarea>
        </div> -->
      <button class="button_1" type="submit" name="login">Login</button>
    </form>
  </div>
  <footer>
    <p>BCS Foundation, Copyright &copy; 2022</p>
    <ul class="social">
      <li><a href=""><i class="fab fa-facebook fa-2x"></i></a></li>
      <li><a href=""><i class="fab fa-instagram fa-2x"></i></a></li>
      <li><a href=""><i class="fab fa-twitter fa-2x"></i></a></li>
      <li><a href=""><i class="fab fa-tiktok fa-2x"></i></a></li>
    </ul>
  </footer>
</body>

</html>