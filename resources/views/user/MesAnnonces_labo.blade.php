@extends('layouts.layout-labo')

@section('content')
<style>
.info-box {
    box-shadow: 0px 3px 13px 3px #00000014;
}

.box {
    position: relative;
    border-radius: 7px;
    background: #ffffff;
    border-top: none;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0px 3px 13px 3px #00000014;
    padding: 0;
}

.boxImg{
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 200px;
    padding: 0;
    border-top-right-radius: 7px !important;
    border-top-left-radius: 7px !important;
}

.box-header-cover{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.4);
    border-top-right-radius: 7px !important;
    border-top-left-radius: 7px !important;
   
 
}
.box-header-cover h1{
    color: #fff;
    font-size: 18px;
    font-family: OpenSans-semibold,Arial,Helvetica,sans-serif;
    font-weight: 700;
    position: absolute;
    bottom: 10px;
    left:10px;
  
}
.box-header-cover .offre{
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    border-radius: 50px;
    padding: 2px 15px;
    position: absolute;
    top: 10px;
    left:10px;
    background-color: #ff396c;
    border: 1px solid white;
}

.box-header-cover .demande{
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    border-radius: 50px;
    padding: 2px 15px;
    position: absolute;
    top: 10px;
    left:10px;
    background-color: #4CAF50;
    border: 1px solid white;
}


.box-body h2{
    font-size: 18px;
    font-weight: 700;
    color: #000;
}
.box-body p {
    height: 60px;
    overflow: auto;
}
.box-footer .btn-repondre{
    background-color: #fff;
}
.box-footer .btn-repondre-Demande{
    background-color: #fff;
}
.box-footer .btn-repondre:hover{
    background-color: #ff396c;
    color:white;
    border-color:transparent;
}

.box-footer .btn-repondre-Demande:hover{
    background-color: #4CAF50;
    color:white;
    border-color:transparent;
}

#search-form .input-container{
    margin: 0;
    padding-right: 0;
}
#search-form input[type=text]{
    margin: 0 !important;
    border: none;
    border-right: 2px solid #d2d6de;
    font-size: 17px;
    width: 100;
}

#search-form .select1{
    margin: 0 !important;
    border: none;
    border-right: 2px solid #d2d6de;
    color: #989a9e;
    font-size: 17px;
    width: 100;
}
#search-form .select2{
    margin: 0 !important;
    border: none;
    color: #989a9e;
    font-size: 17px;
    width: 100;
}

#search-form .btn{
    margin: 0 !important;
    border-radius: 3px;
    font-size: 19px;
}
.row_list_produit .box{
    padding: 15px;
}
.img-container{
    background-color: rgba(255, 255, 255, 0.4)
}

</style>
<section class="content-header">
    <h1>
        Mes annonces 
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><i class="fa fa-dashboard"></i> Menu</li>
      <li><a href="#"> Mes annonces </a></li>
    </ol>
  </section>
  <section class="content">
  

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
                <form id="search-form">
                    <div class="col-md-6 input-container ">
                            <input type="text" name="designation" class="form-control" placeholder="Essayer, 'Une désignation' ou bien 'Une Formule chimique' " >
                    </div>
                    <div class="col-md-2">
                            <select name="reference" class="form-control select1">
                                    <option selected disabled>Catégorie</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                  </select>
                     </div>
                    <div class="col-md-2">
                            <select name="formule" class="form-control select2">
                                    <option selected disabled>Type d'annonce</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                            </select>
                    </div>
                    <div class="col-md-2">
                            <input type="submit" class="btn btn-primary btn-sm btn-block" value="Rechercher" >
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row row_list_produit">
          
              <div class="col-md-3 col-sm-4  ">
              <div class="box box-animation" style="padding:0 !important;">
               <div class="box-header boxImg" style="background-image:url('https://img.e-marketing.fr/Img/BREVE/2017/2/313628/Comment-optimiser-son-experience-utilisateur-mobile-F.jpg');">
                <div class="box-header-cover">
                   <a class="btn btn-default btn-success offre ">  Offre   <i class="fa fa-exchange " aria-hidden="true"> </i> </a>
                 
                    <h1>Nom de labo</h1>
                </div>
               </div>
                <div class="box-body" >
                  <h2>Titre de l'annonce</h2>
                  <p>
                        Lorem ipsum dolor sit amet, ut graece omnesque assentior sit, quo eu tota scripserit cotidieque
                  </p>
                </div>
                <div class="box-footer">
                    <a class="btn btn-default btn-lg btn-block btn-repondre ">Consulté</a>
                </div>
              </div>
            </div>
              <div class="col-md-3 col-sm-4 ">
              <div class="box box-animation" style="padding:0 !important;">
               <div class="box-header boxImg" style="background-image:url('https://img.e-marketing.fr/Img/BREVE/2017/2/313628/Comment-optimiser-son-experience-utilisateur-mobile-F.jpg');">
                <div class="box-header-cover">
                   <a class="btn btn-default btn-success demande ">Demande</a>
                    <h1>Nom de labo</h1>
                </div>
               </div>
                <div class="box-body" >
                  <h2>Titre de l'annonce</h2>
                  <p>
                        Lorem ipsum dolor sit amet, ut graece omnesque assentior sit, quo eu tota scripserit cotidieque
                  </p>
                </div>
                <div class="box-footer">
                    <a class="btn btn-default btn-lg btn-block btn-repondre-Demande ">Consulté</a>
                </div>
              </div>
            </div>
          </div>
   
</section>
@endsection
