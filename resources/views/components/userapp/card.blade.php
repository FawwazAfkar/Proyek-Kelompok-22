@props(['title','description'])

<div class="card text-center p-10">
    <div class="card-body">
        {{$slot}}
      <h5 class="card-title">{{ $title }}</h5>
      <p class="card-text">{{ $description }}</p>
    </div>
</div>
