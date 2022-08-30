

<script>
    document.addEventListener('DOMContentLoaded', function(){

        window.livewire.on('added', msg =>{
            $('#theModal').modal('hide');
            noty(msg);
        });
        window.livewire.on('updated', msg => {
            $('#theModal').modal('hide');
            noty(msg);
        });
        window.livewire.on('deleted', Msg => {
            noty(Msg, 2);
        });
        window.livewire.on('show-modal', msg => {
            $('#theModal').modal('show');
        });
        window.livewire.on('hide-modal', msg => {
            $('#theModal').modal('hide');
        });
        $('#theModal').on('hidden.bs.modal', function(e) {
            $('.er').css('display', 'none');
        });
        window.livewire.on('media-specialty', Msg =>{
            noty(Msg, 2)
        });
    });
    function Confirm(id) {
        swal({
            title: 'CONFIRMAR',
            text: 'CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#2C272E',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar',
        }).then(function(result) {
            if (result.value){
               window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>