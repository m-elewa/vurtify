<div class="modal app-modal fade" id="{{ $modalId }}" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fas fa-times"></i></span>
            </button>

            <div class="modal-body text-center pt-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            @isset($modalTitle)
                                <h4 class="portfolio-modal-title text-secondary text-uppercase mb-0"
                                    id="portfolioModal6Label">
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
                @isset($modalFooter)
                    {{ $modalFooter }}
                @endisset
            </div>
        </div>
    </div>
</div>
