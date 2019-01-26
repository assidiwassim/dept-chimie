

  
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Département chimie FSM</title>

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
            .container-form-login h2{
            font-weight:700 !important;
            margin-top:20px;
            text-align: center;
            }
            .container-form-login p{
                text-align: center;
            margin-top:20px;
      
            }
            .form-login{
 
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
            }
            .reset{
                position: absolute;
                bottom:0;
                left:0 !important;
            }
            .reset {
                position: absolute;
                bottom:0;
                left: -120px !important;

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
    <body>
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


    </body>
</html>
