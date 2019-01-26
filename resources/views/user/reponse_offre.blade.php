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

    <div class="row row_list_produit">
            <div class="col-md-12">
              <div class="box">
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
