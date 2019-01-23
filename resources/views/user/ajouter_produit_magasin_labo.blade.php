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
        Ajouter un produit 
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
       
      <li class="active"><i class="fa fa-dashboard"> </i> Menu</li>
      <li><a href="#"> Magasin </a></li>
      <li><a href="#"> Ajouter un produit </a></li>
    </ol>
  </section>
  <section class="content">
  

    <div class="row row_list_produit">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                      <form class="form-horizontal">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="reference" class="col-sm-2 control-label">Référence</label>
            
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="reference" id="reference" placeholder="Référence">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="designation" class="col-sm-2 control-label">Désignation</label>
            
                              <div class="col-sm-10">
                                  <textarea class="form-control" name="designation" id="designation" rows="3" placeholder="Enter ..."></textarea>
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="formule" class="col-sm-2 control-label">Formule</label>
              
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="formule" id="formule" placeholder="Formule chimique exemple: h2o">
                                </div>
                              </div>
                              <div class="form-group">
                                  <label for="unite" class="col-sm-2 control-label">Unité</label>
                
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" name="unite" id="unite" placeholder="Unité exemple: Litre">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="qte" class="col-sm-2 control-label">Quantité</label>
                  
                                    <div class="col-sm-10">
                                      <input type="number" class="form-control" name="qte" id="qte" placeholder="Quantité exemple: 10">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="categorie" class="col-sm-2 control-label">Catégorie</label>
                    
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" name="categorie" id="categorie" placeholder="Catégorie exemple: gaz">
                                      </div>
                                    </div>
                                  
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="reset" class="btn btn-default">Annuler</button>
                            <button type="submit" class="btn btn-primary pull-right">Ajouter</button>
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
