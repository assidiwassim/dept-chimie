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

.confirm-popup{
    border-radius: 20px !important;
    box-shadow: 0px 3px 13px 3px #00000014;
    background-color: transparent !important;
}

.modal {
    background: rgba(0,0,0,0)  !important;
}

.modal-dialog{
    background-color: transparent !important;
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

.box-header-cover .deletee{
    color: #fff;
    font-size: 14px;
    font-weight: 700;
    border-radius: 50px;
    padding: 2px 8px;
    position: absolute;
    top: 10px;
    right:10px;
    background-color: transparent;
    border: 1px solid white;
}
.box-header-cover .deletee:hover{
   
    background-color: red;
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
      <li><a href="#"> Liste de mes annonces </a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
                <form id="search-form" method="post" action="{{route('MesAnnonces_labo_search')}}">
                @csrf 
                    <div class="col-md-6 input-container ">
                            <input type="text" value="" name="designation" class="form-control" placeholder="Essayer, 'Une désignation' ou bien 'Une Formule chimique' " >
                    </div>
                    <div class="col-md-2">
                    <select name="typeannonce" class="form-control select2" >
                                    <option value="" >Type d'annonce</option>
                                    <option value="offre">Offre</option>
                                    <option value="demande">Demande</option>
                            </select>
                     </div>
                    <div class="col-md-2">
                    <select name="natureannonce" class="form-control select1">
                                    <option value="">Nature annonce</option>
                                    <option value="Changement">Changement</option>
                                    <option value="Don">Don</option>
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
        <div class="row">

       
    @if(!empty($annonces))
          @foreach($annonces as $annonce)
              <div class="col-md-3 col-sm-4  ">
              <div class="box box-animation" style="padding:0 !important;">
               <div class="box-header boxImg" style="background-image:url('/upload/PictureAnnonce/{{$annonce->file}}');">
                <div class="box-header-cover">
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
                <a class="btn btn-default btn-success deletee "  data-toggle="modal" data-target="#modal-danger{{$annonce->id}}"> 
                    <i class="fa fa-times" aria-hidden="true"></i> 
                 </a>
            
                 <div class="modal modal-danger fade confirm-popup" id="modal-danger{{$annonce->id}}" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                          <h4 class="modal-title">Confirmation ! </h4>
                        </div>
                        <div class="modal-footer">
                                <form method="POST" action="{{ route('supprimer_annonce') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$annonce->id}}">
                                        <button type="submit" class="btn btn-outline pull-left">J'accepte</button>
                                        <button type="button" class="btn btn-outline "  data-dismiss="modal">Anuler</button>
                                </form>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                    <h1>{{DB::table('users')->select('name')->where('id','=',$annonce->user_id)->value('name')}}</h1>
                </div>
               </div>
                <div class="box-body" >
                  <h2>
                  @if($annonce->typeannonce=="Offre")
                       {{DB::table('produits')->select('reference')->where('id','=',$annonce->refproduit)->value('reference')}}  
                  @else
                       {{DB::table('produits')->select('reference')->where('id','=',$annonce->refproduitEchange)->value('reference')}} 
                  @endif
                  </h2>
                  <p>
                     {{$annonce->designation}}
                  </p>
                </div>
                <div class="box-footer">
             
                
                        @if($annonce->typeannonce=="Offre")
                            <a href="/labo/mesannonces/offre/{{$annonce->id}}" class="btn btn-default btn-lg btn-block btn-repondre ">Consulté</a>
                        @else
                            <a  href="/labo/mesannonces/demande/{{$annonce->id}}"  class="btn btn-default btn-lg btn-block btn-repondre-Demande ">Consulté</a>
                        @endif
        
                </div>
              </div>
            </div>
        </div>
            @endforeach
            <div class=" row text-center">
                    {{$annonces->links()}}
            </div>
           
            @else
            <p>aucune annonce a publié dons cette compte</p>
            @endif
              
            </div>
          </div>
   
</section>
@endsection
