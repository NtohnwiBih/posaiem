    <!-- Topbar Start -->
    <div class="container-fluid text-white-50 py-2 px-0 d-none d-lg-block" style="background-color: #0C2C37;">
        <div class="row gx-0 align-items-center">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="fa fa-phone-alt me-2"></small>
                    <small>+237 697717334</small>
                </div>
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <small class="far fa-envelope-open me-2"></small>
                    <small>alphaaccessinternational@yahoo.com</small>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center">
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-twitter"></i></a>
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="text-white-50 ms-4" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5">
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <img class="img-fluid me-3 logo" src="{{ URL::to('frontend/img/logo.png')}}" alt="">
        </a>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mx-auto bg-light rounded pe-4 py-3 py-lg-0">
                <a href="{{ route('about') }}" class="nav-item nav-link">à Propos</a>
                <a href="{{ route('services') }}" class="nav-item nav-link">Services</a>
                <a href="{{ route('blog') }}" class="nav-item nav-link">Blog/Actualité</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            </div>
        </div>
        <a href="" class="btn px-3 d-none d-lg-block" style="background-color: #0C2C37;" >Get Connected</a>
    </nav>
    <!-- Navbar End -->