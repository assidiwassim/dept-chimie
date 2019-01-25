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
    padding: 10px;
}
</style>
<section class="content-header">
    <h1>
      Tableau de bord 
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Tableau de bord </a></li>
      <li class="active">Menu</li>
    </ol>
  </section>
  <section class="content">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-product-hunt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Produits magasin</span>
            <span class="info-box-number">{{DB::table('produits')->whereuser_id(Auth::user()->id)->count()}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-shopping-basket"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Mes offres</span>
            <span class="info-box-number">{{DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce("Offre")->count()}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-green"><i class="fa fa-plus-circle"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Mes demandes</span>
            <span class="info-box-number">{{DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce("Demande")->count()}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
  
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Rapport récapitulatif mensuel</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="box-body">
                    <div class="table-responsive">
                      <table class="table no-margin">
                        <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Status</th>
                      
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                         
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                          
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                          
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-info">Processing</span></td>
                     
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR1848</a></td>
                          <td>Samsung Smart TV</td>
                          <td><span class="label label-warning">Pending</span></td>
                         
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR7429</a></td>
                          <td>iPhone 6 Plus</td>
                          <td><span class="label label-danger">Delivered</span></td>
                         
                        </tr>
                        <tr>
                          <td><a href="pages/examples/invoice.html">OR9842</a></td>
                          <td>Call of Duty IV</td>
                          <td><span class="label label-success">Shipped</span></td>
                         
                        </tr>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <p class="text-center">
                  <strong>Réalisation de l'objectif</strong>
                </p>

                <div class="progress-group">
                  <span class="progress-text">Mes annonces / annonces de l'intranet</span>
                  <span class="progress-number"><b>{{DB::table('annonces')->whereuser_id(Auth::user()->id)->count()}}</b>/{{DB::table('annonces')->count()}}</span>

                  <div class="progress sm">
                  @if(DB::table('annonces')->whereuser_id(Auth::user()->id)->count()==0)
                    <div class="progress-bar progress-bar-aqua" style="width:0%"></div>
                 @else
                 <div class="progress-bar progress-bar-aqua" style="width:{{(( DB::table('annonces')->whereuser_id(Auth::user()->id)->count())*100)/(DB::table('annonces')->count())}}%"></div>

                 @endif
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Mes offres / Mes annonces </span>
                  <span class="progress-number"><b>{{DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce("Offre")->count()}}</b>/{{DB::table('annonces')->whereuser_id(Auth::user()->id)->count()}}</span>

                  <div class="progress sm">
                  @if(DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce("Offre")->count()==0)
                    <div class="progress-bar progress-bar-red" style="width:0%"></div>
                  @else
                  <div class="progress-bar progress-bar-red" style="width: {{(( DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce('Offre')->count()) *100)/(DB::table('annonces')->whereuser_id(Auth::user()->id)->count()) }}%"></div>

                  @endif
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Mes demandes /  Mes annonces</span>
                  <span class="progress-number"><b>{{DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce("Demande")->count()}}</b>/ {{DB::table('annonces')->whereuser_id(Auth::user()->id)->count()}}</span>

                  <div class="progress sm">
                  @if(DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce("Demande")->count()==0)
                    <div class="progress-bar progress-bar-green" style="width:0%"></div>
                  @else
                  <div class="progress-bar progress-bar-green" style="width: {{(( DB::table('annonces')->whereuser_id(Auth::user()->id)->wheretypeannonce('Demande')->count() ) *100)/(DB::table('annonces')->whereuser_id(Auth::user()->id)->count() )}}%"></div>

                  @endif
                  </div>
                </div>
                <!-- /.progress-group -->
                <div class="progress-group">
                  <span class="progress-text">Mes produits /  les produits de l'intranet</span>
                  <span class="progress-number"><b>{{DB::table('produits')->whereuser_id(Auth::user()->id)->count()}}</b>/{{DB::table('produits')->count()}}</span>

                  <div class="progress sm">
                  @if(DB::table('produits')->whereuser_id(Auth::user()->id)->count()==0)
                    <div class="progress-bar progress-bar-yellow" style="width:0%"></div>
                 @else
              <div class="progress-bar progress-bar-yellow" style="width: {{ ( (DB::table('produits')->whereuser_id(Auth::user()->id)->count())*100)/(DB::table('produits')->count()) }}%"></div>

                 @endif
                  </div>
                </div>
                <!-- /.progress-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
        
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

   
</section>
@endsection
