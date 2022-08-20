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
        
        <!--=========================================
        ADD SLIDER SECTION TITLE
        ==========================================-->

        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Editer le Slider</h2>
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

                            <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="id" value="{{$slider->id}}">	
                                <input type="hidden" name="old_img" value="{{$slider->slider_image}}">

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
                                            <input type="text" name="slider_offer_title_fr" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_offer_title_fr }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre principal <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_main_title_fr" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_main_title_fr }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre sécondaire <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_secondary_title_fr" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_secondary_title_fr }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Description</label>
                                            <input type="text" name="slider_desc_fr" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_desc_en }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre de l'action à affectuer en francais <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_action_title_fr" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_action_title_fr }}" />
                                        </div>
                                    </div> <!-- col.// -->
                                </div> <!-- row.// -->

                                <hr class="mb-4 mt-0">

                                <!--=========================================
                                FRENCH GENERAL INFO
                                ==========================================-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <h6>2. General info en anglais</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre de l'offre</label>
                                            <input type="text" name=" slider_offer_title_en" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_offer_title_en }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre principal <span class="text-danger">*</span></label> 
                                            <input type="text" name="slider_main_title_en" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_main_title_en }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre sécondaire <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_secondary_title_en" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_secondary_title_en }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Description</label>
                                            <input type="text" name="slider_desc_en" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_desc_en }}" />
                                        </div>
                                        <div class="mb-4">
                                            <label for="product_name" class="form-label">Titre de l'action à affectuer <span class="text-danger">*</span></label>
                                            <input type="text" name="slider_action_title_en" placeholder="Type here" class="form-control" id="product_name" value="{{ $slider->slider_action_title_en }}" />
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
                                            @if($slider->slider_image)
                                                <img src="{{ asset($slider->slider_image) }}" class="img-lg" id="showImg" class=""  alt="">
                                            @else
                                            <img src="{{ asset('backend/assets/imgs/theme/upload.svg') }}" class="img-lg" id="showImg" class=""  alt="">
                                            @endif
                                            <input class="form-control" name="slider_image" type="file" id="image">
                                        </div>
                                    </div> <!-- col.// -->
                                </div> <!-- .row end// -->

                                <hr class="mb-4 mt-0">

                                <div class="row">
                                    <div class="col-md-3">
                                        <h6>4. Publier</h6>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Mettre à jour">
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