<div class="modal app-modal fade" id="{{ $modalId }}" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">

        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fas fa-times"></i></span>
        </button>

        {{-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
                @isset($modalTitle)
                    {{ $modalTitle }}
                @endisset
            </h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body text-center pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @isset($modalTitle)
                        <h4 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal6Label">
                    {{ $modalTitle }}
                        </h4>
                        @endisset

                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>

            {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer pb-5 d-flex justify-content-center">
          {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            @isset($modalFooter)
                {{ $modalFooter }}
            @endisset
            {{-- <button class="btn btn-secondary text-white" data-dismiss="modal">
                <i class="fas fa-times fa-fw"></i>
                Close Window
            </button> --}}
        </div>
      </div>
    </div>
</div>



{{-- <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-labelledby="portfolioModal6Label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>
            <div class="modal-body text-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <!-- Portfolio Modal - Title-->
                            <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0" id="portfolioModal6Label">Submarine</h2>
                            <!-- Icon Divider-->
                            <div class="divider-custom">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                <div class="divider-custom-line"></div>
                            </div>
                            <!-- Portfolio Modal - Image-->
                            <img class="img-fluid rounded mb-5" src="assets/img/portfolio/submarine.png" alt="" />
                            <!-- Portfolio Modal - Text-->
                            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia neque assumenda ipsam nihil, molestias magnam, recusandae quos quis inventore quisquam velit asperiores, vitae? Reprehenderit soluta, eos quod consequuntur itaque. Nam.</p>
                            <button class="btn btn-primary" data-dismiss="modal">
                                <i class="fas fa-times fa-fw"></i>
                                Close Window
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
