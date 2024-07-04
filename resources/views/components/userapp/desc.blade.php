@props(['nama', 'deskripsi', 'harga'])

<div class="car-details">
    <h5 class="font-semibold text-lg mb-3">{{ $nama }}</h5>
    <div class="mb-3">
        <strong>Harga Sewa:</strong> Rp <span id="formattedHarga">{{ number_format($harga, 0, ',', '.') }},00</span>
        /hari
    </div>

    <p id="deskripsiText">{{ $deskripsi }}</p>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const deskripsiElements = document.querySelectorAll('#deskripsiText');

    deskripsiElements.forEach(function (deskripsiElement) {
        const deskripsi = deskripsiElement.textContent.trim();
        const carDetails = deskripsiElement.closest('.car-details');

        // Check for existing lists and remove them to prevent stacking
        const existingSpecsHeader = carDetails.querySelector('h6.specs-header');
        const existingFeaturesHeader = carDetails.querySelector('h6.features-header');
        const existingSpecsList = carDetails.querySelector('ul.specs-list');
        const existingFeaturesList = carDetails.querySelector('ul.features-list');

        if (existingSpecsHeader) existingSpecsHeader.remove();
        if (existingFeaturesHeader) existingFeaturesHeader.remove();
        if (existingSpecsList) existingSpecsList.remove();
        if (existingFeaturesList) existingFeaturesList.remove();

        // Check for specifications and features
        if (deskripsi.includes('Spesifikasi:') || deskripsi.includes('Fitur:')) {
            const specsList = document.createElement('ul');
            specsList.classList.add('list-unstyled', 'ms-3', 'specs-list');

            const featuresList = document.createElement('ul');
            featuresList.classList.add('list-unstyled', 'ms-3', 'features-list');

            // Extract specifications and features
            let specs = [];
            let features = [];

            if (deskripsi.includes('Spesifikasi:')) {
                const specsStart = deskripsi.indexOf('Spesifikasi:') + 'Spesifikasi:'.length;
                const specsEnd = deskripsi.includes('Fitur:') ? deskripsi.indexOf('Fitur:') : deskripsi.length;
                specs = deskripsi.substring(specsStart, specsEnd).split(',');
            }

            if (deskripsi.includes('Fitur:')) {
                const featuresStart = deskripsi.indexOf('Fitur:') + 'Fitur:'.length;
                features = deskripsi.substring(featuresStart).split(',');
            }

            // Function to capitalize the first letter of each word
            function capitalizeFirstLetter(string) {
                return string.replace(/\b\w/g, function (char) {
                    return char.toUpperCase();
                });
            }

            // Populate specifications list
            if (specs.length > 0) {
                specs.forEach(spec => {
                    const specItem = document.createElement('li');
                    specItem.textContent = `- ${capitalizeFirstLetter(spec.trim().replace(/\.$/, ''))}`; // Add dash and capitalize, remove period
                    specsList.appendChild(specItem);
                });

                // Append specifications list
                const specsHeader = document.createElement('h6');
                specsHeader.textContent = 'Spesifikasi:';
                specsHeader.classList.add('mt-4', 'mb-2', 'specs-header'); // Adjust margin as needed
                carDetails.appendChild(specsHeader);
                carDetails.appendChild(specsList);
            }

            // Populate features list
            if (features.length > 0) {
                features.forEach(feature => {
                    const featureItem = document.createElement('li');
                    featureItem.textContent = `- ${capitalizeFirstLetter(feature.trim().replace(/\.$/, ''))}`; // Add dash and capitalize, remove period
                    featuresList.appendChild(featureItem);
                });

                // Append features list
                const featuresHeader = document.createElement('h6');
                featuresHeader.textContent = 'Fitur:';
                featuresHeader.classList.add('mt-4', 'mb-2', 'features-header'); // Adjust margin as needed
                carDetails.appendChild(featuresHeader);
                carDetails.appendChild(featuresList);
            }

            // Hide original description paragraph
            deskripsiElement.style.display = 'none';
        }
    });
});

</script>
