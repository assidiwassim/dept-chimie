
  
  <!doctype html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
  
          <title>vv</title>
  
           <!-- bootstrap import -->
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
          <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
  
          <!-- Styles -->
          <link rel="stylesheet" type="text/css" href="{{ asset('css/welcome.css') }}">
      </head>
      <body>
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
              <a class="btn btn-success btn-lg ">SE CONNECTER</a>
              
         
      </div>
      <div class="col-md-6 img-container">
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
            
              <form class="form-cadre" >
                      <h1> Contactez-nous </h1>
                      <br>
                      <div class="form-group">
                        <label for="usr">Votre nom </label>
                        <input type="text" class="form-control" id="nom">
                      </div>
                      <div class="form-group">
                              <label for="usr">Votre adresse email </label>
                              <input type="email" class="form-control" id="email">
                      </div>
                      <div class="form-group">
                              <label for="usr">Objet </label>
                              <input type="text" class="form-control" id="obj">
                      </div>
                      <div class="form-group">
                              <label for="comment">Votre message</label>
                              <textarea class="form-control" rows="3" id="msg"></textarea>
                      </div> 
                     
                            <button type="submit" class="btn btn-success btn-block">Envoyer</button>
                    </form>
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
  
       </body>
  </html>
  
    