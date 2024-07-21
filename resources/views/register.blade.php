<x-header/>

    <!-- Map Begin -->
   
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
               
                <div class="col-lg-6 col-md-6 mx-auto">
                    <div class="section-title">
                        <h2>Create Account</h2>

                   </div>
                    <div class="contact__form">
                        <form action="{{URL::to('registeredUser')}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" name="name" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="email" placeholder="Email">
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="image" placeholder="Choose Image">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="password" placeholder="Password">
                                </div>
                                <div class="col-lg-12">
                                    
                                    <button type="submit" class="site-btn">Send Message</button>
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