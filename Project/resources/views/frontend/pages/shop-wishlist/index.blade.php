@extends('frontend.main_master')

@section('content')

@section('title')
Wishlist
@endsection

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{URL('/')}}" rel="nofollow">Home</a>
            <span></span> SIIMLAA 
            <span></span> Favoris
        </div>
    </div>
</div>
<section class="mt-50 mb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table shopping-summery text-center">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col" colspan="2">Produit</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Stock Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody id="wishlist">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection