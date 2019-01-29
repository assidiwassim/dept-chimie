
  
  <!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
  
          <title>Labshare</title>
         <link rel="shortcut icon" type="image/png" href="img/log.png"/>
          <link rel="shortcut icon" type="image/png" href="img/log.png" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
         
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
          <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  
          <!-- Styles -->
          <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
      
      </head>
      <body class="animated fadeIn">
            <div id="loader-wrapper">
                    <div id="loader"></div>
                    <div class="loader-section section-left"></div>
                    <div class="loader-section section-right"></div>
            </div>
          
  <section id="home">
    <div id="menu-home-page" class=" d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <img src="{{ asset('img/logo.png') }}" class="my-0 mr-md-auto logo-fsm">
    <nav class="my-2 my-md-0 mr-md-3 ">
      <a class="p-2 text-dark" href="#home">ACCEUIL</a>
      <a class="p-2 text-dark" href="#service">SERVICE</a>
      <a class="p-2 text-dark" href="#apropos">À-PROPOS</a>
      <a class="p-2 text-dark" href="#contact">CONTACT</a>
    </nav>
    <a class="btn btn-outline-primary " href="{{ route('login') }}">Se connecter</a>
  </div>
  <div class="container">
  <div class="row">
      <div class="col-md-6 content">
      
              <h1>Département de chimie FSM</h1>
              <p>
                  Le département de Chimie est un des quatre départements
                  qui composent la Faculté des Sciences de Monastir.
              </p>
              <p>
                      Le département comprend aussi deux laboratoires
                      de recherche (LR) cinq unités de recherche (UR) 
                      et une unité de service commun (USC) RMN.
              </p>
              <a class="btn btn-success btn-lg " href="{{ route('login') }}">SE CONNECTER</a>
              
         
      </div>
      <div class="col-md-6 img-container " >
      <img src="{{ asset('img/home.png') }}" class="logo-fsm">
      </div>
  </div>
  </div>
  </section>
  
  <section id="service">
    
              <h1>Services</h1>
              <br><br>
  <div class="row ">
     
          <div class="col-md-4">
              <img src="{{ asset('img/icon1.png') }}">
              <h2>Echange </h2>
              <p>
                      Echanger des produits
                      chimiques 
              </p>
          </div>
          <div class="col-md-4">
              <img src="{{ asset('img/icon2.png') }}">
              <h2>Echange </h2>
              <p>
                      Echanger des produits
                      chimiques 
              </p>
          </div>
          <div class="col-md-4">
                  <img src="{{ asset('img/icon3.png') }}">
                  <h2>Echange </h2>
                  <p>
                          Echanger des produits
                          chimiques 
                  </p>
          </div>
  </div>
  </section>
  
  <section id="apropos">
  
      <div class="row">
          <div class="col-md-6 ">
                  <img src="{{ asset('img/apropos.png') }}">
          </div>
          <div class="col-md-6">
              <h2>A propos de nous</h2>
             
              <p>
                      Le département est doté d'une salle de séminaires, de deux salles d'enseignements de cours, de treize salles de travaux pratiques, de deux salles d'ordinateurs et d'une bibliothèque comprenant plusieurs ouvrages des plus récents dans le domaine de la Chimie...
  
              </p>
              <div class="help-block"></div>
              <a href="#"> Afficher plus</a>
          </div>
      </div>
  </section>
  
  <section id="contact">
      <div class="row">
          <div class="col-md-6 container-form">
            
              <form class="form-cadre"  method="post" action="{{route('sendcontact')}}">
              @csrf
                      <h1> Contactez-nous </h1>
                      <br>
                      <div class="form-group">
                        <label for="usr">Votre nom </label>
                        <input type="text" name="name" class="form-control" id="name" required>
                        @if ($errors->has('name'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="form-group">
                              <label for="usr">Votre adresse email </label>
                              <input type="email"  name="email"  class="form-control" id="email" required>
                              @if ($errors->has('email'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="form-group">
                              <label for="usr">Objet </label>
                              <input type="text" name="subject" class="form-control" id="subject" required>
                              @if ($errors->has('subject'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                      </div>
                      <div class="form-group">
                              <label for="comment">Votre message</label>
                              <textarea class="form-control" name="message" rows="3" id="message" required></textarea>
                              @if ($errors->has('message'))
                                    <span class="help-block alert alert-danger">
                                        <strong>{{ $errors->first('messages') }}</strong>
                                    </span>
                                @endif
                      </div> 
                     
                            <button type="submit" class="btn btn-success btn-block">Envoyer</button>
                    </form>
                    @if (Session::has('message-success-send-message'))
                        <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> alerte !</h4>
                                {{ Session::get('message-success-send-message') }}
                        </div>
                        @endif
          </div>
          <div class="col-md-6 text-center">
                  <br>   <br>   <br>   <br>
              <img src="{{ asset('img/contact.png') }}">
              <p>
                  Lorem Ipsum is simply dummy  <br>text ofthe printing 
                      and typesetting industry.
              </p>
          </div>
      </div>
  </section>
  
          <footer id="footer">
              <div class="links">
                  <div class="row">
                 <div class="col-md-3">
                      <ul>
                              <li>
                                     About Us
                              </li>
                              <li>
                                      Dartstock
             
                              </li>
                              <li>
                                      Brokerage Calculator
                                      
                                      
                              </li>
                             
                      </ul>
                 </div>
                 <div class="col-md-3">
                     
  
                          <ul>
                                  <li>    
                                        Market Talk
                                  </li>
                                  <li>
                                        NEST Trader
                       
                                  </li>
                                  <li>
                                        Option Strategy Builder        
                                  </li>
                              
                          </ul>
                  </div>
                  <div class="col-md-3">
                          <ul>
                                  <li>    
                                         Careers      
                                  </li>
                                  <li>
                                         
                                          Fox Trader
  
                                  </li>
                                  <li>
                                          Span Calculator
                                  </li>
                           
                          </ul>
                      </div>
                      <div class="col-md-3">
                     <ul>
                         <li>
                                 Twitter
                         </li>
                         <li>
                              Facebook 
                          </li>
                          <li>
                                  Dartstock
                          </li>
                     </ul>
                      </div>
                  </div>
  
              </div>
              <div class="copyright">
                  <div class="row">
                      <div class="col-md-6">
                              <p>Politique de confidentialité</p>
                      </div>
                      <div class="col-md-6">
                      
                              <p>Copyright © 2018 by FSM</p>
                      </div>
                  </div>
              </div>
  
          </footer>
  
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
  
    