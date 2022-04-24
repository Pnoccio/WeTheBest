<?php
// error_reporting(0);
session_start();
include '../includes/connect.php';
if (isset($_POST['register'])) {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $phone = $_POST['phone'];
  $pwd = $_POST['pswd'];
  $address = $_POST['address'];
  /* Checking if the user exists */
  $sql = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($con, $sql);
  // echo mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Sorry User already exists')</script>";
  } else {
    $sql = $con->prepare("INSERT INTO users(first_name,last_name,email,gender,dob,addres,phone,pasword) 
    VALUES(?,?,?,?,?,?,?,?)");
    $sql->bind_param("ssssssis", $fname, $lname, $email, $gender, $dob, $address, $phone, $pwd);
    $result = $sql->execute();
    if ($result) {
      header("Location: ../login/");
    }
  }
}
if (isset($_POST['save'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $dob = $_POST['dob'];
  $phone = $_POST['phone'];
  $pwd = $_POST['pswd'];
  $address = $_POST['address'];
  $id = $_POST['u_id'];

  $sql = "UPDATE users SET first_name='$fname',last_name='$lname',email='$email',gender='$gender',dob='$dob',
  addres='$address',phone='$phone',pasword='$pwd' where id='$id'";
  $result = mysqli_query($con, $sql);
  if ($result) {
    header("Location: ../profile/");
  } else {
    echo "<script>alert('Failed To Update !!')</script>";
    header("Location: ../profile/");
  }
}

/* UPLOADING PROFILE PICTURE */
if (isset($_POST['upload_pic'])) {
  if ($_FILES['picture'] == true) {
    $id = $_POST['u_id'];
    $image = $_FILES['picture'];
    // echo var_dump($image);
    $fileName = $_FILES['picture']['name'];
    $fileTmpName = $image['tmp_name'];
    $fileSize = $image['size'];
    $fileError = $image['error'];
    $fileType = $image['type'];

    // validating Image
    //separating the filename and extention
    $fileExt = explode('.', $fileName);
    //change file extention to lowercase
    $fileActualExt = strtolower(end($fileExt));
    //picture extention allowed
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileActualExt, $allowed)) {
      if ($fileError === 0) {
        $imageNewName = $_SESSION['user']['fname'] . uniqid('', TRUE) . "." . $fileActualExt;
        move_uploaded_file($fileTmpName, "../profileImages/" . basename($imageNewName));

        // Delete the file first
        $sql = "SELECT profile_picture FROM users WHERE id = '$id'";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($rows = $result->fetch_assoc()) {
            $current_pic = $rows['profile_picture'];
          }
        }
        if ($current_pic == 'NULL' || $current_pic == ' ') {

          $sql = "UPDATE users SET profile_picture='$imageNewName' where id='$id'";
          $result = mysqli_query($con, $sql);
          if ($result) {
            header("Location: ../profile/");
          } else {
            echo "<script>alert('Failed To Update !!')</script>";
            header("Location: ../profile/");
          }
        } else {
          $pic = '../profileImages/' . $current_pic;
          if (unlink($pic)) {
            // after delete update the file
            $sql = "UPDATE users SET profile_picture='$imageNewName' where id='$id'";
            $result = mysqli_query($con, $sql);
            if ($result) {
              header("Location: ../profile/");
            } else {
              echo "<script>alert('Failed To Update !!')</script>";
              header("Location: ../profile/");
            }
          }
        }
      } else {
        header("Location: ../profile/");
      }
    } else {
      header("Location: ../profile/");
    }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="description" content="Affordable and professional web design">
  <title>BCS Foundation | Register</title>
  <link rel="stylesheet" href="../css/style.css">
  <!-- <link rel="stylesheet" href="./register.css"> -->
  <style>
    .dark {
        width: 30vw;
        margin: 20px auto;
        padding: 2rem;
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

    .form-container {
        height: 100%;
        width: 80%;
        margin: 50px auto;
        /* border: 2px solid red; */
    }

    .main-title {
        height: auto;
    }

    .main-title p {
        font-size: 30px;
        font-weight: 400;
        color: blueviolet;
    }

    .form-contents-container .heading h3 {
        color: rgb(164, 88, 235);
    }

    .form-contents-container button {
        background: blueviolet;
        padding: 10px;
        outline: none;
        border-radius: 5px;
        border: none;
        width: 5rem;
        cursor: pointer;
        font-weight: 600;
        font-size: 15px;
        float: right;
        color: white;
    }

    .form-contents-container button:hover {
        background-color: #6be26b;
    }

    .input-container {
        width: 15rem;
        margin: 5px auto;
    }

    .form-contents-container .input-container label {
        margin: 0px 0px 10px 0px;
        color: rgb(130, 54, 131);
        font-weight: 900;
    }

    .input-container input,
    select {
        outline: none;
        height: 25px;
        border-radius: 5px;
    }

    .input-container input,
    select {
        width: 100%;


    }

    .input-container input:hover {
        border: 2px solid #6be26b;
    }

    .input-container select:hover {
        border: 2px solid #6be26b;

    }

    .user-infor .heading {
        display: flex;
    }

    .user-infor .heading div {
        font-weight: 900;
        /* width: 10rem; */
        margin: 0px 0px 0px 15vw;
    }

    .user-infor .heading div a {
        text-decoration: none;
    }

    .user-infor .heading div a:hover {
        color: #6be26b;
    }

    .user-infor,
    .farm-infor,
    .location-infor {
        margin: 10px;
    }

    @media screen and (min-width: 600px) {
        .form-container {
            position: relative;
            width: 100%;
            height: 100vh;
            padding: 0 20% 0 20%;
            background: url("farmer-removebg-preview.png");
            background-repeat: no-repeat;
            background-position: 6rem 15rem;
            background-size: 30rem;
            margin: 0 0;
            /* border: 2px solid darkred; */
        }

        .main-title {
            position: absolute;
            top: 1rem;
            left: 5rem;
            /* border: 2px solid yellow; */
            max-width: 30rem;
            height: auto;
        }

        .main-title p {
            font-size: 90px;
            font-weight: bolder;

        }

        .form-contents-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            /* border: 2px solid green; */
            width: 40rem;
            float: right;
            margin: 4rem 0 4rem 0;
        }

        .input-container {
            width: 17rem;
            margin: 5px;
            float: left;
        }

        .form-contents-container .input-control label {
            margin: 0px 0px 10px 0px;
            /* color: rgb(130, 54, 131);*/
            font-weight: 900;
        }

        .input-container input,
        select {
            height: 2rem;
        }

        #reg-btn {
            /* border: 2px solid yellowgreen; */
            padding: 0 4rem 0 0;
        }

        /* #farm-size select,input{
                display: inline-block;
            } */
        #farm-size input {
            width: 5rem;
        }

        #farm-size select {
            width: 11rem;
        }

        #reg-btn {
            margin-top: 0px;
        }

        .form-contents-container button {
            width: 9rem;
            font-size: 18px;
        }
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
    <?php
    if (isset($_POST['edit_profile'])) {
      echo '<h3>Edit</h3>';
    } else {
      echo '<h3>Register</h3>';
    }

    if (isset($_POST['edit_profile'])) {
      $fname = $_SESSION['user']['fname'];
      $lname = $_SESSION['user']['lname'];
      $email = $_SESSION['user']['email'];
      $gender = $_SESSION['user']['gender'];
      $dob = $_SESSION['user']['dob'];
      $adres = $_SESSION['user']['adres'];
      $region = $_SESSION['user']['region'];
      $district = $_SESSION['user']['district'];
      $phone = $_SESSION['user']['phone'];
      $pwd = $_SESSION['user']['pwd'];
      $id = $_SESSION['user']['id'];
      echo '
    <form class="quote" method="POST" enctype="multipart/form-data">
      <label for="pic"><strong>Select picture to upload</strong> </label><br>
      <input type="file" name="picture" id="pic" placeholder="Upload Picture">
      <input type="text" name="u_id" value="' . $id . '" hidden>
      <input type="submit" name ="upload_pic" value="Upload">
    </form>

    <form class="quote" method="POST">
      <div class="heading">
        <h3>Personal Information</h3>
      </div>
        <div class="input-control">
        <label for="First Name">First Name</label><br>
        <input type="text" placeholder="First Name" id="" name="fname" value=" ' . $fname . '">
      </div>
      <div class="input-control">
        <label for="Last Name">Last Name</label><br>
        <input type="text" placeholder="Last Name" id="" name="lname" value=" ' . $lname . '">
      </div>
      <div class="input-control">
        <label for="Email">Email</label><br>
        <input type="email" placeholder="username@gmail.com" id="email" name="email" value=" ' . $email . '">
      </div>
      <div class="input-control" id="gender">
        <label for="Gender">Gender</label>
        <select name="gender" id="gender" value=" ' . $gender . '">
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
      <div class="input-control">
        <label for="dob">Birth date</label>
        <input type="date" name="dob" id="dob" value=" ' . $dob . '">
      </div>
      <div class="input-control">
        <label for="adress">Address</label>
        <input type="text" name="address" id="adress" placeholder="Posta, Ilala" value=" ' . $adres . '">
      </div>
      <div class="input-control">
        <label for="pnum">Phone number</label>
        <input type="text" name="phone" id="pnum" placeholder="0717123456" value=" ' . $phone . '">
      </div>
      <div class="input-control">
        <label for="password">Password</label><br>
        <input type="password" name="pswd" placeholder="Password" value=" ' . $pwd . '">
      </div>
      <input type="text" name="u_id" value="' . $id . '" hidden>
        <button class="button_1" type="submit" name="save">Save</button>
        </form>
        ';
    } else {
      /* NEW USER REGISTRATION */
      echo '
      <form class="quote" method="POST">
<div class="input-control">
        <label for="First Name">First Name</label><br>
        <input type="text" placeholder="First Name" id="" name="fname" required>
      </div>
      <div class="input-control">
        <label for="Last Name">Last Name</label><br>
        <input type="text" placeholder="Last Name" id="" name="lname" required>
      </div>
      <div class="input-control">
        <label for="Email">Email</label><br>
        <input type="email" placeholder="username@gmail.com" id="email" name="email" required>
      </div>
      <div class="input-control" id="gender">
        <label for="Gender">Gender</label>
        <select name="gender" id="gender" required>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>
      <div class="input-control">
        <label for="dob">Birth date</label>
        <input type="date" name="dob" id="dob" required>
      </div>
      <div class="input-control">
        <label for="adress">Address</label>
        <input type="text" name="address" id="adress" placeholder="Posta, Ilala" required>
      </div>
      <div class="input-control">
        <label for="pnum">Phone number</label>
        <input type="text" name="phone" id="pnum" placeholder="0717123456" required>
      </div>
      <div class="input-control">
        <label for="password">Password</label><br>
        <input type="password" name="pswd" placeholder="Password" required>
      </div>
         <button class="button_1" type="submit" name="register">register</button>
         </form>
         ';
    }

    ?>
    </form>
  </div>
  <footer>
    <p>BCS Foundation, Copyright &copy; 2022</p>
  </footer>
</body>

</html>