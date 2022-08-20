    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
    <div class="modal-content" style="height:95vh;" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><span id="pname">ADD SERVICE </span></h5>
        <button type="button" class="close" data-dismiss="modal" id="closeModel" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div>
          </div>
         <div class="col-12">
           <div class="row ">
             <div class="col-md-5" style="margin-right: 15px ;" >
              <form action="" enctype="multipart/form-data">
                  <div class="form-group">
                      <label for="">Insert service item title</label>
                      <div class="controls">
                        <input type="text" name="title" class="form-control" value="" placeholder="service item title" data-role="tagsinput">
                        @error('service_tags_fr') 
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="">Insert service item price</label>
                      <div class="controls">
                        <input type="text" name="sprice" class="form-control" value="" placeholder="service item price" data-role="tagsinput">
                        @error('sprice') 
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="">Insert picture</label>
                      <div class="controls">
                        <input type="file" name="spic" id="img" class="form-control" value="" placeholder="service item price" data-role="tagsinput">
                        @error('service_tags_fr') 
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
                  <div class="form-group">
                      <label for="">service item description</label>
                      <div class="controls">
                        <textarea name="sdescp" id="" cols="35" rows="5"></textarea>
                        @error('service_tags_fr') 
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                  </div>
              </form>
             </div>

             <div class="col-md-6 text-center" style="" >
              <div class="d-flex justify-center align-center flex-column">
              <img src="{{asset('frontend/img/vendor/vendor-store.jpg')}}" id="showImg" >
              <br>
              <button class="btn btn-lg btn-warning my-3" >Add Service</button>
              </div>
             </div>  
           </div>
         </div>
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">

$(document).ready(function() {

    $('#img').change(function(e) {

        var reader = new FileReader();
        
        reader.onload = function(e) {
            $("#showImg").attr("src", e.target.result);
        }

        reader.readAsDataURL(e.target.files[0]);

    });

});

</script>