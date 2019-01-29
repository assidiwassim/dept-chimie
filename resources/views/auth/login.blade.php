

  
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Labshare</title>

        <link rel="shortcut icon" type="image/png" href="img/log.png"/>
        <link rel="shortcut icon" type="image/png" href="img/log.png" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
         <!-- bootstrap import -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
     

        <style>

                .container-fluid{
                    width: 100%;
                    height: 100vh;
                    padding: 0  !important;
                    margin: 0  !important;
            
                }
                .container-fluid .row{
                    padding: 0 !important;
                    margin: 0  !important;
                    width: 100%;
                    height: 100%;
                    
                }
            .image-landing{
                padding: 0  !important;
                margin: 0  !important;
                background-image:url("{{ asset('img/login.png') }}");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
               
            }
            .image-landing .cover{
                padding: 0;
                margin: 0;
                width: 100%;
                    height: 100%;
              /*  background-color: rgba(0, 0, 0, 0.4)*/
            }
            .container-form-login{
                padding-top: 80px;;
                margin: 0;
                width: 100%;
                height: 100%;
           

            }
            
            @media screen and (max-width: 600px) {
                .container-form-login{
                padding-top: 1px;;
                margin: 0;
                width: 100%;
                height: 100%;
           

            }
            
            }
            .container-form-login h2{
            font-weight:700 !important;
            margin-top:20px;
            text-align: center;
            }
            .container-form-login p{
                text-align: center;
            margin-top:20px;
      
            }
           
            .form-group button[type=submit] {
            float: right;
            padding: 6px 0;
            background-color: transparent;
            border: none;
            color:#000;
            font-weight:700 !important;
            
            }

            .form-group button[type=submit] img{
                width: 22px;
                outline: none;
            }
            
        
            @media screen and (max-width: 600px) {
                .reset {
                position: static ;
                text-align: center;
               

            }
            }
            .form-group input[type=email],.form-group input[type=password] {
             border-radius: 0;
             border:none;
             background-color: #fff;
                box-shadow: 0px 3px 13px 3px #00000014;
                padding: 10px;
            }
           
            
            </style>
            
    </head>
    <body class="animated fadeIn">
            <div id="loader-wrapper">
                    <div id="loader"></div>
                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
            </div>

 <div class="container-fluid">
<div class="row">
<div class="col-md-5 image-landing " >
    <div class="cover">
    </div>
</div>
<div class="col-md-7 container-form-login">
    
    <div class="row">
            <div class=" col-md-3" >
            </div>
<div class="col-md-offset-3 col-md-6" style="">

<h2>SE CONNECTER </h2>
   <p>
     Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. 
   </p>
   <br>
        <form method="POST" action="{{ route('login') }}" class="form-login">
                @csrf
                <div class="form-group ">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group ">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group " style="display:none;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                </div>

                <div class="form-group ">
                        <button type="submit" class="btn btn-primary ">
                           LOGIN
                         <img src="{{ asset('img/login-icon.png') }}">
                        </button>
                </div>
                <div class="form-group reset ">
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="#">
                            Mot de passe oubliée ? ici 
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<style>
/* The Loader */
#loader-wrapper {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 10;
  overflow: hidden;
}
.no-js #loader-wrapper {
  display: none;
}

#loader {
  display: block;
  position: relative;
  left: 50%;
  top: 50%;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-top-color: #16a085;
  -webkit-animation: spin 1.7s linear infinite;
          animation: spin 1.7s linear infinite;
  z-index: 11;
}
#loader:before {
  content: "";
  position: absolute;
  top: 5px;
  left: 5px;
  right: 5px;
  bottom: 5px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-top-color: #e74c3c;
  -webkit-animation: spin-reverse .6s linear infinite;
          animation: spin-reverse .6s linear infinite;
}
#loader:after {
  content: "";
  position: absolute;
  top: 15px;
  left: 15px;
  right: 15px;
  bottom: 15px;
  border-radius: 50%;
  border: 3px solid transparent;
  border-top-color: #f9c922;
  -webkit-animation: spin 1s linear infinite;
          animation: spin 1s linear infinite;
}

@-webkit-keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
  }
}
@keyframes spin {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-webkit-keyframes spin-reverse {
  0% {
    -webkit-transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
  }
}
@keyframes spin-reverse {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(-360deg);
    transform: rotate(-360deg);
  }
}

#loader-wrapper .loader-section {
  position: fixed;
  top: 0;
  width: 100%;
  height: 100vh;
  background: #fff;
  z-index: 10;
}

.loaded #loader {
  opacity: 0;
  transition: all 0.3s ease-out;
}

.loaded #loader-wrapper {
  visibility: hidden;
  transition: all 0.1s .2s ease-out;
}
</style>
<script>
$(document).ready(function() {
 
 // Fakes the loading setting a timeout
   setTimeout(function() {
       $('body').addClass('loaded');
   }, 500);

}); 
</script>
    </body>
</html>
