<input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                {{config('app.name')}}
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
        </div>

        <div id="navbar" class="nav-links">

            @switch(Auth::user()->specialty_id)
                @case(1)
                    <a href="{{route('enfermeria')}}" class="menu-toggle">Enfermería</a>
                    @break
                @case(2)
                    <a href="#" target="_blank">Fonoaudilogia</a>
                    @break
                @case(3)
                    <a href="#" target="_blank">Medicina</a>
                    @break
                @case(4)
                    <a href="#" target="_blank">Psicologia</a>
                    @break
                @default
                    <h1>joder</h1>
            @endswitch
            {{-- <a href="" target="_blank">Psicologia</a> --}}
        </div>
