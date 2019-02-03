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

}

</style>
<section class="content-header">
    <h1>
       Discussion
      <small>labshare</small>
    </h1>
    <ol class="breadcrumb">
       
      <li class="active"><i class="fa fa-dashboard"> </i> Menu</li>
      <li><a href="#"> Discussion </a></li>
  
    </ol>
  </section>
  <section class="content">
  <div class="row ">
        <div class="col-md-12">
          <div class="box">
            <div class="box-body">
                    <div class="col-md-offset-4 col-md-4">
                        <div class="row" style="text-align:center;">
                                <br>  <br>  <br>  <br>  <br>
                                    <img src="/img/coming-soon.png"  class="img-responsive"  />
                                    <br>  <br>  <br>  <br>  <br>
                                </div>
                    </div>
            </div>
        </div>
    </div>
</div>
  </section>
  @endsection