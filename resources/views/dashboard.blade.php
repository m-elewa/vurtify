<x-app-layout>
        <section class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column pt-5">
                <!-- Masthead Avatar Image-->
                <img class="masthead-avatar my-3 animate__animated animate__pulse animate__delay-1s animate__slow animate__infinite"
                    src="{{ asset('images/market-launch-pana.svg') }}" alt="" />
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Start Developing</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0">Laravel - Fortify - Bootstrap - Vue</p>
            </div>
        </section>

        <!-- About Section-->
        <section class=" py-5" id="about">
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary">About</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                    <div class="col-lg-4 ms-auto"><p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Verum tamen cum de rebus grandioribus dicas, ipsae res verba rapiunt; Ex rebus enim timiditas, non ex vocabulis nascitur. Sed tempus est, si videtur.</p></div>
                    <div class="col-lg-4 me-auto"><p class="lead">Hebes acies est cuipiam oculorum, corpore alius senescit; Intrandum est igitur in rerum naturam et penitus quid ea postulet pervidendum; Duo Reges: constructio interrete!</p></div>
                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-secondary" href="https://github.com/m-elewa/vurtify">
                        <i class="fas fa-download me-2"></i>
                        Free Download!
                    </a>
                </div>
            </div>
        </section>

    <!-- Footer-->
    <section class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        12 Howard Lane
                        <br />
                        Starkville, MS 39759
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="https://twitter.com/_mahmoud_elewa_"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About</h4>
                    <p class="lead mb-0">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Haec quo modo
                        <a href="https://github.com/m-elewa/vurtify">Start Now</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
