<form action="/test2" method="post">
    <label for="video" class="col-form-label p-2">{{ __('Video') }}</label>
    <select wire:model.lazy='video' class="form-control @error('video') is-invalid @enderror" required autofocus>
        <option value="">Elegir</option>
        @foreach ($videos as $v)
            <option value="{{ $v->id }}">{{ $v->titulo }}</option>
        @endforeach
    </select>
    @error('video')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <br>
    <label for="specialty_id" class="col-form-label p-2">{{ __('Especialidad') }}</label>
    <select wire:model.lazy='especialidad' class="form-control @error('especialidad') is-invalid @enderror" required
        autofocus>
        <option value="">Elegir</option>
        @foreach ($specialties as $s)
            <option value="{{ $s->id }}">{{ $s->nombre }}</option>
        @endforeach
    </select>
    @error('especialidad')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <br><br>
    <button type="button" wire:click.prevent="Store()" class="btn btn-lg btn-outline-success">Relacionar</button>
</form>
