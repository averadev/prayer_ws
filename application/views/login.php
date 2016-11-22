<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <!-- Bootstrap -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Font Awesome -->
   <link rel="stylesheet" href="<?php echo base_url().LBRY; ?>font-awesome/css/font-awesome.min.css" />
  <!-- NProgress -->
    <link rel="stylesheet" href="<?php echo base_url().LBRY; ?>nprogress/nprogress.css" />
    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url().LBRY; ?>animate/animate.css" />

    <!-- Custom Theme Style -->
    <link rel="stylesheet" href="<?php echo base_url().CSS; ?>custom.css" />
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="loginForm">
              <h1>Login Form</h1>
              <div>
                <input id="username" type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input id="password" type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a id="ingresarAdmin" class="btn btn-default submit">Ingresar</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-handshake-o" aria-hidden="true"></i> Admin Prayer</h1>
                  <p>©2016 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo base_url().LBRY; ?>nprogress/nprogress.js"></script>
<script type="text/javascript" src="<?php echo base_url().JS; ?>login.js"></script>
</html>
