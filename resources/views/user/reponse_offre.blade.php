@extends('layouts.layout-labo')

@section('content')
<style>
.info-box {
    box-shadow: 0px 3px 13px 3px #00000014;
}

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: none;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0px 3px 13px 3px #00000014;

}


#annonce .box {
    padding: 0 !important;
}
#annonce .box .box-header{
    padding: 0 !important;
}

#annonce .container-annonce{
    padding: 0;
}
#annonce  .image-annonce{
    background-position: center;
    background-repeat:no-repeat;
    background-size: cover;
    padding: 0;
    height: 300px;
}
#annonce .cover{
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.1);
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

.profile-header__freelance-headline {
    margin-bottom: .5em;
    font-size: 16px;
    font-weight: 700;
    text-transform: capitalize;
    word-break: break-all;
}
.box-header .offre{
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

.box-header .offre:hover{
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

.box-header .demande{
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

.box-header .demande:hover{
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

</style>
<section class="content-header">
    <h1>
        Demander cet offre
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
       
      <li class="active"><i class="fa fa-dashboard"> </i> Menu</li>
      <li><a href="#"> Annonce </a></li>
      <li><a href="#"> Offre </a></li>
    </ol>
  </section>
  <section class="content">
 
                @if (Session::has('message-success-ajout-offre'))
                        <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> alerte !</h4>
                                {{ Session::get('message-success-ajout-offre') }}
                        </div>
                @endif

                
    <div class="row " id="annonce">
            <div class="col-md-12" >
              <div class="box container-annonce">
                  <div class="box-header" >
                    <div class="col-md-4 col-sm-5 col-xs-12 image-annonce" style="background-image: url('https://cloudinary-a.akamaihd.net/hopwork/image/upload/h_360,w_360,c_thumb,g_face,z_0.4,q_auto,dpr_2.0/uy1al7shzjwodnyqadkg.webp')">
                            <div class="cover">
                                    <a class="btn btn-default btn-success offre "> 
                                        Offre
                                    </a>
                            </div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                        <div class="u-w100 u--xs-mb2 u--xs-ph2 js-hide-when-edit-numeral" data-alert-field="LOCATION" data-alert-section="LOCATION">

                        <div id="profileHeaderMainInfos" data-root-item="" class="u-por">
                                        

                            <h1 class="profile-header__freelance-name">
                                <span>
                                    <span>Pacaud</span>
                                    <span>Muriel</span>
                                </span>
                            </h1>
                        
                            <h2 class="profile-header__freelance-headline">e-learning / digital learning</h2>
                        
                                <p class="profile-header__freelance-location">
                                    <i class="fa fa-location"></i>
                                    <span>
                                        Après une fructueuse carrière dans le domaine des Achats (Acheteuse, Responsable Achats au sein de Multi-nationales françaises et américaines) au cours de laquelle j'ai beaucoup appris (le relationnel fournisseur /Client, la gestion de projet, la rigueur etc), j'ai décidé de me ré-orienter vers une profession liée à la création et à la transmission du savoi".

                                    </span>
                                </p>

                            </div>
                                <div class="js-hide-when-edit-header" data-js="popover" data-jsinit="popover">
                                    <div class="u-dib">
                                            <a href="#profileMissions" data-offset="150" class="u-df u-aic u-flww u--xs-mr0  u--xs-jcc u-mb2 link quiet">
                                                <strong class="profile-header__mission-count u-mr2">
                                                    Il y'a <strong>23</strong> demandes pour cet offre
                                                </strong>
                                            </a>
                                    </div>
                                </div>
                                <br>  <br>
                                </div>
      
                    </div>
                
                  </div>
            </div>
          </div>
    </div>
   

    <div class="row row_list_produit" >
            <div class="col-md-12" >
              <div class="box ">
              
                <div class="box-body">
             
                  <div class="row">
                      <form class="form-horizontal" method="post"   action="{{route('store_reponse_offre')}}">
                      @csrf
                          <div class="box-body">
                          <input id="idannonce" name="idannonce" type="hidden" value="{{$id}}">
                            <div class="form-group">
                              <label for="commentaire" class=" control-label">Commentaire</label>
            
                             
                                  <textarea class="form-control" name="commentaire" id="commentaire" rows="3" placeholder="Enter ..." required></textarea>
                                  @if ($errors->has('commentaire'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('commentaire') }}</strong>
                                    </span>
                                @endif
                          
                            </div>

                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="reset" class="btn btn-danger">Annuler</button>
                            <button type="submit" class="btn btn-success pull-right">Demander</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                </div>
              </div>
            </div>
          </div>
    </div>
   
</section>
@endsection
