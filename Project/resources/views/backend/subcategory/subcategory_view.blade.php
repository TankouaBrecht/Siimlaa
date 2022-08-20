@extends('admin.admin_master')

@section('admin')

@section('title')
SIMLA | Subcategory
@endsection

<section class="content-main">
	<div class="content-header">
		<div>
			<h2 class="content-title card-title">Sous-Categorie <span class="btn-danger" style="padding:4px 8px; border-radius:5px; font-size: 14px;">{{ count($subcategories) }}</span></h2>
			<p>Ajouter, Supprimer, editer une sous-categorie</p>
		</div>
		<div>
			<input type="text" placeholder="rechercher une sous-catégorie" class="form-control bg-white">
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<!--  -->
				<div class="col-md-9">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th class="text-center">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" value="" />
										</div>
									</th>
									<th>ID</th>
									<th>Catégorie</th>
									<th>Name Fr</th>
									
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($subcategories as $key => $value)
									<tr>
										<td>
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" />
											</div>
										</td>
										<td>{{ $key+1 }}</td>
										<td>{{$value->category->category_name_fr}}</td>
										<td>{{$value->subcategory_name_fr}}</td>
										<td width="20%" style="text-align: center !important;">
											<a href="{{route('subcategory.edit',$value->id)}}" class="btn btn-sm font-sm rounded btn-brand">
												<i class="material-icons md-edit"></i>
											</a>
											<a href="{{route('subcategory.delete',$value->id)}}" id="delete" class="btn btn-sm font-sm btn-dark rounded">
												<i class="material-icons md-delete_forever"></i>
											</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div> <!-- .col// -->

				<!-- AJOUTER SOUS CATEGORIES -->
				<div class="col-md-3">
					<form action="{{route('subcategory.store')}}" method="POST">
						@csrf
						<div class="mb-4">
							<label for="product_name" class="form-label">Non en francais</label>
							<input type="text" name="subcategory_name_fr" placeholder="Type here" class="form-control" id="product_name" />
						</div>
						<div class="mb-4">
							<label class="form-label">Categorie</label>
							<select id="select" name="category_id" class="form-select">
								<option value="" selected disabled>Select Category</option>
								@foreach($categories as $item)
									<option value="{{$item->id}}">{{$item->category_name_fr}} </option>
								@endforeach	
							</select>
						</div>
						<div class="d-grid">
							<input type="submit" class="btn btn-primary" value="Créer la sous-catégorie">
						</div>
					</form>
				</div>
			</div> <!-- .row // -->
		</div> <!-- card body .// -->
	</div> <!-- card .// -->
</section> <!-- content-main end// -->

@endsection