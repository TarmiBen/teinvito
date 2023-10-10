
$(document).ready(function(){

    window.addEventListener('swal:modal', event => {
        swal({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
        });
    });

    window.addEventListener('swal:confirm', event => {
        swal.fire({
            title: event.detail.message,
            text: event.detail.text,
            icon: event.detail.type,
            buttons: true,
            showCancelButton: true,
            confirmButtonText: 'Sí',
        })
            .then((result) => {
                if (result.isConfirmed) {
                    livewire.emit('destroy')
                }
            });
    });

    Livewire.on('alert', param => {
        swal.fire(param);
    });

});
