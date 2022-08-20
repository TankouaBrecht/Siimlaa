    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
    <div class="modal-content" style="height:95vh;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><span id="pname"></span></h5>
        <button type="button" class="close" data-dismiss="modal" id="closeModel" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <ul class="nav nav-tabs" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">List View</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Carousel View</a>
          </li>
        </ul><!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="tabs-1" role="tabpanel">
          <div class="col-12">
           <div class="row">
            @if(!empty($galeries))
             @foreach($galeries as $gal)
             <div class="col-md-4" style="margin-bottom: 10px ;" >
               <div style="background-color: #f1f1f1;padding:7px;">
                <img src="{{ asset($gal->galery_image) }}" width="100%" height="110px">
                <div style="margin-top: 3px;">
                  <p>Title : {{$gal->galery_name_en}} </p>
                  <p>price : XAF {{$gal->service_price}}</p>
                </div>
                <div class="d-flex" style="justify-content: center !important;align-items:center">
                  <button class="btn btn-dark m-1"> Contact seller</button>
                  <button  class="btn btn-warning m-1">Command</button>
                </div>
               </div>
             </div>
             @endforeach
             @endif
           </div>
         </div>
          </div>
          <div class="tab-pane" id="tabs-2" role="tabpanel">
          <div id="carousel-2" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
        <ol class="carousel-indicators">
            <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-2" data-slide-to="1"></li>
            <li data-target="#carousel-2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox" style="height: 450px;">
          
            <div class="carousel-item active" >
                <a href="https://bootstrapcreative.com/">
                 
                 <img src="{{ asset('upload/ecom.png') }}" alt="responsive image"  width="100%" style="height:460px ;" class="d-block img-fluid">

                    <div class="carousel-caption" style="margin-top: -50px;">
                        <div>
                            
                            <h1 style="color:black;font-size:20px">WELCOME </h1>
                            
                        </div>
                    </div>
                </a>
            </div>
            <!-- /.carousel-item -->
            @if(!empty($galeries))
            @foreach($galeries as $gal)
            <div class="carousel-item">
                <a href="https://bootstrapcreative.com/" >
                 <img src="{{ asset($gal->galery_image) }}" alt="responsive image" style="height:460px ;" width="100%" class="d-block img-fluid">

                    <div class="carousel-caption justify-content-center align-items-center">
                        <div>
                            
                            <p style="color:black;font-size:20px">price : XAF {{$gal->service_price}}</p>
                            <button  class="btn btn-warning m-1">Command</button>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
            @endif
        </div>
        <!-- /.carousel-inner -->
        <a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- /.carousel -->

          </div>

        </div>

      </div>

    </div>
  </div>
</div>