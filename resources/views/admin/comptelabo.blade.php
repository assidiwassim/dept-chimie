@extends('layouts.layout-Admin')

@section('content')
<section class="content-header">
    <h1>
      COMPTE LABORATOIRE
    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li class="active"> Compte laboratoire</li>
    </ol>
</section>
<section class="content">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-yellow">
            <i class="fa fa-users" aria-hidden="true"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Nombre des laboratoire </span>
            <span class="info-box-number">{{$nblabo}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      
      <!-- fix for small devices only -->

    </div>


    @if (Session::has('message-error'))
    <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> alerte !</h4>
            {{ Session::get('message-error') }}
    </div>
    @endif
    
  
    @if (Session::has('message-success'))
    <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> alerte !</h4>
            {{ Session::get('message-success') }}
    </div>
    @endif

    <div class="row">
      <div class="col-xs-12">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="active">
              <a href="#tab_1" data-toggle="tab" aria-expanded="true">Clients</a>
            </li>
           
            <li class="pull-right">
              <input type="text" id="Recherche" class="form-control input-sm mainLoginInput " placeholder="">
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">


              <div class="box" style="border: none;">

                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                         <th>N°</th>
                        <th> Supprimer </th>
                        <th>Nom d'utilisateur </th>
                        <th>E-mail</th>
                        <th>Bloquer</th>
                      </tr>
                       
                      <tr>
                            @foreach ($labos as $labo)
                     
                        <td>{{$loop->index+1}}</td>
                        <td>
                                <form method="post"   action="{{ route('deletelabo') }}" >
                                        @csrf
                                        <input  name="labodel" type="hidden" value="{{$labo->id}}">
                                         <input type="submit" class="btn btn-sm btn-danger "  style="border-radius: 50%;">
                                    <i class="fa fa-times"></i>
                                    
                                </form>
                        </td>
                              
                     
                        <td> {{ $labo->name}}</td>
                        <td> {{ $labo->email}}</td>
                        <td>

                        @if ( $labo->block== "false")
                                <form method="post"   action="{{ route('blocklabo') }}" >
                                        @csrf
                                        <input  name="laboblock" type="hidden" value="{{$labo->id}}">         
                              
                                <button  type="submit" class="btn btn-sm btn-danger " >Bloquer</button>
                               </form>
                        @else

                               <form method="post"   action="{{ route('deblocklabo') }}" >
                                        @csrf
                                        <input  name="laboblock" type="hidden" value="{{$labo->id}}">         
                              
                                <button  type="submit" class="btn btn-sm btn-primary " >Débloquer</button>
                               </form>

                        @endif
                            </td>
                               
                            </tr>
                        
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.tab-pane -->
       
          </div>
          <!-- /.tab-content -->
        </div>


        <!-- /.box -->
      </div>
    </div>
 
  </section>
@endsection