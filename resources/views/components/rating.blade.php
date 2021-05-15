@props(['rate'])

@for ($i = 1; $i <= 5; $i++) @if ($i <=$rate) <i class="fas fa-star"></i>
    @else
    <i class="far fa-star"></i>
    @endif
    @endfor