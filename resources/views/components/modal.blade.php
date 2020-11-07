<div class="modal fade" id="{{ $modalId }}" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
                @isset($modalTitle)
                    {{ $modalTitle }}
                @endisset
            </h5>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            {{ $slot }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            @isset($modalFooter)
                {{ $modalFooter }}
            @endisset
        </div>
      </div>
    </div>
</div>
