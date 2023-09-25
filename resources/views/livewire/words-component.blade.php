<div>
    <div class="container">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div id='editor'>
                
            </div>
            <div class="text-dark text-center p-0 p-lg-5 my-4">
                <span class="fw-bold text-primary">
                    <input wire:model="texto" type="text" name="" id="">
                </span>
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
