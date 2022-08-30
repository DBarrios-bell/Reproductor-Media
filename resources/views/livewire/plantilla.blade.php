<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="card-title">
                    <b> {{ $componentName }} | {{ $pageTitle }}</b>
                </h4>
                <ul class="tabs tab-pills">
                    {{-- @can('1.1 Crear Categoria') --}}
                    <li>
                        <a href="javascript:void(0)" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal"
                            style="text-decoration: none">Agregar</a>
                    </li>
                    {{-- @endcan --}}
                </ul>
            </div>
            @include('common.searchbox')
            <div class="widget-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1" id="myTable">
                        <thead class="text-white">
                            <tr>
                                <th class="table-th text-white">ID</th>
                                <th class="table-th text-white text-center">ESPECIALIDAD</th>
                                <th class="table-th text-white text-center">DESCRIPCION</th>
                                <th class="table-th text-white text-center">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($specialties as $specialty)
                            <tr>
                                <td>
                                    <h6>{{ $specialty->name }}</h6>
                                </td>
                                <td class="text-center">
                                    <span>
                                        <img src="{{ asset('storage/categories/' . $specialty->imagen) }}"
                                            alt="Sin Imagen" height="30" width="40" class="rounded">
                                    </span>
                                </td>
                                <td class="text-center">
                                    @can('1.2 Editar Categoria')
                                    <a href="javascript:void(0)" wire:click="Edit({{ $specialty->id }})"
                                        class="btn btn-dark mtmobile" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('1.3 Eliminar Categoria')
                                    <a href="javascript:void(0)" onclick="Confirm('{{$specialty->id}}')"
                                        class="btn btn-dark " title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $specialties->links() }}
                </div>
            </div>
        </div>
    </div>
    @include('livewire.specialty.form')
</div>