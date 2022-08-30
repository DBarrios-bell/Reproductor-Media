@include('layouts.common.modalHead')
<div class="row">
    <div class="col-sm-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit"></span>
                </span>
            </div>
            <input type="text" wire:model.lazy="titulo" class="form-control" placeholder="Titulo" maxlength="255">
        </div>
        @error('titulo')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    {{-- <span class="fas fa-edit"></span> --}}
                </span>
            </div>

            <input class="form-upload-file col-md-12 form-control text-md-left" type="file" accept="video/mp4" wire:model.lazy="media">

        </div>
        <div wire:loading class="spinner-border text-info" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div wire:loading><span>Loading please wait..</span></div>
        @error('media')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
        <br>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <span class="fas fa-edit">
                    </span>
                </span>
            </div>
            <input type="text" wire:model.lazy="descripcion" class="form-control" placeholder="descripcion"
                maxlength="255">
        </div>
        @error('descripcion')
            <span class="text-danger er">{{ $message }}</span>
        @enderror
    </div>
</div>
@include('layouts.common.modalFooter')
