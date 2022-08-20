<!DOCTYPE html>
<html class="no-js" lang="fr">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">

    <style>
	.toast {
	background-color: #030303 !important;
	}
	.toast-info {
	background-color: #3276b1 !important;
	}
	.toast-info2 {
	background-color: #2f96b4 !important;
	}
	.toast-error {
	background-color: #bd362f !important;
	}
	.toast-success {
	background-color: #51a351 !important;
	}
	.toast-warning {
	background-color: #f89406 !important;
	}

	</style>

</head>

<body>
    <!-- Modal -->
  
    <!-- Header -->
    @include('frontend.components.header')
   
     <!-- Main -->
    <main class="main">       
       @yield('content')
    </main>
  
    <!-- Footer -->
    @include('frontend.components.footer')

    <!-- Preloader Start -->
    @include('frontend.components.preloader')
	<!--=====================================
	 ALL MODALS 
	======================================-->
	@include('frontend.modals.cart_modal')

    
    <script>
	function googleTranslateElementInit(){
	  var config={
		pageLanguage: 'fr',
		includedLanguages:'fr,en',
		layout:google.translate.TranslateElement.InlineLayout.SIMPLE
	  };
	  var langOptionsID='google_translate_element';
	  new google.translate.TranslateElement(config,langOptionsID);
	}
   </script>
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <!-- Vendor JS-->
    	<!-- Latest compiled JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js') }}"></script>

	{{-- JS SCRIPTS  --}}
	<!-- TOAST MSG  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script>
    @if(Session::has('message'))
      
      var type = "{{ Session::get('alert-type', 'info') }}";
      switch (type) {
        case 'info':
          toastr.info(" {{ Session::get('message') }} ")
          break;
      
        case 'success':
          toastr.success(" {{ Session::get('message') }} ")
          break;

        case 'warning':
          toastr.warning(" {{ Session::get('message') }} ")
          break;

        case 'error':
          toastr.error(" {{ Session::get('message') }} ")
          break;
      }

    @endif
	</script> 
	<!-- end service -->
	@stack('scripts')

<script type="text/javascript">

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
})

//   start product view with modal

function productView(id){
  // alert(id);
  $.ajax({
      type: 'GET',
      url: '/product/view/modal/'+id,
      dataType:'json',
      success:function(data){
          console.log(data)
          $('#pname').text(data.product.product_name_fr);
          $('#pcode').text(data.product.product_code);
          $('#pcategory').text(data.product.category.category_name_fr);
          $('#pbrand').text(data.product.brand.brand_name_fr);
          $('#pimage').attr('src','/'+data.product.product_thambnail);
          $('#product_id').val(id);
          $('#qty').val(1);

      // price and discount show
      if(data.product.discount_price == null){
          $('#pprice').text(data.product.selling_price);
      }else{
          $('#pprice').text(data.product.discount_price);
      }

      // stock option
      if(data.product.product_qty>0){
          $('#aviable').text('');
          $('#stockout').text('');
          $('#aviable').text('aviable');
      }else{
          $('#aviable').text('');
          $('#stockout').text('');
          $('#stockout').text('stockout');
      }

      // color
      $('select[name="pcolor"]').empty();
      $.each(data.color,function(key,value){
          $('select[name="pcolor"]').append('<option value="'+value+'">'+value+'</option>')
          if(data.color == ""){
              $('#colorArea').hide();
          }else{
              $('#colorArea').show();
          }
      })
      // size
      $('select[name="psize"]').empty();
      $.each(data.size,function(key,value){
          $('select[name="psize"]').append('<option value="'+value+'">'+value+'</option>')
          if(data.size == ""){
              $('#sizeArea').hide();
          }else{
              $('#sizeArea').show();
          }
      })


      }

  })// end
 
}

// START ADD TO CART

  function addToCarts(){
      var product_name = $('#pname').text();
      var id = $('#product_id').val();
      var color = $('#pcolor option:selected').text();
      var size = $('#psize option:selected').text();
      var quantity = $('#qty').val();

      $.ajax({
          type: 'POST',
          dataType: 'json',
          data:{
              color:color,size:size,quantity:quantity,product_name:product_name
          },
          url:"/cart/data/store/"+id,
          success:function(data){
              $('#closeModel').click();

              // 
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success',
              showConfirmButton: false,
              timer: 3000
              })

              if($.isEmptyObject(data.error)){
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      title: data.error
                  })
              }

          }
      })
      minicart();
  } 
  // end add to cart

  // START MINI CART SHOW

  function minicart(){
      $.ajax({
          type:'GET',
          url:'/product/mini/cart',
          dataType:'json',
          success:function(response){
              console.log(response)

              $('#CartSubTotal').text(response.cartTotal);
              $('#CartQty').text(response.cartQty);
              $('#mblCartQty').text(response.cartQty);

              var minicart = ""
              $.each(response.carts, function(key,value){
                  minicart += ` <li>
                                                <div class="shopping-cart-img">
                                                    <a href="#"><img alt="Simla" src="/${value.options.image}" width="50px"></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="#">${value.name}</a></h4>
                                                    <p class="text-center"><span>${value.qty} × </span>${value.price}</p>
                                                </div>
                                                <div class="shopping-cart-delete" style="cursor: pointer;">
                                                    <p id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fi-rs-cross-small"></i></p>
                                                </div>
                                            </li>

                  `
              });
              $('#minicart').html(minicart);
          }
      })
  }
  minicart();
  // End Minicart show


  // START MINICART REMOVE

  function minicartRemove(rowId){
      var product_name = $('#pname').text();
      var id = $('#product_id').val();
      var color = $('#pcolor option:selected').text();
      var size = $('#psize option:selected').text();
      var quantity = $('#qty').val();
      $.ajax({
          type:'GET',
          url: '/minicart/product-remove/'+rowId,
          dataType:'json',
          success:function(data){
              minicart();

              // start
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success',
              showConfirmButton: false,
              timer: 3000
              })

              if($.isEmptyObject(data.error)){
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      title: data.error
                  })
              }

          }
      })
  }
  // End remove to minicart

    // START USER CART SHOW

    function usercart(){
      $.ajax({
          type:'GET',
          url:'/product/mini/cart',
          dataType:'json',
          success:function(response){

              $('#userCartSubTotal').text(response.cartTotal);
              $('#userCartQty').text(response.cartQty);

              var usercart = ""
              $.each(response.carts, function(key,value){
                  usercart += `                            <tr>
                                <td class="image product-thumbnail"><img src="/${value.options.image}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h5 class="product-name"><a href="shop-product-right.html">${value.name}</a></h5>
                                </td>
                                <td class="price" data-title="Price"><span>$65.00 </span></td>
                                <td class="text-center" data-title="Stock">
                                    <div class="detail-qty border radius  m-auto">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <span class="qty-val">${value.qty}</span>
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    $<span>${value.price} </span>
                                </td>
                                <td class="action" data-title="Remove"><p class="text-muted" id="${value.rowId}" onclick="minicartRemove(this.id)"><i class="fi-rs-trash"></i></p></td>
                            </tr>

                  `
              });
              $('#usercart').html(usercart);
          }
      })
  }
  usercart();
  // End usercart show

