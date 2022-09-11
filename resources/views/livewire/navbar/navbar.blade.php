<input type="checkbox" id="nav-check">
<div class="nav-header">
    <div class="nav-title">
        {{ config('app.name') }}
    </div>
</div>
@foreach ($nav as $n)
<div class="nav-btn">
    <label for="nav-check">
        <span></span>
    </label>
</div>

<div id="navbar" class="nav-links">
    <a href="" class="menu-toggle">{{$n->nombre}}</a>
</div>
@endforeach
