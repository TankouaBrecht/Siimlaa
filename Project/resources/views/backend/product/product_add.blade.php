@extends('admin.admin_master')

@section('admin')

@section('title')
SIMLA | Add-Product
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    

<section class="content-main">
    <form action="{{ route('add.product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="content-header">
                    <h2 class="content-title">Ajouter Un Nouveau Produit</h2>
                    <div>
                        <input type="submit" class="btn btn-md rounded font-sm hover-up" value="Publier">
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Basic</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="product_name" class="form-label">Titre du produit fr</label>
                            <input type="text" name="product_name_fr" placeholder="Type here" class="form-control" id="product_name">
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Description du produit fr</label>
                            <textarea name="long_descp_fr" placeholder="Type here" class="my-editor form-control" id="my-editor2" rows="4">
                                Long Description French
                            </textarea>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Quantité</label>
                                    <div class="row gx-2">
                                        <input name="product_qty" placeholder="20" type="text" class="form-control">
                                        @error('product_qty') 
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Prix régulier</label>
                                    <div class="row gx-2">
                                        <input name="selling_price" placeholder="$" type="text" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Prix promotionnel</label>
                                    <input name="discount_price" placeholder="$" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Shipping</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_size_fr" class="form-label">Taille du produit fr</label>
                                    <input name="product_size_fr" type="text" placeholder="X,XL,XXL,M,Small,Large" class="form-control">
                                </div>
                            </div>
                
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_color_fr" class="form-label">Couleur du produit fr</label>
                                    <input type="text" name="product_color_fr" placeholder="blanc,noir,vert" class="form-control">
                                    @error('product_color_fr') 
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- card end// -->
            </div>
        
            <div class="col-lg-3">
                <!--=============================
                MEDIA 
                ==============================--> 
                <div class="card mb-2">
                    <div class="card-header">
                        <h4>Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="{{ asset('backend/assets/imgs/theme/upload.svg') }}" alt="" id="mainThmb">
                            <input name="product_thambnail" onChange="mainThamUrl(this)" class="form-control" type="file">
                            @error('product_thambnail') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> <!-- card end// -->
                <!--=============================
                MULTI MEDIA 
                ==============================--> 
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Multi Media</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <div id="preview_img">

                            </div>
                            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                            @error('multi_img') 
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div> <!-- card end// -->

                <!--========================================
                ORGANIZATION 
                =========================================-->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Organisation</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="mb-4">
                                <label class="form-label">Categorie</label>
                                <select name="category_id" class="form-select">
                                    @foreach ($categories as $key => $value)
                                        <option value="{{ $value->id }}"> {{ $value->category_name_fr }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Sous-categorie</label>
                                <select name="subcategory_id" class="form-select">
                                    {{-- Sous-categorie a charger avec ajax  --}}
                                </select>
                                @error('subcategory_id') 
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="product_tags_fr" class="form-label">Tags fr</label>
                                <input name="product_tags_fr" type="text" class="form-control" value="Femmes,wigs,Accessoires">
                            </div>
                        </div> <!-- row.// -->
                    </div>
                </div> <!-- card end// -->
            </div>
        </div>
    </form>
</section> <!-- content-main end// -->



    <!--===============================
    AJAX JS SCRIPT DEPENDANT DROPDOWN  
    ================================-->

    <script type="text/javascript">

        // DEPENDENT DROPDOWN FOR SUBCATEGORY  

        $('select[name="category_id"]').on('change', function(e) {
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/category/subcategories/ajax') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">'+ value.subcategory_name_fr +'</option>');
                        });
                    }, //End Of Retrieve Data
                }); //End Of Ajax Script
            } else {
                alert('danger');
            } //End Of Condition
        }); 

    </script>

    <!--===============================
    JS SCRIPT TO PREVIEW THAMBNAIL IMAGE  
    ================================-->

    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }	
    </script>

    <!--===============================
    JS SCRIPT TO PREVIEW MULTI-IMAGE  
    ================================-->

    <script>
    
        $(document).ready(function(){
            $('#multiImg').on('change', function(){ //on file input change
                if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data
                    
                    $.each(data, function(index, file){ //loop though each file
                        if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file){ //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                            .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                    
                }else{
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
        
    </script>

    <!--===============================
    AJAX JS SCRIPT FOR ADD MULTIPLE SPECIFICATIONS 
    ================================-->

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on('click', '.addeventmore', function() {
                var extra_item_to_add = $("#extra_item_to_add").html();
                $('.add_item').append(extra_item_to_add);
                counter++;    
            }); //End to add item 
            $(document).on('click', '.removeeventmore', function() {
                $(this).closest(".delete_extra_item_to_add").remove();
                counter--
            }); //End remove item 
        }); //End Initialize Jquery Script
    </script>


@endsection

@push('scripts')

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
</script>

<script>
    CKEDITOR.replace('my-editor', options);
    CKEDITOR.replace('my-editor2', options);
</script>

@endpush