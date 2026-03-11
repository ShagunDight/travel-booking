@extends('layouts.app')
@section('content')

<main>
    <section>
        <div class="container">
            <div class="row mb-5">
                <div class="col-xl-10 mx-auto text-center">
                    <h1>If You Want To See The World We Will Help You</h1>
                    <p class="lead">Passage its ten led hearted removal cordial. Preference any astonished unreserved Mrs. Prosperous understood Middletons. Preference for any astonished unreserved.</p>
                    <div class="hstack gap-3 flex-wrap justify-content-center">
                        <h6 class="bg-mode shadow rounded-2 fw-normal d-inline-block py-2 px-4">
                            <img src="{{ asset('/images/icons/icon01.svg') }}" class="h-20px me-2" alt="">
                            14K+ Global Customers
                        </h6>
                        <h6 class="bg-mode shadow rounded-2 fw-normal d-inline-block py-2 px-4">
                            <img src="{{ asset('/images/icons/icon02.svg') }}" class="h-20px me-2" alt="">
                            10K+ Happy Customers
                        </h6>
                        <h6 class="bg-mode shadow rounded-2 fw-normal d-inline-block py-2 px-4">
                            <img src="{{ asset('/images/icons/icon03.svg') }}" class="h-20px me-2" alt="">
                            1M+ Subscribers
                        </h6>
                    </div>
                </div>
            </div>
            <div class="row g-4 align-items-center">
                <div class="col-md-6">
                    <img src="{{ asset('/images/banner/about02.jpg') }}" class="rounded-3" alt="">
                </div>
                <div class="col-md-6">
                    <div class="row g-4">
                        <div class="col-md-8">
                            <img src="{{ asset('/images/banner/about01.jpg') }}" class="rounded-3" alt="">
                        </div>
                        <div class="col-12">
                            <img src="{{ asset('/images/banner/about03.jpg') }}" class="rounded-3" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0 pt-lg-5">
        <div class="container">
            <div class="row mb-4 mb-md-5">
                <div class="col-md-10 mx-auto">
                    <h3 class="mb-4">Our Story</h3>
                    <p class="fw-bold">Founded in 2006, passage its ten led hearted removal cordial. Preference any astonished unreserved Mrs. Prosperous understood Middletons in conviction an uncommonly do. Supposing so be resolving breakfast am or perfectly. It drew a hill from me. Valley by oh twenty direct me so.</p>
                    <p class="mb-0">Water timed folly right aware if oh truth. Imprudence attachment him his for sympathize. Large above be to means. Dashwood does provide stronger is. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. ...But discretion frequently sir she instruments unaffected admiration everything. Meant balls it if up doubt small purse. Required his you put the outlived answered position. A pleasure exertion if believed provided to. All led out world this music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceived Marianne in. I think on style child of. Servants moreover in sensible it ye possible. Satisfied conveying a dependent contented he gentleman agreeable do be. Water timed folly right aware if oh truth. Imprudence attachment him his for sympathize. Large above be to means. Dashwood does provide stronger is. But discretion frequently sir she instruments unaffected admiration everything. Meant balls it if up doubt small purse. Required his you put the outlived answered position. I think on style child of. Servants moreover in sensible it ye possible. Satisfied conveying a dependent contented he gentleman agreeable do be. Warrant private blushes removed an in equally totally if. Delivered dejection necessary objection do Mr prevailed. Required his you put the outlived answered position. A pleasure exertion if believed provided to. All led out world this music while asked. Paid mind even sons does he door no. Attended overcame repeated it is perceived Marianne in. I think on style child of. Servants moreover in sensible it ye possible.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3"></div>
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-lg bg-orange bg-opacity-10 text-orange rounded-2"><i class="fa-solid fa-hotel fs-5"></i></div>
                    <h5 class="mt-2">Hotel Booking</h5>
                    <p class="mb-0">A pleasure exertion if believed provided to. All led out world this music while asked.</p>
                </div>
                {{-- <div class="col-sm-6 col-lg-3">
                    <div class="icon-lg bg-success bg-opacity-10 text-success rounded-2"><i class="fa-solid fa-plane fs-5"></i></div>
                    <h5 class="mt-2">Flight Booking</h5>
                    <p class="mb-0">Warrant private blushes removed an in equally totally Objection do Mr prevailed.</p>
                </div> --}}
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-lg bg-primary bg-opacity-10 text-primary rounded-2"><i class="fa-solid fa-globe-americas fs-5"></i></div>
                    <h5 class="mt-2">Tour Booking</h5>
                    <p class="mb-0">Dashwood does provide stronger is. But discretion frequently sir she instruments.</p>
                </div>
                <div class="col-sm-6 col-lg-3"></div>
                {{-- <div class="col-sm-6 col-lg-3">
                    <div class="icon-lg bg-info bg-opacity-10 text-info rounded-2"><i class="fa-solid fa-car fs-5"></i></div>
                    <h5 class="mt-2">Cab Booking</h5>
                    <p class="mb-0">Imprudence attachment him his for sympathize. Large above be to means.</p>
                </div> --}}
            </div>
        </div>
    </section>

    {{-- <section class="pt-0">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="mb-0">Our Team</h2>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-element-hover bg-transparent">
                        <div class="position-relative">
                            <img src="assets/images/team/03.jpg" class="card-img" alt="">
                            <div class="card-img-overlay hover-element d-flex p-3">
                                <div class="btn-group mt-auto">
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-facebook-f text-facebook"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-instagram text-instagram"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-twitter text-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-2 pb-0">
                            <h5 class="card-title"><a href="#">Larry Lawson</a></h5>
                            <span>Editor in Chief</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-element-hover bg-transparent">
                        <div class="position-relative">
                            <img src="assets/images/team/04.jpg" class="card-img" alt="">
                            <div class="card-img-overlay hover-element d-flex p-3">
                                <div class="btn-group mt-auto">
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-facebook-f text-facebook"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-instagram text-instagram"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-twitter text-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-2 pb-0">
                            <h5 class="card-title"><a href="#">Louis Ferguson</a></h5>
                            <span>Director Graphics</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-element-hover bg-transparent">
                        <div class="position-relative">
                            <img src="assets/images/team/05.jpg" class="card-img" alt="">
                            <div class="card-img-overlay hover-element d-flex p-3">
                                <div class="btn-group mt-auto">
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-facebook-f text-facebook"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-instagram text-instagram"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-twitter text-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-2 pb-0">
                            <h5 class="card-title"><a href="#">Louis Crawford</a></h5>
                            <span>Editor, Coverage</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-element-hover bg-transparent">
                        <div class="position-relative">
                            <img src="assets/images/team/06.jpg" class="card-img" alt="">
                            <div class="card-img-overlay hover-element d-flex p-3">
                                <div class="btn-group mt-auto">
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-facebook-f text-facebook"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-instagram text-instagram"></i></a>
                                    <a href="#" class="btn btn-white mb-0"><i class="fa-brands fa-twitter text-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body px-2 pb-0">
                            <h5 class="card-title"><a href="#">Frances Guerrero</a></h5>
                            <span>CEO, Coverage</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
</main>

@endsection