@props(['image','title','description','price'])

<div class="card h-100" style="width: 18rem;">
  <img src="{{ asset($image) }}" class="card-img-top" alt="{{$title}}" style="height: 10.125rem; object-fit: cover;">
  <div class="card-body d-flex flex-column">
    <h5 class="card-title">{{$title}}</h5>
    <p class="card-text">{{$description}}</p>
    <p class="card-text mt-auto">{{ 'Rp ' . number_format($price, 0, ',', '.') . ' /hari' }}</p>
    {{$slot}}
  </div>
</div>
