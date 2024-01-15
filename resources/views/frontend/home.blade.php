<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.layouts.head')
</head>
<body> 
        @include('frontend.layouts.header')
            <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn " data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ URL::to('frontend/img/carousel.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown">L'Assurance Crée de la Richesse Pour Tout le Monde</h1>
                                    <p class="fs-5 text-body mb-5">Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                                    <a href="" class="btn text-white py-3 px-5" style="background-color: #0c2b3d;">Acheter maintenant</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="carousel-item">
                    <img class="w-100" src={{ URL::to('frontend/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <h1 class="display-3 text-dark mb-4 animated slideInDown">The Best Insurance Begins Here</h1>
                                    <p class="fs-5 text-body mb-5">Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                                    <a href="" class="btn text-white  py-3 px-5" style="background-color: #0c2b3d;">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto" style="max-width: 500px;">
                <h1 class="display-6 mb-5">We're Here To Assist You Get Microinsurance Services</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 rounded-end me-4" style="background-color: #0c2b3d;" >
                                <img class="img-fluid" src="{{ URL::to('frontend/img/icon/icon-10-light.png') }}" alt="">
                            </div>
                            <h4 class="mb-0">Consultaion</h4>
                        </div>
                        <p class="mb-4"> Le premier réflexe à adopter est de faire constater le sinistre par un médecin d’une formation sanitaire agrée.</p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 rounded-end me-4" style="background-color: #0c2b3d;" >
                                <img class="img-fluid" src="{{ URL::to('frontend/img/icon/icon-01-light.png') }}" alt="">
                            </div>
                            <h4 class="mb-0">Déclarer le sinistre</h4>
                        </div>
                        <p class="mb-4">Déclarer le sinistre dans les 24 heures en cas d'accident ou dans les 48 heures en cas d'hospitalisation.</p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 rounded-end me-4" style="background-color: #0c2b3d;" >
                                <img class="img-fluid" src="{{ URL::to('frontend/img/icon/icon-05-light.png') }}" alt="">
                            </div>
                            <h4 class="mb-0">Présentation de le sinistre à l'assureur</h4>
                        </div>
                        <p class="mb-4">Le sinistre nous permettra de traiter les différentes demandes de remboursement</p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 rounded-end me-4" style="background-color: #0c2b3d;" >
                                <img class="img-fluid" src="{{ URL::to('frontend/img/icon/icon-08-light.png') }}" alt="">
                            </div>
                            <h4 class="mb-0">Les justificatifs relatifs au sinistre</h4>
                        </div>
                        <p class="mb-4">Apporter la preuve du sinistre</p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item rounded h-100 p-5">
                        <div class="d-flex align-items-center ms-n5 mb-4">
                            <div class="service-icon flex-shrink-0 rounded-end me-4" style="background-color: #0c2b3d;" >
                                <img class="img-fluid" src="{{ URL::to('frontend/img/icon/icon-07-light.png') }}" alt="">
                            </div>
                            <h4 class="mb-0">Assureur</h4>
                        </div>
                        <p class="mb-4"> Votre assureur peut avoir des instructions spécifiques sur la façon de procéder</p>
                        <a class="btn btn-light px-3" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
        @include('frontend.layouts.footer')
    @include('frontend.layouts.bottom')
</body>
</html>