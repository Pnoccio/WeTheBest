<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="author" content="BCS">
  <title>BCS Foundation | Welcome</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <header>
    <div class="container">

      <div id="branding">
        <a href="../">
          <!-- <img src="img/haco.png" alt="logo"> -->
          BCS Foundation
        </a>
      </div>
      <nav>
        <!-- <div id="branding">
                <a href="index.html"><img src="img/haco.png" alt="logo"></a>
              </div> -->
        <ul>
          <li class="current"><a href="../" class="not-login">What We Do</a></li>
          <li><a href="./about/" class="not-login">About Us</a></li>
          <li><a href="./complaint_form/" class="not-login">Report</a></li>

          <?php
          session_start();
          if ($_SESSION['user']) {
            echo '
                <li><a href="./profile/" class="not-login">' . $_SESSION['user']['fname'] . '</a></li>
                <li>
                <form method="POST"><input type="submit" value="Logout" name="logout" id="logout-btn"></form>
                </li>
               ';
          } else {
            echo '
                  <li>
                 <span><a href="./login/" id="header-login">Login</a></span></li>
                 <span id="divider"></span>
                 <li><span><a href="./register/" id="header-login">Register</a></span>
             </li>
                 ';
          }
          ?>
        </ul>
      </nav>
    </div>
  </header>

  <section id="showcase">
    <div class="container">
      <h1>Welcome to BCS Foundation</h1>
      <p>Any society that fails to harness the energy and creativity of its own <b>WOMEN</b> 
      <br>is at huge disadvantage in the modern world</p>
      <p id="date_and_time">Today is:</p>

      <script>
        function getDate() {
        const d = new Date();
    
    let hr = d.getHours()
    let min = d.getMinutes()
    let sec = d.getSeconds()
    
    let time = hr+" : "+min+" : "+sec;
    return time;
}

setInterval(() => {
    // document.getElementById("date_and_time").innerHTML= getDate()
    document.querySelector("#date_and_time").innerHTML= getDate()
}, 1000);
      </script>
      <div>
        <a href="register/" class="register-btn">Create account</a>
        <a href="login/" class="register-btn">Login</a>
      </div>
    </div>
  </section>

  <!-- <section id="newsletter"> -->
  <!-- <div class="container"> -->
  <!-- <h1>Subscribe To Our Newsletter</h1>
        <form>
          <input type="email" placeholder="Enter Email...">
          <button type="submit" class="button_1">Subscribe</button>
        </form> -->
  <!-- <center><a href="registration.html" class="register-btn">Create account</a></center>
        <center><a href="login.html" class="register-btn" >Login to your account</a></center> -->
  <!-- </div> -->
  <!-- </section> -->

  <section id="boxes">
    <div class="container">
      <div class="box">
        <img src="./img/educational.png">
        <h3>Educational</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
      </div>
      <div class="box">
        <img src="./img/folder.png">
        <h3>Report Violence</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
      </div>
      <div class="box">
        <img src="./img/solidarity.png">
        <h3>Charity</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus mi augue, viverra sit amet ultricies</p>
      </div>
    </div>
  </section>

  <footer>
    <p>BSC Foundation, Copyright &copy; 2022</p>
    <ul class="social">
      <li><a href=""><i class="fab fa-facebook fa-2x"></i></a></li>
      <li><a href=""><i class="fab fa-instagram fa-2x"></i></a></li>
      <li><a href=""><i class="fab fa-twitter fa-2x"></i></a></li>
      <li><a href=""><i class="fab fa-tiktok fa-2x"></i></a></li>
    </ul>
  </footer>

  <script src="date_and_time.js"></script>
</body>

</html>