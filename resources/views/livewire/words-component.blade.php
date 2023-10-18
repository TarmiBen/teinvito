<div>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="text-dark text-center p-0 p-lg-5 my-4">
                @if($isEditing)
                  <span class="fw-bold text-primary">
                        <textarea name="" id="" cols="30" rows="10" wire:model="content"></textarea>
                  </span>
                @else
                    <span class="fw-bold text-primary">
                        {{ $content }}
                    </span>
                @endif
            </div>
            <div class="text-dark text-center p-0 p-lg-5 my-4">
              @if($isEditing)
                <span class="fw-bold text-primary">
                    <input wire:model="text" type="text" name="" id="">
                </span>
              @else
                  <span class="fw-bold text-primary">
                      {{ $text }}
                  </span>
              @endif
            </div>
        </div>
    </div>
</div>
<script>
  var quill = new Quill('#editoR', {
  modules: {
    toolbar: [
      [{ header: [1, 2, false] }],
      ['bold', 'italic', 'underline'],
      ['code-block']
    ]
  },
  theme: 'snow'  // or 'bubble'
});
</script>
