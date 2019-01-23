

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

                   
                    <div class="box">
                            <div class="box-header">

                            </div>
                     <div class="box-body">
                        
                        
                        
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype=”multipart/form-data”>
                                @csrf
                            <br>      
                            <div class="form-group">
                                        <label for="type" class="col-sm-4 control-label">Type de compte</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="role" required="" aria-required="true">
                                                <option value="" disabled="" selected="1">Sélectionnez un type</option>
                                                <option value="user">Laboratoire</option>
                                                <option value="admin">Administrateur</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-4 control-label">{{ __('Name') }}</label>
                                        <div class="col-sm-8">
                                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                                
                                              </div>
                                    </div>
                
                                
                                    <div class="form-group">
                                        <label for="email" class="col-sm-4 control-label">{{ __('E-Mail Address') }}</label>
                
                                        <div class="col-sm-8">
                                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="tel" class="col-sm-4 control-label">Téléphone</label>
                    
                                            <div class="col-sm-8">

                                                    <input id="tel" type="tel" name="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}"  required>

                                                    @if ($errors->has('tel'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('tel') }}</strong>
                                                        </span>
                                                    @endif
                                                
                                                </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">{{ __('Password') }} </label>
                
                                        <div class="col-sm-8">
                                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm" class="col-sm-4 control-label">{{ __('Confirm Password') }}</label>
                
                                        <div class="col-sm-8">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                         </div>
                                    </div>
                                    <div class="form-group">
                                            <label for="fileInput" class="col-sm-4 control-label"> Logo </label>
                                            
                                            <div class="col-sm-8">
                                              <input id="fileInput"  name="logo" type="file" class="form-control">
                                              <p>
                                                <small>
                                                  <code>jpeg</code> ,
                                                  <code>png</code>,
                                                  <code>jpg</code>,
                                                  <code>tiff</code>
                                                </small>
                                              </p>
                                            </div>
                                            
                                          </div>
                                   
                
                           
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <div class="col-md-offset-6 col-md-3">
                                    <button type="button" class="btn btn-default btn-sm  btn-block" data-dismiss="modal">Annuler</button>
                                </div>
                                <div class=" col-md-3">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">  {{ __('Register') }}</button>
                                </div>
                            </div>
                           
                        </form> 
                     </div>
                            </div>
                      <!-- /.box-footer -->
                </div>

            </section>


@endsection

