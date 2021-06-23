<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style3.css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="js/controle.js" defer></script>
    <title>Mon site - Connexion</title>
  </head>

  <body>
    <?php session_start(); ?>
    <div class="container">
      <div class="logo">
        <i class="fas fa-user"></i>
      </div>

      <div class="tab-body" data-id="connexion">
        <span id="errorNullRegister" style="color: red; font-size: 15px;">
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
        </span>

        <span id="RegisterSuccess" style="color: green; font-size: 15px;">
       
       <?php if (isset($_SESSION['message'])) {
           echo $_SESSION['message'];
       } ?>
     </span>
        <form
          action="Controler/LoginControler.php"
          method="POST"
          onsubmit="return ValidateLogin()"
        >
          <div class="row">
            <i class="far fa-user"></i>
            <input
              type="email"
              class="input"
              placeholder="Adresse Mail"
              id="email_register"
              name="email_register"
            />
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input
              placeholder="Mot de Passe"
              type="password"
              class="input"
              id="password_register"
              name="password_register"
            />
          </div>
          
          <input
            type="submit"
            class="btn"
            type="button"
            onclick="return ValidateLogin()"
            value="Connexion"
          />
        </form>
      </div>

      <div class="tab-body" data-id="inscription">
        <span id="errorNull" style="color: red; font-size: 12px;"></span>
        <form
          action="Controler/RegisterControler.php"
          onsubmit="return ValidateRegister()"
          method="POST"
        >
          <div class="row">
            <i class="far fa-user"></i>
            <input
              type="email"
              class="input"
              placeholder="Adresse Mail"
              name="email"
              id="e"
            />
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input
              type="password"
              class="input"
              placeholder="Mot de Passe"
              name="password"
              id="p"
            />
            <span id="error" style="color: red; font-size: 12px;"></span>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input
              type="password"
              class="input"
              placeholder="Confirmer Mot de Passe"
              name="cpassword"
              id="cp"
            />
          </div>
          <input
            type="submit"
            class="btn"
            value="Inscription"
            onclick=" return ValidateRegister()"
          />
        </form>
      </div>

      <div class="tab-footer">
        <a
          class="tab-link active"
          data-ref="connexion"
          href="javascript:void(0)"
 
        >
          Connexion
        </a>
        <a class="tab-link" data-ref="inscription" href="javascript:void(0)" 
        onclick=ClearError()
        >
          Inscription
        </a>
      </div>
    </div>

    <script>
      function ValidateRegister() {
        if (
          document.getElementById('p').value == '' ||
          document.getElementById('e').value == ''
        ) {
          document.getElementById('errorNull').innerHTML = 'Empty input'
          return false
        }
        if (
          document.getElementById('p').value !=
          document.getElementById('cp').value 
        ) {
          document.getElementById('error').innerHTML = "password doesn't match"
          return false
        } else return true
      }

      function ValidateLogin() {
        
        if (
          document.getElementById('email_register').value == '' ||
          document.getElementById('password_register').value == ''
        ) {
          document.getElementById('errorNullRegister').innerHTML = 'Empty input'
          return false
        } else {
          
          return true
        }
      }

      function ClearError()
      {
        document.getElementById("errorNull").innerHTML = "";
        document.getElementById("errorNullRegister").innerHTML = "";
        document.getElementById("RegisterSuccess").innerHTML = "";
      }

      setTimeout(()=> {
     <?php
     $_SESSION['message'] = null;
     $_SESSION['error'] = null;
     ?>
   }, 5000);
    </script>
  </body>
</html>
