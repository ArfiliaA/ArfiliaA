<?php
  session_start();
  include('config.php');

  if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = mysqli_query($dbcon , "SELECT * FROM tblusers WHERE username = '$username' and password = '$password'");

    $row = mysqli_fetch_array($sql);

    if($row){
      $_SESSION['userid'] = $row['id'];
      if(!empty($_POST['remember'])){
        setcookie('user_login', $_POST['username'] , time() + (10 * 365 * 24 * 60 * 60));
        setcookie('user_password', $_POST['password'] , time() + (10 * 365 * 24 * 60 * 60));
      }else{
        if(isset($_COOKIE['user_login'])){
          setcookie('user_login','');

          if(isset($_COOKIE['user_password'])){
            setcookie('user_word','');
          }
        }
      }
      header("location : welcome.php");
    }else{
      $msg = "Invalid Login";
    }

  }

?>


<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--=============== Favicon ===============-->
    <link rel="shortcut icon" href="./images/vookong.png" type="image/png"/>
    <!--=============== Swiper CSS ===============-->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <!--=============== Boxicons ===============-->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!--=============== Custom StyleSheet ===============-->
    <link rel="stylesheet" href="css/styles.css" />
    <title>จองคิว.ออนไลน์</title>
  </head>
  <body>
    <!--=============== Header ===============-->
    <header class="header">
      <nav class="navbar">
        <div class="row d-flex container">
          <a href="" class="logo d-flex">
            <img src="./images/LOGOO.png" alt="" />
          </a>

          <ul class="nav-list d-flex">
            <a href="">Home</a>
            <a href="">About</a>
            <a href="">Shop</a>
            <a href="">Food</a>
            <a href="">Recipes</a>
            <a href="">Contact</a>
            <span class="close d-flex"><i class="bx bx-x"></i></span>
          </ul>

          <!-- Hamburger -->
          <div class="hamburger d-flex">
            <i class="bx bx-menu"></i>
          </div>
        </div>
      </nav>

      <!--=============== Home ===============-->
      <div class="home">
        <div class="row container">
          <div class="col">
            <h1>
              เว็บจองบัตรคิวออนไลน์ <br />
              จองที่ไหนก็ได้ตอนนี้! <br />
              <span class="color"></span>
            </h1>
            <p>
              ไม่ว่าจะสั่งจองอะไรสั่งที่ไหนก็ทำได้ง่ายที่นี่
            </p>
            <a href="" class="btn">จองเลย!</a>
            <a class="btn signin">ลงทะเบียน</a>
          </div>
          <div class="col">
            <img src="./images/5228737.png" alt="" />
          </div>
        </div>
      </div>

      <!--=============== SignIn Form ===============-->
      <div class="wrapper">
        <form method="POST">
            <?php if(isset($msg)){ ?>
              <div class="alert alert-danger" role="alert">
              <?php echo $msg;?>
              </div>
            <?php } ?>
          <h2>ลงทะเบียน</h2>
          <div class="control">
            <label for="username">ชิ่อ:</label>
            <input type="text" placeholder="กรอกชื่อของคุณ" name="username" />
          </div>
          <div class="control">
            <label for=" password">รหัสผ่าน:</label>
            <input type="password" placeholder="กรอกรหัสผ่านของคุณ" name="password" />
          </div>
          <div class="checkbox d-flex" name="" id=""> 
            <input type="checkbox" name="remember" id="remember" />
            <label for="remember">จดจำรหัสผ่าน</label>
          </div>
          <button type="submit" class="btn" name="submit">ล็อกอิน</button>
          <div class="links">
            <span>ยังไม่มีบัญชีหรอ? <a href="register.php">สร้างเลย!</a></span>
          </div>
        </form>

        <div class="close-form">
          <i class="bx bx-x"></i>
        </div>
      </div>
    </header>


    <!--=============== Footer ===============-->
    <footer class="footer">
      <div class="row container">
        <div class="col">
          <div class="icons d-flex">
          </div>
        </div>
        <div class="col">
          <div>
            <h4>Company</h4>
            <a href="">About Us</a>
            <a href="">Contact Us</a>
            <a href="">Contact our dog</a>
            <a href="">Contact our cat</a>
            <a href="">Contact our turtle</a>
          </div>
          <div>
            <h4>Contact</h4>
            <a href="">Twitter</a>
            <a href="">facebook</a>
            <a href="">088-888-8889</a>
            <a href="">KrongGnan@gmail.com</a>
            <a href="">088-888-8889</a>
          </div>
        </div>
      </div>
    </footer>
    <div class="footer-bottom">
      <div class="row container d-flex">
        <p>Copyright © Jhon cena</p>
        <p>Created by Arfilia</p>
      </div>
    </div>

    <!--=============== Swiper JS ===============-->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!--=============== Custom JS ===============-->
    <script src="./js/testimonial.js"></script>
    <script src="./js/products.js"></script>
    <script src="./js/main.js"></script>
  </body>
</html>
