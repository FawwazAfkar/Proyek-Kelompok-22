@props(['title', 'description'])

<div class="card text-center p-4 shadow-lg rounded-lg d-flex flex-column h-100">
    <div class="card-body flex-grow-1 d-flex flex-column">
        <div class="mb-3">
            {{$slot}}
        </div>
        <h5 class="card-title text-lg font-semibold text-gray-800">{{ $title }}</h5>
        <p class="card-text text-gray-600 mt-2">{{ $description }}</p>
    </div>
</div>
