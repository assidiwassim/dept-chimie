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
    height: 370px;
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

.box-header  h1.hh{
    color: #fff;
    font-size: 18px;
    font-family: OpenSans-semibold,Arial,Helvetica,sans-serif;
    font-weight: 700;
    position: absolute;
    bottom: 10px;
    left:10px;
  
}
.position-clock{
    position: absolute;
    top:8%;
    right: 50px;
}
.position-clock img{
    width: 50px;
    display: inline-block;
}
.position-clock i{
   position: relative;
   right: 13px;
   top:1px;
   color: #8b8b8c;
}

</style>
<section class="content-header">
    <h1>
        Offre
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
       
      <li class="active"><i class="fa fa-dashboard"> </i> Menu</li>
      <li><a href="#"> Annonce </a></li>
      <li><a href="#"> Offre </a></li>
    </ol>
  </section>
  <section class="content">
        @if(DB::table('reponseannonces')->whereuser_id(Auth::user()->id)->whereannonce_id($id)->count()==0)
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
                   
                        @foreach(DB::table('annonces')->where('id','=',$id)->get() as $annonce)
                    <div class="col-md-4 col-sm-5 col-xs-12 image-annonce" style="background-image: url('/upload/PictureAnnonce/{{$annonce->file}}')">
                            <div class="cover">
                                        @if($annonce->typeannonce=="Offre")
                                            <a class="btn btn-default btn-success offre "> 
                                                Offre 
                                                @if($annonce->natureannonce=="Changement")
                                                <i class="fa fa-exchange " aria-hidden="true"> </i>
                                         @endif
                                        </a>
                                        @else
                                        <a class="btn btn-default btn-success demande ">
                                        Demande
                                        @if($annonce->natureannonce=="Changement")
                                             <i class="fa fa-exchange " aria-hidden="true"> </i>
                                        @endif
                 </a>
                 @endif
                    <h1 class="hh">{{DB::table('users')->select('name')->where('id','=',$annonce->user_id)->value('name')}}</h1>
                            </div>
                    </div>
                    <div class="col-md-8 col-sm-7 col-xs-12">
                          
                            <span class="position-clock">
                                    <img src="/img/time.gif" class="img-responsive">
                            <i> {{$annonce->created_at}}</i>
                                  
                            </span>
                       
                        <div class="u-w100 u--xs-mb2 u--xs-ph2 js-hide-when-edit-numeral" data-alert-field="LOCATION" data-alert-section="LOCATION">

                        <div id="profileHeaderMainInfos" data-root-item="" class="u-por">
                                        

                            <h1 class="profile-header__freelance-name">
                                <span>
                                    @if($annonce->typeannonce=="Offre")
                                        {{DB::table('produits')->select('reference')->where('id','=',$annonce->refproduit)->value('reference')}}  
                                   @else
                                        {{DB::table('produits')->select('reference')->where('id','=',$annonce->refproduitEchange)->value('reference')}} 
                                   @endif
                                </span>
                            </h1>
                        
                            <h2 class="profile-header__freelance-headline">
                                
                                    <p>
                                            @if($annonce->typeannonce=="Offre")
                                                
                                                    Offre avec
                                                    @if($annonce->natureannonce=="Changement")
                                                      Changement
                                                    @else
                                                      Don
                                                    @endif
                                             
                                            @else
                                              
                                                    Demande avec
                                                @if($annonce->natureannonce=="Changement")
                                                    Changement
                                                @else
                                                     Sans changement
                                                @endif
                                            @endif
                                        </p>
                            </h2>
                        
                                <p class="profile-header__freelance-location" style=" height: 60px;  overflow: auto;">
                                    <i class="fa fa-location"></i>
                                    <span>
                                            {{$annonce->designation}}
                                          </span>
                                </p>
                                <hr>
                                <p>
                                    @if($annonce->typeannonce=="Offre")
                                        
                                            Offre de:<br>  
                                            Référence = {{ DB::table('produits')->select('reference')->where('id','=',$annonce->refproduit)->value('reference')}}  | Quantité = {{$annonce->qte}}

                                            @if($annonce->natureannonce=="Changement")
                                             <br> Changement avec : <br>
                                             Reference = {{ DB::table('produits')->select('reference')->where('id','=',$annonce->refproduitEchange)->value('reference')}} | Quantité = {{$annonce->qteEchange}} 
                                            @else
                                            gratuit
                                            @endif
                                     
                                      @else
                                      
                                            Demande de:<br>  
                                            Référence =  {{ DB::table('produits')->select('reference')->where('id','=',$annonce->refproduitEchange)->value('reference')}}  | Quantité = {{$annonce->qteEchange}}
                                        @if($annonce->natureannonce=="Changement")
                                        <br> Changement avec : <br>
                                        Reference =  {{ DB::table('produits')->select('reference')->where('id','=',$annonce->refproduit)->value('reference')}}  | Quantité = {{$annonce->qte}} 
                                        @else
                                            Sans changement
                                        @endif
                                    @endif
                                </p>
                       
                            </div>
                                <div class="js-hide-when-edit-header" data-js="popover" data-jsinit="popover">
                                    <div class="u-dib">
                                            <a href="#profileMissions" data-offset="150" class="u-df u-aic u-flww u--xs-mr0  u--xs-jcc u-mb2 link quiet">
                                                <strong class="profile-header__mission-count u-mr2">
                                                    @if( DB::table('reponseannonces')->where('annonce_id','=',$id)->count() ==0)
                                                    Aucune demande pour cet offre
                                                    @else
                                                    Il y'a <strong> {{DB::table('reponseannonces')->where('annonce_id','=',$id)->count() }}</strong> demandes pour cet offre
                                                    @endif
                                               
                                                </strong>
                                            </a>
                                    </div>
                                </div>
                                <br>  <br>
                                </div>
      
                    </div>
                    @endforeach
                
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
                            <div class="form-group" style="padding:0 20px">
                              <label for="commentaire" class=" control-label">Commentaire</label>
                                <div class="help-block"></div>
                             
                                  <textarea class="form-control" name="commentaire" id="commentaire" rows="3" placeholder="Enter ..." required></textarea>
                                  @if ($errors->has('commentaire'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('commentaire') }}</strong>
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
   @else
    @component('user.confirm')
    
    @endcomponent
    @endif
</section>
@endsection
