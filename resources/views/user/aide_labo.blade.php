@extends('layouts.layout-labo')

@section('content')
<div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
</div>
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

}

</style>

<section class="content-header">
    <h1>
        Centre d'aide
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
       
      <li class="active"><i class="fa fa-dashboard"> </i> Menu</li>
      <li><a href="#"> Centre d'aide </a></li>
  
    </ol>
  </section>
  <section class="content">
    
    <div class="box box-solid" style="padding-left:40px;">
      
          <header class="content-header container-fluid" >
              <div class="row">
                  <div class="col-lg-8">
                      <h1 class="content-max-width">Documentation </h1>
                      <hr>
                  </div>
                  
              </div>
          </header>
     

      <div class="row">
        <br>
        <div class=" col-md-3">
           <div class="help-block"></div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#">Labshare</a></li>
                  <li><a href="#">Ajouter annonce</a></li>
                  <li><a href="#"> Demander un produit</a></li>
                  <li><a href="#"> Offrir un produit </a></li>
                  <li><a href="#"> Chatez </a></li>
                  
                </ul>
              </div>
        </div>
        <div class="col-md-8">
            <section class="content-max-width">
                <section id="installation">
                    <h3>Labshare</h3>
<p>
AdminLTE can be installed using multiple methods. Pick your favorite method from the list below.
Please be sure to check the <a href="/adminlte-docs/{v}/dependencies">dependencies section</a>
before continuing.
</p>

<h3>Download</h3>

<h4>From Github</h4>
<p>Visit the <a href="https://github.com/almasaeed2010/AdminLTE/releases">releases section on Github</a> and
download the latest release.</p>
<p>

</p>

<h3>Command Line</h3>

<h4>Via NPM</h4>
<p>
</p><pre><code>npm install admin-lte --save</code></pre>
<p></p>

<h4>Via Bower</h4>
<p>
</p><pre><code>bower install admin-lte</code></pre>
<p></p>
<p>If bower asks which version of jQuery to use, choose version 3 or above.</p>

<h4>Via Composer</h4>
<p>
</p><pre><code>composer require "almasaeed2010/adminlte=~2.4"</code></pre>
<p></p>


</section>
    </section>
        </div>

      </div>
     
     

    </div>
  </section>
  @endsection