<table class="table table-dark table-hover">
    <thead>
        <tr class="text-center">
            <th scope="col">#</th>
            <th scope="col">ID Video</th>
            <th scope="col">Video</th>
            <th scope="col">ID Especialidad</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($videoSpecialties as $videoSpecialty)
            <tr class="text-center">
                <th scope="row">{{ $videoSpecialty->id }}</th>
                <td>{{ $videoSpecialty->videoid }}</td>
                <td>{{ $videoSpecialty->video }}</td>
                <td>{{ $videoSpecialty->especialidadid }}</td>
                <td>{{ $videoSpecialty->especialidad }}</td>
                <td>
                    <a href="javascript:void(0)" onclick="Confirm('{{ $videoSpecialty->id }}')" class=""
                        title="Delete">
                        <img src="{{ asset('assets/img/delete16px.png') }}" class="" alt="ELIMINAR">
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $videoSpecialties->links() }}

<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('added', msg => {
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
    });

    function Confirm(id) {
        Swal.fire({
            title: 'CONFIRMAR',
            text: 'CONFIRMAS ELIMINAR EL REGISTRO?',
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#2C272E',
            confirmButtonColor: '#3b3f5c',
            confirmButtonText: 'Aceptar',
        }).then(function(result) {
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
