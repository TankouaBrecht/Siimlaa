@extends('admin.admin_master')

@section('admin')

@section('title')
Marketplace | Subcategory
@endsection
		<section class="content-main">
		  <div class="row">
            <div class="col-12">
            <div class="box">
					<div class="box-header">						
						<h4 class="box-title">Editer Subcategorie </h4>
					</div><br>
                    <div class="box-body">
                <form action="{{route('subcategory.update',$subcategory->id)}}" method="POST">
                    @csrf	
                       <div class="form-group">
                            <h5>Select Categorie <span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select id="select" name="category_id" required class="form-control">
                                    <option value="" selected="" >Select Category</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}" {{$item->id == $subcategory->category_id ? 'selected' : ''}}>{{$item->category_name_fr}} </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
						</div><br>		
                        <div class="form-group">
                            <h5>SubCategory Name FR <span class="text-danger">*</span></h5>
                            <div class="controls">
                            <input type="text" name="subcategory_name_fr" class="form-control" value="{{$subcategory->subcategory_name_fr}}">
                                @error('subcategory_name_fr')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div><br>
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-info" value="Update"> 
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