

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
        Magasin 
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">

      <li class="active"><i class="fa fa-dashboard"></i> Menu</li>
      <li><a href="#"> Magasin </a></li>
      <li><a href="#"> Liste des produits </a></li>
    </ol>
  </section>
  <section class="content">
  @if (Session::has('message-success'))
    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> alerte !</h4>
            {{ Session::get('message-success') }}
    </div>
    @endif
    @if (Session::has('message-success-update-produit'))
    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> alerte !</h4>
            {{ Session::get('message-success-update-produit') }}
    </div>
    @endif
    @if (Session::has('  message-success-delete-produit'))
    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> alerte !</h4>
            {{ Session::get('message-success-update-produit') }}
    </div>
    @endif
  
   

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body">
            <div class="row">
            <form id="search-form" method="post" action="{{route('magasin_labo_search')}}">
                @csrf 
                    <div class="col-md-6 input-container ">
                            <input type="text"  name="designation" class="form-control" placeholder="Essayer, 'Une désignation' ou bien 'Une référence' " >
                    </div>
                    <div class="col-md-2">
                    <select name="categorie" class="form-control select2" >
                                    <option value="" >Catégorie</option>
                                    @foreach($categorie as $cat)
                                    <option value="{{$cat->categorie}}">{{$cat->categorie}}</option>
                                    @endforeach
                                  
                            </select>
                     </div>
                    <div class="col-md-2">
                    <select name="formule" class="form-control select1">
                                    <option value="">Formule</option>
                                    
                                    @foreach($formule as $cat)
                                    <option value="{{$cat->formule}}">{{$cat->formule}}</option>
                                    @endforeach
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
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                <th>N°</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Référence</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Désignation</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Formule chimique</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Quantité</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Unité</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                                </tr>
                                </thead>
                                <tbody>
                     
                                <tr role="row" class="even">
                               @foreach($produits as $produit)
                                <td>{{$loop->index+1}}</td>
                                  <td class="sorting_1">{{$produit->reference}}</td>
                                  <td>{{$produit->designation}}</td>
                                  <td>{{$produit->formule}}</td>
                                  <td>{{$produit->qte}}</td>
                                  <td>{{$produit->unite}}</td>
                                  <td  style="width: 50px">
                                  <form method="post"  action="{{route('form_modifer-produit')}}"   >
                                        @csrf
                                        <input  name="idproduit" type="hidden" value="{{$produit->id}}">   
                                         <button class="btn btn-primary btn-sm btn-block" type="submit">Modifier</button>
                                    </form>
                                    </td> 
                                  <td style="width: 50px">

                                  <form method="post"  action="magasin/supprimer-produit"   >
                                        @csrf
                                        <input  name="idproduit" type="hidden" value="{{$produit->id}}">
                                         <button class="btn btn-danger btn-sm btn-block" type="submit">supprimer</button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                  <td colspan=8 class="text-center">
                                      {{$produits->links()}}
                                  </td>
                                    
                                  </tr>
                              
                               </tbody>
                            </table></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
   
</section>
@endsection
