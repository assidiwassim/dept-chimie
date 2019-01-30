@extends('layouts.layout-labo')
@section('content')
<link rel="shortcut icon" type="image/png" href="img/log.png"/>
  <link rel="shortcut icon" type="image/png" href="img/log.png" />
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
</style>    
<div class="content container-fluid">
        
              
  
    
    
    
    <div id="ProfileAdmin">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Profile client </h3>
            </div>
            <div>
            @if (Session::has('message-success-modification-profil'))
                                            <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> alerte !</h4>
                                                    {{ Session::get('message-success-modification-profil') }}
                                            </div>
                                          @endif
            </div>
            <div class="box-body"> 
                    <div class="col-md-9">
                            <form class="form-horizontal"  method="post" action="{{route('Modifier_profile_general')}}" >
                            @csrf
                        <div class="form-group">
                            <label for="username"  class="col-sm-4 control-label" >Nom d'utilisateur </label>
                            <div class="col-sm-8">
                                    <input type="text" class="form-control" name="username"  value="{{Auth::user()->name}}" required>
                                    @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong class="text-danger">{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="email" class="col-sm-4 control-label" >Adresse email</label>
                                <div class="col-sm-8">
                                        <input type="email" class="form-control" value="{{Auth::user()->email}}"  name="email" required>
                                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong class="text-danger" >{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-12">
                                         <button type="submit" class="btn btn-sm btn-flat btn-primary pull-right" >Modifier</button>
                                </div>
                    </div>
                    </form>
                    <br>
                    <hr>
                    <form class="form-horizontal" method="post" action="{{route('changepassoword')}}" id="Modifier_MotDePasse_profile">
                    @csrf
                            <div class="form-group">
                                    <label  class="col-sm-4 control-label">Ancien mot de passe</label>
                                    <div class="col-sm-8">
                                            <input type="password" class="form-control"  name="EcienPassword" required>
                                            @if ($errors->has('EcienPassword'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('EcienPassword') }}</strong>
                                            </span>
                                             @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-sm-4 control-label">Nouveau mot de passe</label>
                                    <div class="col-sm-8">
                                            <input type="password" class="form-control"  name="NewPassword" required>
                                            @if ($errors->has('NewPassword'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('NewPassword') }}</strong>
                                            </span>
                                             @endif
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label f class="col-sm-4 control-label">Confirmer le nouveau mot de passe</label>
                                    <div class="col-sm-8">
                                            <input type="password" class="form-control" name="ConfNewPassword" required>
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-flat btn-primary pull-right " disubled="">Modifier</button>
                        </div>   
                        </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                                        
                                        <img src="/upload/logo/{{Auth::user()->logo}}" class="img-responsive" alt="User Image">
                                        
                        </div>
                        <button type="button" class="btn btn-sm btn-flat btn-default btn-block" data-toggle="modal" data-target="#modal-default14">Modifier la photo de profile</button>
                       <div class="modal fade" id="modal-default14" style="display: none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close button-close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">MODIFIER LA PHOTO DE PROFILE</h4>
                                  </div>
                                  <div class="modal-body">
                                      <div class="box">
                                      
                                          <form id="modifier-photo-profile"  method="post" enctype="multipart/form-data" action="{{route('changeavatar')}}">
                                          @csrf
                                            <div class="box-body">                                  
                                              <div class="form-group">
                                                <label for="ImageInput" class=" control-label">Choisir une image</label>
                                                <input type ="file" name="logo"  class="form-control" accept="image/*" required>

                                                <p>
                                                        <small>Upload file in
                                                            <code>png</code>,<code>jpg</code>,<code>jpeg</code>format</small>
                                                </p>   
                                                @if ($errors->has('logo'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong class="text-danger">{{ $errors->first('logo') }}</strong>
                                                    </span>
                                                @endif      
                                              </div>
                                            </div>
                                            
                                            <button type="button" class="btn btn-default pull-left close_modal_doc" data-dismiss="modal">ANNULER</button>
                                            <button type="submit" class="btn btn-primary pull-right">MODIFIER</button>
                                            <br> 
                                            
                                          </form>
                                          @if (Session::has('message-success-modification-user'))
                                            <div class="alert alert-success alert-dismissible">
                                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                    <h4><i class="icon fa fa-check"></i> alerte !</h4>
                                                    {{ Session::get('message-success-modification-user') }}
                                            </div>
                                          @endif
                                          
                                      </div>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>
                    </div>
                    
               
                </div>
              
            
     </div>
     <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
 </div>
  
    

</div>
@endsection