</script>

	<!-- ADD TO WISHLIST -->
<script type="text/javascript">
		function addToWishlist(product_id){
			$.ajax({
				type:'POST',
				url: '/add-to-wishlist/'+product_id,
				dataType:'json',
				success:function(data){
	
					// start
					const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
					})

					if($.isEmptyObject(data.error)){
						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success
						})
					}else{
						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error
						})
					}

				}
			})
            countwishlist()

		}
</script>
<!-- END -->

<script type="text/javascript">
		function wishlist(){
			$.ajax({
				type:'GET',
				url:'/user/get-wishlist-product',
				dataType:'json',
				success:function(response){
					// console.log(response)

					var rows = ""
					$.each(response, function(key,value){
						rows += `                            <tr>
                                <td class="image product-thumbnail" ><img src="/${value.product.product_thambnail}" alt="#"></td>
                                <td class="product-des product-name">
                                    <h5 class="product-name"><a href="shop-product-right.html">${value.product.product_name_fr}</a></h5>
                                    <p class="font-xs">${value.product.long_descp_fr}<br> distingy magndapibus.
                                    </p>
                                </td>
                                <td class="price">
                                    $ ${value.product.discount_price == null
                                    ? `${value.product.selling_price}`: `${value.product.discount_price} `
                                }
                                    </td>
                                <td class="text-center" data-title="Stock">
                                    <span class="color3 font-weight-bold">In Stock</span>
                                </td>

                                <td class="text-right" data-title="Cart">
                                    <button class="btn btn-sm" data-bs-toggle="modal"  data-bs-target="#quickViewModal" id="${value.product.id}" onclick="productView(this.id)" data-placement="top" title="Add to cart"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                                </td>
                                <td class="action" data-title="Remove"><p id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fi-rs-trash"></i></p></td>
                            </tr>`
					});
					$('#wishlist').html(rows);
				}
			})
		}
        wishlist()
        function countwishlist(){
            console.log('response')
			$.ajax({
				type:'GET',
				url:'/user/get-wishlist-count',
				dataType:'json',
				success:function(response){
                    
					console.log(response)
                    $('#Wishlistcount').text(response);
                    $('#mblWishlistcount').text(response);

				}
			})
		}
        countwishlist()

          // START wishlist REMOVE

  function wishlistRemove(rowId){
      $.ajax({
          type:'GET',
          url: '/user/remove-wishlist-product/'+rowId,
          dataType:'json',
          success:function(data){
              wishlist();

              // start
              const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success',
              showConfirmButton: false,
              timer: 3000
              })

              if($.isEmptyObject(data.error)){
                  Toast.fire({
                      type: 'success',
                      title: data.success
                  })
              }else{
                  Toast.fire({
                      type: 'error',
                      title: data.error
                  })
              }

          }
      })
  }
  // End remove to minicart
</script>
	<!-- COMMAND PRODUCT -->
	<script type="text/javascript">
		function addToCommandproduct(product_id){
			$.ajax({
				type:'POST',
				url: '/add-to-command-product/'+product_id,
				dataType:'json',
				success:function(data){
	
					// start
					const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
					})

					if($.isEmptyObject(data.error)){
						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success
						})
					}else{
						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error
						})
					}

				}
			})
		}
	   </script>
	<!-- END -->

	<!-- COMMAND SERVICE -->
	<script type="text/javascript">
		function addToCommandservice(service_id){
			$.ajax({
				type:'POST',
				url: '/add-to-command-service/'+service_id,
				dataType:'json',
				success:function(data){
	
					// start
					const Toast = Swal.mixin({
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 3000
					})

					if($.isEmptyObject(data.error)){
						Toast.fire({
							type: 'success',
							icon: 'success',
							title: data.success
						})
					}else{
						Toast.fire({
							type: 'error',
							icon: 'error',
							title: data.error
						})
					}

				}
			})
		}
	   </script>
	<!-- END -->
</body>

</html>