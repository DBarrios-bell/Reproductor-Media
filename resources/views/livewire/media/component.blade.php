<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading col-lg-11">
                <h4 class="card-title" style="text-align: center; color:azure ">
                    <b>{{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills" style="text-align: end">
                    <a href="javascript:void(0)" class="tabmenu" data-toggle="modal" data-target="#theModal"
                        style="text-decoration: none">Agregar</a>
                </ul>
            </div>
            {{-- @include('common.searchbox') --}}
            {{-- <div class="widget-content col-lg-11">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1" id="myTable">
                        <thead class="text-white"> --}}
            <table class="container">

                <thead>
                    <tr>
                        <th>
                            <h1>ID</h1>
                        </th>
                        <th>
                            <h1>TITULO</h1>
                        </th>
                        <th>
                            <h1>DESCRIPCION</h1>
                        </th>
                        <th>
                            <h1>OPCIONES</h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($videos as $v)
                        <tr>
                            <td>
                                <h6>{{ $v->id }}</h6>
                            </td>
                            <td>
                                <h6>{{ $v->titulo }}</h6>
                            </td>
                            <td>
                                <h6>{{ $v->descripcion }}</h6>
                            </td>

                            <td class="text-center">
                                <a href="javascript:void(0)" wire:click="Edit({{ $v->id }})"
                                    class="btn btn-dark mtmobile" title="Edit">
                                    Edit
                                </a>
                                {{-- <a href="javascript:void(0)" onclick="Confirm('{{ $v->id }}')"
                                    class="btn btn-dark mtmobile" title="Delete">
                                    Delete
                                </a> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">
                                <h1>No existen videos </h1>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $vide->links() }} --}}
        </div>
    </div>
    @include('livewire.media.form')
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        window.livewire.on('modal-added', msg => {
            $('#theModal').modal('hide');
            noty(msg);
        });
        window.livewire.on('modal-updated', msg => {
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
        window.livewire.on('media-specialty', Msg => {
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
            if (result.value) {
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
    }
</script>
