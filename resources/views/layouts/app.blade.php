<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel= "stylesheet"
        href= "https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header>
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>

        @include('layouts.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    {{-- ppopper js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"
        integrity="sha384-oQWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deskripsi = document.getElementById('deskripsiText').textContent.trim();

            const specsList = document.createElement('ul');
            specsList.classList.add('list-unstyled', 'ms-3');

            const featuresList = document.createElement('ul');
            featuresList.classList.add('list-unstyled', 'ms-3');

            let specs = [];
            let features = [];

            const specsIndex = deskripsi.indexOf('Spesifikasi:');
            const featuresIndex = deskripsi.indexOf('Fitur:');

            if (specsIndex !== -1) {
                const specsStart = specsIndex + 'Spesifikasi:'.length;
                const specsEnd = featuresIndex !== -1 ? featuresIndex : deskripsi.length;
                specs = deskripsi.substring(specsStart, specsEnd).split(',');
            }

            if (featuresIndex !== -1) {
                const featuresStart = featuresIndex + 'Fitur:'.length;
                features = deskripsi.substring(featuresStart).split(',');
            }

            function capitalizeFirstLetter(string) {
                return string.replace(/\b\w/g, function(char) {
                    return char.toUpperCase();
                });
            }

            function populateList(list, items, headerText) {
                if (items.length > 0) {
                    items.forEach(item => {
                        const listItem = document.createElement('li');
                        listItem.textContent = `- ${capitalizeFirstLetter(item.trim().replace(/\.$/, ''))}`;
                        list.appendChild(listItem);
                    });

                    const header = document.createElement('h6');
                    header.textContent = headerText;
                    header.classList.add('mt-4', 'mb-2');
                    document.querySelector('.car-details').appendChild(header);
                    document.querySelector('.car-details').appendChild(list);
                }
            }

            populateList(specsList, specs, 'Spesifikasi:');
            populateList(featuresList, features, 'Fitur:');

            if (specs.length > 0 || features.length > 0) {
                document.getElementById('deskripsiText').style.display = 'none';
            }
        });
    </script>

</body>

</html>
