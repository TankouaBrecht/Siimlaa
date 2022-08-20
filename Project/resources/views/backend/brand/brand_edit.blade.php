@extends('admin.admin_master')

@section('admin')

@section('title')
Marketplace | Brand
@endsection

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
		  <div class="row">
            <div class="col-12">
            <div class="box">
					<div class="box-header">						
						<h4 class="box-title">Edit Brand </h4>
					</div><br>
                    <div class="box-body">
                <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf	
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                <h5>brand Name FR <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="brand_name_fr" class="form-control" value="{{$brand->brand_name_fr}}">
                                    @error('brand_name_fr')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                              </div>
                            </div>
                        </div> <br>
                        <div class="form-group">
                            <h5>Brand Image <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="file" name="brand_image" class="form-control" value="">
                                @error('brand_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><br>
                    <div class="text-xs-right">
                        <button type="submit" class="btn btn-rounded btn-info">Modifier </button>
                    </div>
                </form>
                </div>
            </div>
			</div>
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

  <!-- /.content-wrapper -->

@endsection