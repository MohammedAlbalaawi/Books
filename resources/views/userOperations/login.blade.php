<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?= asset('css/style.css') ?>">

</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
  
          <!-- Login Form -->
          <form method="POST" action="{{ route('userOperations.check') }}">
            @csrf
            
            <input 
            class ="mt-5"
            type="text" 
            class="fadeIn second" 
            name="user_email" 
            placeholder="Email">

            <input 
            class="fadeIn third" 
            type="text" 
            name="user_pass" 
            placeholder="Password">

            <input 
            type="submit" 
            class="fadeIn fourth" 
            value="Log In">
          </form>
      
          <!-- Remind Passowrd -->
          {{-- <div id="formFooter">
            <a  href="#">Forgot Password?</a>
          </div> --}}
      
        </div>
      </div>
</body>
</html>


