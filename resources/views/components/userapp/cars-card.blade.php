@props(['image','title','description','price'])

<div class="card card-sm">
  <img src="{{$image}}" class="card-img-top" alt="{{$title}}">
  <div class="card-body">
    <h5 class="card-title">{{$title}}</h5>
    <p class="card-text">{{$description}}</p>
    <p class="card-text">{{$price}}</p>
    {{$slot}}
  </div>
</div>
