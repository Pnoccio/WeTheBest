<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="BCS">
  <title>BCS Foundation | Report Complaint</title>
  <link rel="stylesheet" href="../css/style.css">
  <!-- <link rel="stylesheet" href="../css/complaint.css"> -->
  <style>
    .dark {
    width: 30vw;
    margin: 20px auto;
    padding: 2rem;
    border-radius: 5px;
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

  .input-control textarea{
    width: 100%;
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
    <div class="container">
        <div class="dark">
          <h3>Report a Complaint</h3>
          <form class="quote">
            <div class="input-control">
              <label>Full Name</label><br>
              <input type="text" placeholder="Full Name">
            </div>
            <div class="input-control">
              <label>Email</label><br>
              <input type="email" placeholder="Emial Address">
            </div>
            <div class="input-control" id="gender">
                <label for="Gender">Gender</label>
                <select name="gender" id="gender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            </div>    
            <div class="input-control">
              <label for="adress">Address</label>
              <input type="text" name="address" id="adress" placeholder="Posta, Ilala" required>
            </div>
            <div class="input-control">
              <label>Message</label><br>
              <textarea placeholder="Message"></textarea>
            </div>
            <div class="input-control">
              <label>Name of Victim</label><br>
              <input type="text" placeholder="Victim Name">
            </div>
            <div class="input-control">
              <label for="adress">Address of Incident</label>
              <input type="text" name="address" id="adress" placeholder="Posta, Ilala" required>
            </div>
            <div class="input-control">
              <label for="photo">Image for more evidences</label>
              <input type="file" accept="img/*" id="photo" name="photo" required>
            </div>
            <button class="button_1" type="submit">Send</button>
          </form>
        </div>
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