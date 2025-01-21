<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TIC IP </title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo asset('admin')?>/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin')?>/fonts/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo asset('admin')?>/css/animate.min.css" rel="stylesheet">
  <!-- Custom styling plus plugins -->
  <link href="<?php echo asset('admin')?>/css/custom.css" rel="stylesheet">
  <link href="<?php echo asset('admin')?>/css/icheck/flat/green.css" rel="stylesheet">
  <script src="<?php echo asset('admin')?>/js/jquery.min.js"></script>
</head>

<body style="background:#c6c6c7;">
  <div class="">
    <div id="wrapper">
      <div id="login" >
        <section class="login_content">
          <form action="login" style='color:#fcfcfc;text-shadow:0;font-size:15px;font-family:Arial, Helvetica, sans-serif;border:#0e074d 2px solid;border-radius:5px;padding:10px;background:#2a3f54 ' method="POST">
            @csrf
            <span style="font-size:20px;">Iniciar sesión</span>
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div style="text-align:justify">
              <label >Nombre:</label> 
              <input type="email" name="email" class="form-control" placeholder="Nombre" required/>
            </div>
            <div style="text-align:justify">
              <label >Clave:</label>
              <input type="password" name="password" class="form-control" placeholder="Clave" required/>
            </div>
            <div>
               <button type="submit" style="width: 100%" class="btn btn-primary ">Iniciar sesión</button> 
            </div>
            <div class="clearfix"></div>
          </form>
        </section>
      </div>
    </div>
  </div>
</body>
</html>
