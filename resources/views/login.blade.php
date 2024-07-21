<x-header/>

     

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-md-6 mx-auto">
                    @if (session()->has('success'))
                        <div class="alert alert-danger ">
                            <p> {{session()->get('success')}} </p>
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="alert alert-danger" >
                            <p>{{session()->get('error')}}</p>
                        </div>
                    @endif
                    <div class="section-title">
                        <h2>Login Here</h2>
                    </div>
                    <div class="contact__form">
                        <form action="{{URL::to('loginUser')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="col-lg-12">
                                   
                                    <button type="submit" class="site-btn">Login Here</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
  <x-footer/>