@extends('admin.admin_master')

@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('title')
SIMLA - Categories
@endsection

    <!--=========================================
    PRODUCT CATEGORIES SECTION
    ==========================================-->

    <section class="content-main">
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Categories </h2>
                <p>Ajout et Listes des categories</p>
            </div>
            <div>
                <input type="text" placeholder="Search Categories" class="form-control bg-white">
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <!--=========================================
                    DISPLAY CATEGORIES 
                    ==========================================-->

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
                                        <th>Image</th>
                                        <th>Icone</th>
                                        <th>Name Fr</th>
                                        <th>Slug</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $key => $value)

                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </td>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset($value->category_image) }}" class="img-sm img-thumbnail" alt="Item"></td>
                                        <td><b>{{ $value->category_icon }}</b></td>
                                        <td><b>{{ $value->category_name_fr }}</b></td>
                                        <td><b>{{ $value->category_slug_fr }}</b></td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#" data-placement="top" title="Appercue de la categorie">View detail</a>
                                                    <a class="dropdown-item" href="{{ route('category.edit', $value->id) }}" data-toggle="tooltip" data-placement="top" title="Editer la catégorie">Edit info</a>
                                                    <a class="dropdown-item text-danger" href="{{ route('category.delete', $value->id) }}" id="delete" data-toggle="tooltip" data-placement="top" title="Supprimer la catégorie">Delete</a>
                                                </div>
                                            </div> <!-- dropdown //end -->
                                        </td>
                                    </tr>

                                @endforeach
                                    

                                </tbody>
                            </table>
                        </div>
                    </div> <!-- .col// -->

                                        <!--=========================================
                    ADD CATEGORY FORM
                    ==========================================-->

                    <div class="col-md-3">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="mb-4">
                                <label for="product_name" class="form-label">Nom en francais</label>
                                <input type="text" name="category_name_fr" placeholder="Type here" class="form-control" id="product_name" />
                                @error('category_name_fr')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="product_name" class="form-label">Categorie icone</label>
                                <input type="text" name="category_icon" placeholder="Type here" class="form-control" id="product_name" />
                                @error('category_icon')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="input-upload">
                                <img src="{{ asset('backend/assets/imgs/theme/upload.svg') }}" name="category_image" id="showImg"  alt="">
                                <input class="form-control" name="category_image" type="file" id="image">
                                @error('category_image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="d-grid mt-4">
                                <input type="submit" class="btn btn-primary" value="Créer une categorie">
                            </div>
                            
                        </form>
                    </div>

                </div> <!-- .row // -->
            </div> <!-- card body .// -->
        </div> <!-- card .// -->
    </section> <!-- content-main end// -->



    <!--=========================================
    JS UPLOAD FILE SCRIPT
    ==========================================-->

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