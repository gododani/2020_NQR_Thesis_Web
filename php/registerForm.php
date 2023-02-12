<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/loginRegisterStyle.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <div class="bg-img">
        <div class="content">
        <?php
          if(isset($_SESSION['registerValidationError'])){
            echo '<div class="wrongLoginRegister"><h3>Sikertelen regisztráció!</h3>
            <br>
            Az adatok nem feleltek meg a követelményeknek!
            <br>
            <a class="errorLink" href="registerForm.php">Kattintson ide és próbálja újra!</a>
            </div>';
            session_unset();
            session_destroy();
            exit();
        }
        if(isset($_SESSION['registerDataError'])){
          echo '<div class="wrongLoginRegister"><h3>Sikertelen regisztráció!</h3>
          <br>
          Már létezik ilyen felhasználónevű fiók!
          <br>
          <a class="errorLink" href="registerForm.php">Kattintson ide és próbálja újra!</a>
          </div>';
          session_unset();
          session_destroy();
          exit();
      }
        ?>
          <header>Regisztráció</header>
            <form action="register.php" method="post">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="text" name="username" required placeholder="Felhasználónév">
                  </div>
                  <p class="requirements">Legalább 6 karakter</p>
                  <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" name="password" class="pass-key" required placeholder="Jelszó">
                    <span class="show">SHOW</span>
                  </div>
                  <p class="requirements">Legalább 8 karakter, 1 szám, 1 kisbetű, 1 nagybetű </p>
                <div class="field space">
                    <span class="fa fa-envelope"></span>
                    <input type="email" name="email" required placeholder="Email">
                  </div>
                  <p class="requirements">Érvényes email cím pl.: valami@valami.com</p>
                <div class="field space">
                    <button type="submit" value="submit" id="login-register-button">Regisztráció</button>
                </div>
          </form>
          <div class="signup">Van már fiókja?
              <a href="loginForm.php">Jelentkezzen be</a>
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