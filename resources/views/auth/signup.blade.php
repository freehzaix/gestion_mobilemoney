<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Création d'un compte | MobileApp Web</title>

  <!-- Favicons -->
  <link href="/frontend/img/favicon.png" rel="icon">
  <link href="/frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('login') }}">
      <img src="/frontend/img/logo.png" alt="" class="img-fluid">
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Créer un compte pour commencer</p>

      @if(session('status'))
        <div class="btn btn-success">{{ session('status') }}</div>   
      @endif
      
      <form action="{{ route('signup_post') }}" method="post">
        @csrf

        <div class="input-group mt-3">
          @error('email')
              <small class="text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mt-3">
          @error('password')
              <small class="text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mt-3">
          @error('nom')
              <small class="text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="nom" class="form-control" placeholder="Nom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mt-3">
          @error('prenom')
              <small class="text text-danger">{{ $message }}</small>
          @enderror
        </div>
        <div class="input-group mb-3">
          <input type="text" name="prenom" class="form-control" placeholder="Prénom">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="row">
          
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-primary btn-block">Créer un compte maintenant!</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="row">
        <div class="col">
          <br>
          <a href="{{ route('login') }}">Déjà un compte ? Se connecter maintenant.</a>
        </div>
      </div>

      <div class="social-auth-links text-center mb-3">
        
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        
      </p>
      <p class="mb-0">
        
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
