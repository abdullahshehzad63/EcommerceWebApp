<x-header />

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="./index.html">Home</a>
                            <a href="./shop.html">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad ">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($cartItems as $item)
                                    
                             
                                <tr class="product_data" id="custom-{{$item->prod_id}}">
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{asset('coverimage/'.$item->products->image)}}" width="50px" alt="">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{$item->products->name}}</h6>
                                            <h5>${{$item->products->price}}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <input type="hidden" value="{{$item->prod_id}}" class="prod_id">
                                        <div class="input-group text-center ">
                                            @if ($item->products->quantity>$item->prod_qty)
                                            <button class="input-group-text changeQuantity decrement-btn" > - </button>
                                            <input type="text" name="quantity" value="{{$item->prod_qty}}" class="form-control qty-input text-center" >
                                            <button class="input-group-text changeQuantity increment-btn" > + </button>
                                            @php
                                            $total +=$item->products->price*$item->prod_qty;
                                        @endphp
                                            @else
                                                <label for="" class="badge bg-danger" >Out of Stock</label>
                                            @endif
                                            
                                        </div>
                                    </td>
                                    <td class="cart__price">${{$item->products->price*$item->prod_qty}}</td>
                                    <td class="cart__close delete-cart-item"><i class="fa fa-close"></i></td>
                                </tr>
                               
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn">
                                <a href="{{URL::to('/')}}">Continue Shopping</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="continue__btn update__btn">
                                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__discount">
                        <h6>Discount codes</h6>
                        <form action="#">
                            <input type="text" placeholder="Coupon code">
                            <button type="submit">Apply</button>
                        </form>
                    </div>
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>${{$total}}</span></li>
                            <li>Total <span>${{$total}}</span></li>
                        </ul>
                        <a href="{{URL::to('/checkout')}}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section> 
 <x-footer />