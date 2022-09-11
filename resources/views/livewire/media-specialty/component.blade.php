<div class="container col-lg-12">
    <div class="row">
        <div class="col-sm-3 col-md-4 border-end text-center" style="">
            <span>Relacionar Videos con Especialidades</span>
            <div class="container p-5">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                    @endif
                @if ((session('danger')))
                    <h6 class="alert alert-danger">{{ session('danger') }}</h6>
                @endif
                @include('livewire.media-specialty.form')
            </div>
        </div>
        <div class="col-sm-7 offset-sm-4 col-md-8 offset-md-0 text-center border-start">
            <span>Listar Videos Relacionados</span>
            <div class="container p-4">
                @include('livewire.media-specialty.table')
            </div>
        </div>
    </div>
</div>

