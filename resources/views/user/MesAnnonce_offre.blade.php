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
        Offre 
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">

      <li class="active"><i class="fa fa-dashboard"></i> Menu</li>
      <li><a href="#"> Mes annonces </a></li>
      <li><a href="#"> Offre </a></li>
    </ol>
  </section> 
  <section class="content">

   



    <div class="row row_list_produit">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <div class="row">
                        <div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                <th>N°</th>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nom  de labo</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Commentaire</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Etat</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Date</th>

                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                               <th></th>
                                </tr>
                                </thead>
                                <tbody>

                     
                                <tr role="row" class="even">
                                @if(!empty($reponse))
                               @foreach($reponse as $rep)
                                <td>{{$loop->index+1}}</td>
                                  <td class="sorting_1">{{DB::table('users')->whereid($rep->user_id)->value('name')}}</td>
                                  <td>{{$rep->commentaire}}</td>
                                  <td>{{$rep->created_at}}</td>
                                  <td>

                                  @if($rep->etat=="annuler")
                                  <span class="label label-danger">Annuler</span>
                                  @elseif($rep->etat=="enattente")
                                  <span class="label label-warning">En attente</span>
                                  @else
                                  <span class="label label-success">Confirmer</span>
                                  @endif

                                  </td>
                                
                                  
                                  @if($rep->etat=="enattente")
                                  <td  style="width: 50px">
                                  <form method="post"  action="{{route('consulte_offre_confirmer')}}">
                                        @csrf
                                        <input  name="reponse_id" type="hidden" value="{{$rep->id}}">   
                                         <button class="btn btn-succes btn-sm btn-block" type="submit">Confirmer</button>
                                    </form>
                                    </td> 
                             
                                  <td style="width: 50px">

                                  <form method="post"  action="{{route('consulte_offre_annuler')}}">
                                        @csrf
                                        <input  name="reponse_id" type="hidden" value="{{$rep->id}}"> 
                                         <button class="btn btn-danger btn-sm btn-block" type="submit">Annuler</button>
                                    </form>
                                    </td>
                                    @elseif($rep->etat=="confirmer")
                                    <td style="width: 50px">

                                        <form method="post"  action="{{route('consulte_offre_annuler')}}">
                                            @csrf
                                            <input  name="reponse_id" type="hidden" value="{{$rep->id}}"> 
                                            <button class="btn btn-danger btn-sm btn-block" type="submit">Annuler</button>
                                        </form>
                                        </td>
                                    @else
                                    <td  style="width: 50px">
                                  <form method="post"  action="{{route('consulte_offre_confirmer')}}">
                                        @csrf
                                        <input  name="reponse_id" type="hidden" value="{{$rep->id}}">   
                                         <button class="btn btn-succes btn-sm btn-block" type="submit">Confirmer</button>
                                    </form>
                                    </td> 
                                    @endif
                                </tr>
                                @endforeach
                                @else
                                <h2 color="red">aucune offre sur cette annonce</h2>
                                @endif

                               </tbody>
                            </table></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
   
</section>
@endsection
