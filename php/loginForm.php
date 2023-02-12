<?php
    session_start();
    
?>

<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belepés</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/loginRegisterStyle.css">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <?php
          if(isset($_SESSION['loginError'])){
            echo '<div class="wrongLoginRegister"><h3>Sikertelen belépés!</h3>
            <br>
            Helytelen felhasználónév vagy jelszó!
            <br>
            <a class="errorLink" href="loginForm.php">Kattintson ide és próbálja újra!</a>
            </div>';
            session_unset();
            session_destroy();
            exit();
        }
        ?>
        <?php
          if(isset($_SESSION['validRegister'])){
            echo '<div class="goodRegister"><h3>Sikeres regisztráció!</h3>
            <br>
            <br>
            <a class="validLink" href="loginForm.php">Ide kattintva be is jelentkezhet!</a>
            </div>';
            session_unset();
            session_destroy();
            exit();
        }
        ?>
        <header>Belépés</header>
        <form action="login.php" method="post">
          <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" name="username" required placeholder="Felhasználónév">
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" name="password" class="pass-key" required placeholder="Jelszó">
            <span class="show">SHOW</span>
          </div>
          <div class="pass">
            <a href="#">Elfelejtette a jelszót?</a>
          </div>
          <div class="field">
            <button type="submit" value="submit" id="login-register-button">Belépés</button>
          </div>
        </form>
        <div class="signup">Nincs fiókja?
          <a href="registerForm.php">Regisztráljon most</a>
        </div>
      </div>
    </div>
    <script>
      const pass_field = document.querySelector('.pass-key');
      const showBtn = document.querySelector('.show');
      showBtn.addEventListener('click', function(){
       if(pass_field.type === "password"){
         pass_field.type = "text";
         showBtn.textContent = "HIDE";
         showBtn.style.color = "#3498db";
       }else{
         pass_field.type = "password";
         showBtn.textContent = "SHOW";
         showBtn.style.color = "#222";
       }
      });
    </script>
    
  </body>
</html>