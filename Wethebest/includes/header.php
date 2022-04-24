<?php
// error_reporting(0);
?>

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
            <li><a href="../about/" class="not-login">About Us</a></li>
            <li><a href="../complaint_form/" class="not-login">Report</a></li>
            <?php
            if (isset($_SESSION['user'])) {
                echo '
                <li><a href="../profile/" class="not-login">' . $_SESSION['user']['fname'] . '</a></li>
                <li>
                <form method="POST" action="../logout.php">
                <input type="submit" value="Logout" name="logout" id="logout-btn"></form>
                </li>
               ';
            } else {
                echo '
                  <li id="login-regist">
            <span><a href="../login/">Login</a></span>
            <span id="divider">
            </span>
            <span><a href="../register/">Register</a></span>
            </li>
                 ';
            }
            ?>
        </ul>
    </nav>
</div>