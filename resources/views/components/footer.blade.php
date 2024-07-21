  <!-- Footer Section Begin -->
  <footer class="footer">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6">
                  <div class="footer__about">
                      <div class="footer__logo">
                          <a href="#"><img src="img/footer-logo.png" alt=""></a>
                      </div>
                      <p>The customer is at the heart of our unique business model, which includes design.</p>
                      <a href="#"><img src="img/payment.png" alt=""></a>
                  </div>
              </div>
              <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6">
                  <div class="footer__widget">
                      <h6>Shopping</h6>
                      <ul>
                          <li><a href="#">Clothing Store</a></li>
                          <li><a href="#">Trending Shoes</a></li>
                          <li><a href="#">Accessories</a></li>
                          <li><a href="#">Sale</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-6">
                  <div class="footer__widget">
                      <h6>Shopping</h6>
                      <ul>
                          <li><a href="#">Contact Us</a></li>
                          <li><a href="#">Payment Methods</a></li>
                          <li><a href="#">Delivary</a></li>
                          <li><a href="#">Return & Exchanges</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
                  <div class="footer__widget">
                      <h6>NewLetter</h6>
                      <div class="footer__newslatter">
                          <p>Be the first to know about new arrivals, look books, sales & promos!</p>
                          <form action="#">
                              <input type="text" placeholder="Your email">
                              <button type="submit"><span class="icon_mail_alt"></span></button>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12 text-center">
                  <div class="footer__copyright__text">
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      <p>Copyright ©
                          <script>
                              document.write(new Date().getFullYear());
                          </script>2020
                          All rights reserved | This template is made with <i class="fa fa-heart-o"
                              aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                      </p>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  </div>
              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  <!-- Search Begin -->
  <div class="search-model">
      <div class="h-100 d-flex align-items-center justify-content-center">
          <div class="search-close-switch">+</div>
          <form class="search-model-form">
              <input type="text" id="search-input" placeholder="Search here.....">
          </form>
      </div>
  </div>
  <!-- Search End -->

  <!-- Js Plugins -->
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
  <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
  <script src="{{ asset('js/mixitup.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>

  <script>
      $(document).ready(function() {
          $('.addToCartBtn').click(function(e) {
              e.preventDefault();
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

              var product_id = $(this).closest('.product_data').find('.prod_id').val();
              var product_qty = $(this).closest('.product_data').find('.qty-input').val();
              $.ajax({
                  method: "POST",
                  url: '/add-to-cart',
                  data: {
                      'product_id': product_id,
                      'product_qty': product_qty
                  },
                  success: function(response) {
                      alert(response['status']);
                  }
              });
          });
          $('.increment-btn').click(function(e) {
              e.preventDefault();


              // var inc_value = $('.qty-input').val();
              var inc_value = $(this).closest('.product_data').find('.qty-input').val();
              var value = parseInt(inc_value, 10);
              value = isNaN(value) ? 0 : value;
              if (value < 10) {
                  value++;
                  // $('.qty-input').val(value);
                  $(this).closest('.product_data').find('.qty-input').val(value);
              }
          });
          $('.decrement-btn').click(function(e) {
              e.preventDefault();
              // var dec_value = $('.qty-input').val();
              var dec_value = $(this).closest('.product_data').find('.qty-input').val();
              var value = parseInt(dec_value, 10);
              value = isNaN(value) ? 0 : value;
              if (value > 1) {
                  value--;
                  // $('.qty-input').val(value);
                  // this is the code after taking the value of the quantity in the input fields that are set into database
                  $(this).closest('.product_data').find('.qty-input').val(value);
              }
          });

          //   $('.changeQuantity').click(function(e) {
          //       e.preventDefault();
          //       $.ajaxSetup({
          //           headers: {
          //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          //           }
          //       });
          //       var prod_id = $(this).closest('.product_data').find('.prod_id').val();
          //       var qty = $(this).closest('.product_data').find('.qty-input').val();
          //       $.ajax({
          //           method: "POST",
          //           url: '/update-cart',
          //           data: {
          //               'prod_id': prod_id,
          //               'prod_qty': qty,
          //           },
          //           success: function(response) {
          //               window.location.reload();
          //           }
          //       });
          //   });

          // THe updation is listed here
        //   $('.changeQuantity').click(function(e) {
        //       e.preventDefault();
        //       $.ajaxSetup({
        //           headers: {
        //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //           }
        //       });
        //       var $this = $(this); // Reference to the clicked button
        //       var prod_id = $this.closest('.product_data').find('.prod_id').val();
        //       var qty = $this.closest('.product_data').find('.qty-input').val();

        //       $.ajax({
        //           method: "POST",
        //           url: '/update-cart',
        //           data: {
        //               'prod_id': prod_id,
        //               'prod_qty': qty,
        //           },
        //           success: function(response) {
        //               if (response.status) {
        //                   // Update the quantity input value
        //                   $this.closest('.product_data').find('.qty-input').val(response
        //                       .updated_qty);

        //                   // Update the price and total
        //                   var updatedPrice = response.updated_price;
        //                   var updatedTotal = response.updated_total;

        //                   $this.closest('.product_data').find('.cart__price').text('$' +
        //                       updatedPrice);
        //                   $('#cart-total').text('$' +
        //                   updatedTotal); // Assuming you have an element with id 'cart-total' for the total price

        //                   // Optionally, display a success message
        //                   alert(response.message);
        //               } else {
        //                   alert(response.message); // Show error message
        //               }
        //           },
        //           error: function(xhr, status, error) {
        //               console.log(xhr.responseText); // Debug AJAX errors
        //           }
        //       });
        //   });

        $('.changeQuantity').click(function(e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $this = $(this); // Reference to the clicked button
    var prod_id = $this.closest('.product_data').find('.prod_id').val();
    var qty = $this.closest('.product_data').find('.qty-input').val();

    $.ajax({
        method: "POST",
        url: '/update-cart',
        data: {
            'prod_id': prod_id,
            'prod_qty': qty,
        },
        success: function(response) {
            if (response.status) {
                // Update the quantity input value
                $this.closest('.product_data').find('.qty-input').val(response.updated_qty);

                // Update the price and total
                var updatedPrice = response.updated_price;
                var updatedTotal = response.updated_total;

                $this.closest('.product_data').find('.cart__price').text('$' + updatedPrice);
                $('#cart-total').text('$' + updatedTotal); // Assuming you have an element with id 'cart-total' for the total price

                // Optionally, display a success message
                // alert(response.message);
            } else {
                alert(response.message); // Show error message
            }
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText); // Debug AJAX errors
            alert('Something went wrong. Please try again.'); // User-friendly error message
        }
    });
});



          //   $('.delete-cart-item').click(function(e) {
          //       e.preventDefault();
          //       $.ajaxSetup({
          //           headers: {
          //               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          //           }
          //       });
          //       var prod_id = $(this).closest('.product_data').find('.prod_id').val();
          //       $.ajax({
          //           method: "POST",
          //           url: '/delete-product',
          //           data: {
          //               'prod_id': prod_id,
          //           },
          //           success: function(response) {
          //               // alert(response.status);
          //               // window.location = 'shopping_cart';
          //               if (response['status'] == true) {
          //                   $("#custom-" + prod_id).remove();
          //               }
          //           }
          //       })
          //   });
          $('.delete-cart-item').click(function(e) {
              e.preventDefault();

              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });

              var prod_id = $(this).closest('.product_data').find('.prod_id').val();
              console.log('Deleting product ID:', prod_id); // Add this line for debugging

              $.ajax({
                  method: "POST",
                  url: '/delete-product',
                  data: {
                      'prod_id': prod_id,
                  },
                  success: function(response) {
                      console.log(response); // Add this line for debugging
                      if (response.status) {
                          $("#custom-" + prod_id).remove(); // Make sure prod_id is used here
                      } else {
                          alert(response.message); // Add this line to show error messages
                      }
                  },
                  error: function(xhr, status, error) {
                      console.log(xhr.responseText); // Add this line to debug any AJAX errors
                  }
              });
          });

      })
  </script>

  </body>

  </html>
