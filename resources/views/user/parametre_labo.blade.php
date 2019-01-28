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
</style>    
<div class="content container-fluid">
        
              
  
    
    
    
    <div id="ProfileAdmin">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Profile client </h3>
            </div>
            <div class="box-body"> 
                    <div class="col-md-9">
                            <form class="form-horizontal" id="Modifier_profile_general">
                        <div class="form-group">
                            <label for="username" class="col-sm-4 control-label">Nom d'utilisateur </label>
                            <div class="col-sm-8">
                                    <input type="text" class="form-control" name="username" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Adresse email</label>
                                <div class="col-sm-8">
                                        <input type="email" class="form-control" name="email" readonly="">
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="col-md-12">
                                         <button type="submit" class="btn btn-sm btn-flat btn-primary pull-right" disabled="">Modifier</button>
                                </div>
                    </div>
                    </form>
                    <br>
                    <hr>
                    <form class="form-horizontal" id="Modifier_MotDePasse_profile">
                      
                            <div class="form-group">
                                    <label for="EcienPassword" class="col-sm-4 control-label">Ancien mot de passe</label>
                                    <div class="col-sm-8">
                                            <input type="password" class="form-control" id="EcienPassword" name="EcienPassword">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="NewPassword" class="col-sm-4 control-label">Nouveau mot de passe</label>
                                    <div class="col-sm-8">
                                            <input type="password" class="form-control" id="NewPassword" name="NewPassword">
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label for="ConfNewPassword" class="col-sm-4 control-label">Confirmer le nouveau mot de passe</label>
                                    <div class="col-sm-8">
                                            <input type="password" class="form-control" id="ConfNewPassword" name="ConfNewPassword">
                                    </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-flat btn-primary pull-right ">Modifier</button>
                        </div>   
                        </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <div class="thumbnail">
                                        
                                        <img src="https://service.virussantecommunication.ca/user.png" class="img-responsive" alt="User Image">
                                        
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
                                      
                                          <form id="modifier-photo-profile">
                                            <div class="box-body">                                  
                                              <div class="form-group">
                                                <label for="ImageInput" class=" control-label">Choisir une image</label>
                                                <input type="file" id="FileInput" name="FileInput" class="form-control">
                                                <p>
                                                        <small>Upload file in
                                                            <code>png</code>,<code>jpg</code>,<code>jpeg</code>format</small>
                                                </p>         
                                              </div>
                                            </div>
                                            
                                            <button type="button" class="btn btn-default pull-left close_modal_doc" data-dismiss="modal">ANNULER</button>
                                            <button type="submit" class="btn btn-primary pull-right">MODIFIER</button>
                                            <br> 
                                            
                                          </form>
                                          
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
