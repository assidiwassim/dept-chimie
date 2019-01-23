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
      <li><a href="#"><i class="fa fa-dashboard"></i> Magasin </a></li>
      <li class="active">Menu</li>
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
                                    <option selected disabled>Référence</option>
                                    <option>option 2</option>
                                    <option>option 3</option>
                                    <option>option 4</option>
                                    <option>option 5</option>
                                  </select>
                     </div>
                    <div class="col-md-2">
                            <select name="formule" class="form-control select2">
                                    <option selected disabled>Formule</option>
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
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Référence</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Désignation</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Formule chimique</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Quantité</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Unité</th></tr>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th></tr>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr role="row" class="odd">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Firefox 1.0</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.7</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                </tr>
                                <tr role="row" class="even">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Firefox 1.5</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                </tr>
                                <tr role="row" class="odd">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Firefox 2.0</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                 </tr>
                                 <tr role="row" class="even">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Firefox 3.0</td>
                                  <td>Win 2k+ / OSX.3+</td>
                                  <td>1.9</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                 </tr><tr role="row" class="odd">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Camino 1.0</td>
                                  <td>OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                 </tr><tr role="row" class="even">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Camino 1.5</td>
                                  <td>OSX.3+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                </tr><tr role="row" class="odd">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Netscape 7.2</td>
                                  <td>Win 95+ / Mac OS 8.6-9.2</td>
                                  <td>1.7</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                               </tr><tr role="row" class="even">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Netscape Browser 8</td>
                                  <td>Win 98SE+</td>
                                  <td>1.7</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                </tr><tr role="row" class="odd">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Netscape Navigator 9</td>
                                  <td>Win 98+ / OSX.2+</td>
                                  <td>1.8</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                </tr><tr role="row" class="even">
                                  <td class="sorting_1">Gecko</td>
                                  <td>Mozilla 1.0</td>
                                  <td>Win 95+ / OSX.1+</td>
                                  <td>1</td>
                                  <td>A</td>
                                  <td  style="width: 50px"><button class="btn btn-primary btn-sm btn-block">Modifier</button></td>
                                  <td style="width: 50px"><button class="btn btn-danger btn-sm ">Supprimer</button></td>
                                </tr></tbody>
                            </table></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
   
</section>
@endsection
