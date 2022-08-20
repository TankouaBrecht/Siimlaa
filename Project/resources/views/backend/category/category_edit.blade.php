@extends('admin.admin_master')

@section('admin')

@section('title')
SIMLA - Categories
@endsection

		<section class="content-main">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">						
                            <h4 class="box-title">Editer Categorie </h4>
                        </div><br>
                        <div class="box-body">
                            <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                                
                                @csrf			

                                <input type="hidden" name="id" value="{{$category->id}}">	
                                <input type="hidden" name="old_img" value="{{$category->category_image}}">	
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <h5>Category Name FR <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_fr" class="form-control" value="{{$category->category_name_fr}}">
                                        @error('category_name_fr')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                   </div>
                                    </div>
                                </div>
                                <br>                              
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                    <h5>Category Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" id="image" name="category_image" class="form-control">

                                        @error('category_image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                   </div>
                                    </div>
                                    <div class="col-lg-3">
                                     <img src="{{ asset($category->category_image) }}" alt="" id="showImg">
                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Modifier">
                                </div>

                            </form>
                            <!-- /.form -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
		</section>

    <!--=================================
    JS SCRIPT TO PREVIEW SLIDER
    ==================================-->

    <script type="text/javascript">

        $(document).ready(function() {

            $('#image').change(function(e) {

                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $("#showImg").attr("src", e.target.result).width(80).height(80);
                }

                reader.readAsDataURL(e.target.files[0]);

            });

        });

    </script>

@endsection