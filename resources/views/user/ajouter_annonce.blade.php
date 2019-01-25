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
    padding: 0;
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

fieldset
{
  background-color:#CCC;

  padding:16px;	
}
.legend1
{
  margin-bottom:0px;
  margin-left:16px;
}

</style>
<section class="content-header">
    <h1>
        Ajouter une annonce 
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Menu</li>
        <li><a href="#"> Mes annonces </a></li>
        <li><a href="#"> Ajouter une annonce </a></li>
      </ol>
  </section>
  <section class="content">
  

    <div class="row row_list_produit">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                @if (Session::has('message-success-ajout-annonce'))
                        <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-check"></i> alerte !</h4>
                                {{ Session::get('message-success-ajout-annonce') }}
                        </div>
                @endif
                  <div class="row">
                  
                      <form class="form-horizontal form-submit-annonce" method="post" enctype="multipart/form-data"   action="{{route('addannonce')}}">
                      @csrf
                          <div class="box-body ">
                            <div class="form-group typeannonce">
                              <label for="typeannonce" class="col-sm-2 control-label">Type d'annonce</label>
            
                              <div class="col-sm-10">
                                    <select name="typeannonce" id="typeannonce" class="form-control">
                                            <option value="Offre">Offre</option>
                                            <option value="Demande" >Demande</option>
                                    </select>
                                @if ($errors->has('typeannonce'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('typeannonce') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                            <div class="form-group natureAnnonce">
                                    <label for="typeoffre"  class="col-sm-2 control-label">Nature d'annonce</label>
                  
                                    <div class="col-sm-10">
                                          <select name="natureannonce" id="natureannonce" class="form-control" >    
                                                  <option value="Changement">Changement </option>
                                                  <option value="Don" >Don</option>
                                          </select>
                                      @if ($errors->has('natureannonce'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('natureannonce') }}</strong>
                                          </span>
                                      @endif
                                    </div>
                            </div>
                            <div class="form-group designation">
                              <label for="designation" class="col-sm-2 control-label ">Désignation </label>
            
                              <div class="col-sm-10">
                                  <textarea class="form-control" name="designation" id="designation" rows="3" placeholder="Enter ..." required></textarea>
                                  @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                         
                             <div class="form-group ProduitAdonner">
                                        <label for="designation" class="col-sm-2 control-label ">Votre produit </label>
                                 <div class="col-md-10">
                                        <div class="row" >
                                                <div class="col-md-4">
                                                    <div class="form-group ">
                                                            <div class="col-sm-12">
                                                                      <select name="refproduit" id="refproduit" class="form-control">
                                                                                 <option value="id p1" selected disabled>Référence  </option> 
                                                                                 @foreach($refuser as $ref)
                                                                                 <option value="{{$ref->id}}">{{$ref->reference}} </option>
                                                                                 @endforeach
                                                                                 
                                                                      </select>
                                                                  @if ($errors->has('refproduit'))
                                                                      <span class="help-block">
                                                                          <strong>{{ $errors->first('refproduit') }}</strong>
                                                                      </span>
                                                                  @endif
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                        <div class="form-group qte">
                                                             <div class="col-sm-12">
                                                                  <input type="number" class="form-control" name="qte" id="qte" placeholder="Quantité " >
                                                                  @if ($errors->has('qte'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('qte') }}</strong>
                                                                </span>
                                                                  @endif
                                                        </div>
                                                    </div>
                                                </div>
                                             
                                            </div>
        
                                 </div>

                             </div>
                             <div class="form-group ProduitSouhaité">
                                    <label for="designation" class="col-sm-2 control-label ">Produit souhaité </label>
                             <div class="col-md-10">
                                    <div class="row" >
                                            <div class="col-md-4">
                                                <div class="form-group refproduitEchange">
                                                        <div class="col-sm-12">
                                                                  <select name="refproduitEchange" id="refproduitEchange" class="form-control">
                                                                             <option value="id p1" selected disabled>Référence  </option> 
                                                                             @foreach($reftotal as $ref)
                                                                             <option value="{{$ref->id}}">{{$ref->reference}} </option>
                                                                             @endforeach
                                                                  </select>
                                                              @if ($errors->has('refproduitEchange'))
                                                                  <span class="help-block">
                                                                      <strong>{{ $errors->first('refproduitEchange') }}</strong>
                                                                  </span>
                                                              @endif
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                    <div class="form-group qtetEchange">
                                                         <div class="col-sm-12">
                                                              <input type="number" class="form-control" name="qtetEchange" id="qtetEchange" placeholder="Quantité " >
                                                              @if ($errors->has('qtetEchange'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('qtetEchange') }}</strong>
                                                            </span>
                                                              @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
    
                             </div>

                         </div>
                             

                                    <div class="form-group file">
                                            <label for="file" class="col-sm-2 control-label" >Image</label>
                          
                                            <div class="col-sm-10">
                                              <input type="file" class="form-control" name="file" id="file" >
                                              @if ($errors->has('file'))
                                          <span class="help-block">
                                              <strong>{{ $errors->first('file') }}</strong>
                                          </span>
                                              @endif
                                            </div>
                                    </div>
                                  
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="reset" class="btn btn-default">Annuler</button>

                            <button type="submit" class="btn btn-success pull-right">Publier</button>
                            </form>
                            
                          </div>
                          <!-- /.box-footer -->
                        </form>
                </div>
              </div>
            </div>
          </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

   <script>
   
$(document).ready(function(){


$("#typeannonce").change(function(){
 
    $('.ProduitAdonner').show();
    $('.ProduitSouhaité').show();

        if($("#typeannonce").val()=="Offre"){

            if($("#natureAnnonce").val()=="Cangement"){
                $('.ProduitAdonner').show();
                $('.ProduitSouhaité').show();
            }else if($("#natureAnnonce").val()=="Don"){
                $('.ProduitAdonner').show();
                 $('.ProduitSouhaité').hide();

            }

        }else if($("#typeannonce").val()=="Demande"){
           
            if($("#natureAnnonce").val()=="Cangement"){
                $('.ProduitAdonner').show();
                $('.ProduitSouhaité').show();
            }else if($("#natureAnnonce").val()=="Don"){
                $('.ProduitAdonner').hide();
                 $('.ProduitSouhaité').show();

            }

        }
    
        
    });

    $("#natureAnnonce").change(function(){
        
        $('.ProduitAdonner').show();
    $('.ProduitSouhaité').show();

        if($("#typeannonce").val()=="Offre"){

            if($("#natureAnnonce").val()=="Cangement"){
                $('.ProduitAdonner').show();
                $('.ProduitSouhaité').show();
            }else if($("#natureAnnonce").val()=="Don"){
                $('.ProduitAdonner').show();
                 $('.ProduitSouhaité').hide();

            }

        }else if($("#typeannonce").val()=="Demande"){
           
            if($("#natureAnnonce").val()=="Cangement"){
                $('.ProduitAdonner').show();
                $('.ProduitSouhaité').show();
            }else if($("#natureAnnonce").val()=="Don"){
                $('.ProduitAdonner').hide();
                 $('.ProduitSouhaité').show();

            }

        }
  
});


});

 
   </script>
</section>
@endsection
