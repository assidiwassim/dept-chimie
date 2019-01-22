@extends('layouts.layout-Admin')

@section('content')
<section class="content-header">
    <h1>
      COMPTE ADMINISRTATEUR
    
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Menu</a></li>
      <li class="active"> Compte administrateur</li>
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
            <span class="info-box-text">Nombre des administrateurs </span>
            <span class="info-box-number">{{$nbadmin}}</span>
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
                        <th> Supprimer </th>
                        <th>Nom d'utilisateur </th>
                        <th>E-mail</th>
                        <th>Bloquer</th>
                      </tr>
                       
                      <tr>
                            @foreach ($admins as $admin)
                        <td>
                                <form method="post"   action="{{ route('delete') }}" >
                                        @csrf
                                        <input  name="admindel" type="hidden" value="{{$admin->id}}">
                                         <input type="submit" class="btn btn-sm btn-danger "  style="border-radius: 50%;">
                                    <i class="fa fa-times"></i>
                                    
                                </form>
                        </td>
                              
                     
                        <td> {{ $admin->name}}</td>
                        <td> {{ $admin->email}}</td>
                        <td>
                        @if($admin->block=="false")
                                <form method="post"   action="{{ route('block') }}" >
                                        @csrf
                                        <input  name="admin" type="hidden" value="{{$admin->id}}">         
                              
                                <button  type="submit" class="btn btn-sm btn-danger " >Bloquer</button>
                            </form>
                          @else
                            <form method="post"   action="{{ route('deblockadmin') }}" >
                                        @csrf
                                        <input  name="admin" type="hidden" value="{{$admin->id}}">         
                              
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
 <a href="/admin/addNewUser">adduser</a>
  </section>
@endsection