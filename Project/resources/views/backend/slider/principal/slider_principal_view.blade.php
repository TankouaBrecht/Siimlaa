@extends('admin.admin_master')

@section('admin')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('title')
SIMLA - Sliders
@endsection

    <!--=========================================
    PRODUCT SLIDERS SECTION
    ==========================================-->

    <section class="content-main">
        
        <div class="content-header">
            <div>
                <h2 class="content-title card-title">Liste des Sliders </h2>
                <p>Listes des images défilantes</p>
            </div>
            <div>
                <input type="text" placeholder="Search Categories" class="form-control bg-white">
            </div>
        </div>

        <!--=========================================
        DISPLAY SLIDERS 
        ==========================================-->
        <div class="card">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
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
                                        <th>Titre de l'offre</th>
                                        <th>Titre Principal</th>
                                        <th>Titre Secondaire</th>
                                        <th>Description</th>
                                        <th>Titre de l'action</th>
                                        <th>Status</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($sliders as $key => $value)

                                    <tr>
                                        <td class="text-center">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" />
                                            </div>
                                        </td>
                                        <td>{{ $key+1 }}</td>
                                        <td><img src="{{ asset($value->slider_image) }}" class="img-sm img-thumbnail" alt="Item"></td>
                                        <td><b>{{ $value->slider_offer_title_fr }}</b></td>
                                        <td><b>{{ $value->slider_main_title_fr  }}</b></td>
                                        <td><b>{{ $value->slider_secondary_title_fr }}</b></td>
                                        <td><b>{{ $value->slider_desc_fr  }}</b></td>
                                        <td><b>{{ $value->slider_action_title_fr  }}</b></td>
                                        <td>
                                            @if($value->status != 0)
                                                <span class="badge rounded-pill alert-success">Active</span>
                                            @else 
                                                <span class="badge rounded-pill alert-warning">InActive</span>
                                            @endif
                                        </td>
                                        <td class="text-end">
                                            <div class="dropdown">
                                                <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item text-primary" href="#" data-toggle="tooltip" data-placement="top" title="Appercue du slide">View detail</a>
                                                    <a class="dropdown-item text-info" href="{{ route('slider.edit', $value->id) }}" data-toggle="tooltip" data-placement="top" title="Editer le slider">Edit info</a>
                                                    <a class="dropdown-item text-danger" href="{{ route('slider.delete', $value->id) }}" id="delete" data-toggle="tooltip" data-placement="top" title="Supprimer le slider">Delete</a>
                                                    @if($value->status != 0)
                                                    <a class="dropdown-item text-warning" href="{{ route('slider.inactive', $value->id) }}" data-toggle="tooltip" data-placement="top" title="Desactiver le slider">Desactiver</a>
                                                    @else 
                                                    <a class="dropdown-item text-success" href="{{ route('slider.active', $value->id) }}" data-toggle="tooltip" data-placement="top" title="Activer le slider">Activer</a>
                                                    @endif
                                                </div>
                                            </div> <!-- dropdown //end -->
                                        </td>
                                    </tr>

                                @endforeach
                                    

                                </tbody>
                            </table>
                        </div>
                    </div> <!-- .col// -->

                </div> <!-- .row // -->
            </div> <!-- card body .// -->
        </div> <!-- card .// -->

        <!--=========================================
        ADD SLIDER SECTION TITLE
        ==========================================-->

        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Ajouter Un Nouveau Slider</h2>
                </div>
            </div>
        </div>

        <!--=========================================
        ADD  SECTION FORM
        ==========================================-->

        <div class="col-lg-12">

            <div class="card mb-4">

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-12">

                            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <!--=========================================
                                ENGLISH GENERAL INFO
                                ==========================================-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <h6>1. General info en francais</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre de l'offre</label>
                                            <input type="text" name="slider_offer_title_fr" placeholder="Type here" class="form-control" id="product_name" />
                                            @error('slider_offer_title_fr')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre principal <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_main_title_fr" placeholder="Type here" class="form-control" id="product_name" />
                                            @error('slider_main_title_fr')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre sécondaire <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_secondary_title_fr" placeholder="Type here" class="form-control" id="product_name" />
                                            @error('slider_secondary_title_fr')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Description</label>
                                            <input type="text" name="slider_desc_fr" placeholder="Type here" class="form-control" id="product_name" />
                                            @error('slider_desc_fr')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre de l'action à affectuer en francais <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_action_title_fr" placeholder="Type here" class="form-control" id="product_name" />
                                            @error('slider_action_title_fr')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->

                                <hr class="mb-4 mt-0">

                                <!--=========================================
                                SLIDER MEDIA
                                ==========================================-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <h6>3. Media</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <img src="{{ asset('backend/assets/imgs/theme/upload.svg') }}" class="img-lg" id="showImg" class=""  alt="">
                                            <input class="form-control" name="slider_image" type="file" id="image">
                                            @error('slider_image')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div> <!-- col.// -->
                                </div> <!-- .row end// -->

                                <hr class="mb-4 mt-0">

                                <div class="row">
                                    <div class="col-md-3">
                                        <h6>4. Publier</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Créer un slider">
                                    </div>
                                </div>

                            </form> <!-- .form // -->

                        </div> <!-- .col12 // -->

                    </div>

                </div> <!-- .card-body end// -->
            </div> <!-- .card end// -->
        <div>

    </section> <!-- content-main end// -->



    <!--=========================================
    JS UPLOAD FILE SCRIPT
    ==========================================-->

    <script type="text/javascript">

        $(document).ready(function() {

            $('#image').change(function(e) {

                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $("#showImg").attr("src", e.target.result);
                }

                reader.readAsDataURL(e.target.files[0]);

            });

        });

    </script>

@endsection