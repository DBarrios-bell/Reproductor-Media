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
                    @foreach ($specialties as $specialty)
                        <tr>
                            <td>
                                <h6>{{ $specialty->id }}</h6>
                            </td>
                            <td>
                                <h6>{{ $specialty->nombre }}</h6>
                            </td>
                            <td>
                                <h6>{{ $specialty->descripcion }}</h6>
                            </td>
                            {{-- <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/categories/' . $specialty->imagen) }}"
                                            alt="Sin Imagen" height="30" width="40" class="rounded">
                                    </span>
                                </td> --}}
                            <td class="text-center">
                                @can('1.2 Editar Categoria')
                                    <a href="javascript:void(0)" wire:click="Edit({{ $specialty->id }})"
                                        class="btn btn-dark mtmobile" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('1.3 Eliminar Categoria')
                                    <a href="javascript:void(0)" onclick="Confirm('{{ $specialty->id }}')"
                                        class="btn btn-dark " title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $specialties->links() }} --}}
        </div>
    </div>
    @include('livewire.specialty.form')
</div>


