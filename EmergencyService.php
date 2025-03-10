<?php
// Initialize variables
$error = $success = '';
$phoneNumber = '';
$latitude = $longitude = '';

// Handle form submission success or error messages from Formspree
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = "Emergency service request submitted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Service</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-dark: #3a56d4;
            --secondary-color: #ff5a5f;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --gray-color: #6c757d;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: var(--dark-color);
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            width: 100%;
            height: 100vh;
            background: #ffffff;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: var(--primary-color);
            z-index: 10;
        }

        h1 {
            color: var(--dark-color);
            margin-bottom: 1.5rem;
            font-weight: 600;
            font-size: 2rem;
            position: relative;
            display: inline-block;
        }

        h1::after {
            content: "";
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark-color);
            text-align: left;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="hidden"] {
            width: 100%;
            padding: 0.8rem 1rem;
            margin-bottom: 1.2rem;
            border: 1px solid #e1e5eb;
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
            background-color: #f8f9fa;
            color: var(--dark-color);
            font-family: 'Poppins', sans-serif;
        }

        input[type="text"]:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
            background-color: #fff;
        }

        .slider-container {
            position: relative;
            width: 100%;
            height: 60px;
            background: #f1f3f5;
            border-radius: 30px;
            overflow: hidden;
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1.5rem;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .slider-container.active {
            background: var(--success-color);
        }

        .slider {
            position: absolute;
            top: 5px;
            left: 5px;
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 50%;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.1s ease;
            cursor: grab;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .slider::after {
            content: "→";
            font-size: 1.5rem;
            font-weight: bold;
        }

        .slider:active {
            cursor: grabbing;
            transform: scale(0.98);
        }

        .message {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: var(--gray-color);
        }

        .message.success {
            color: var(--success-color);
            font-weight: 500;
            padding: 0.8rem;
            background-color: rgba(46, 204, 113, 0.1);
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .message.error {
            color: var(--danger-color);
            font-weight: 500;
            padding: 0.8rem;
            background-color: rgba(231, 76, 60, 0.1);
            border-radius: 8px;
            margin-bottom: 1.5rem;
        }

        .location-button {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.95rem;
            font-weight: 500;
            transition: var(--transition);
            box-shadow: 0 4px 6px rgba(67, 97, 238, 0.15);
            font-family: 'Poppins', sans-serif;
        }

        .location-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(67, 97, 238, 0.2);
        }

        .location-button:active {
            transform: translateY(0);
        }

        .loading {
            display: none;
            margin-top: 1rem;
            color: var(--gray-color);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .loading::before {
            content: "";
            width: 18px;
            height: 18px;
            border: 2px solid rgba(67, 97, 238, 0.3);
            border-top: 2px solid var(--primary-color);
            border-radius: 50%;
            margin-right: 8px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .map-link {
            display: none;
            margin-top: 1rem;
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem;
            border: 1px solid var(--primary-color);
            border-radius: 8px;
            transition: var(--transition);
        }

        .map-link:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .manual-location {
            display: none;
            margin-top: 1.5rem;
            text-align: left;
            background-color: #f8f9fa;
            padding: 1.2rem;
            border-radius: 8px;
            border: 1px solid #e1e5eb;
        }

        .manual-location input {
            margin-bottom: 0.8rem;
        }

        .manual-location button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 1.2rem;
            cursor: pointer;
            font-weight: 500;
            transition: var(--transition);
            font-family: 'Poppins', sans-serif;
        }

        .manual-location button:hover {
            background-color: var(--primary-dark);
        }

        .location-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.8rem;
            margin-bottom: 1.2rem;
        }

        .toggle-manual {
            background: none;
            border: none;
            color: var(--primary-color);
            text-decoration: underline;
            cursor: pointer;
            font-size: 0.9rem;
            font-family: 'Poppins', sans-serif;
            transition: var(--transition);
        }

        .toggle-manual:hover {
            color: var(--primary-dark);
        }

        .location-status {
            margin-top: 0.8rem;
            font-size: 0.9rem;
            color: var(--gray-color);
            padding: 0.5rem;
            border-radius: 4px;
            background-color: #f8f9fa;
        }

        .location-accuracy {
            margin-top: 0.5rem;
            font-size: 0.8rem;
            color: var(--gray-color);
        }

        .form-group {
            margin-bottom: 1.5rem;
            text-align: left;
        }

        .slide-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: var(--gray-color);
            font-weight: 500;
            font-size: 0.9rem;
            pointer-events: none;
            white-space: nowrap;
        }

        .emergency-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .location-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1rem;
            border: 1px solid #e1e5eb;
        }

        .form-content {
            max-width: 600px;
            margin: 0 auto;
            width: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .container {
                padding: 1.5rem;
            }

            h1 {
                font-size: 1.8rem;
            }
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container wow animate__animated animate__fadeInUp">
        <div class="form-content wow animate__animated animate__fadeInUp">
            <h1>Emergency Service</h1>
            <?php if ($error): ?>
                <div class="message error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
            <?php if ($success): ?>
                <div class="message success"><?php echo htmlspecialchars($success); ?></div>
            <?php endif; ?>
            <form action="https://formspree.io/f/mrbzjqep" method="POST" id="emergencyForm">
                <div class="form-group">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="text" id="phoneNumber" name="phoneNumber" required>
                </div>

                <div class="form-group">
                    <label for="location">Location:</label>
                    <input type="text" id="locationDisplay" readonly>
                    <input type="hidden" id="latitude" name="latitude">
                    <input type="hidden" id="longitude" name="longitude">
                    <input type="hidden" id="locationUrl" name="locationUrl">
                    <input type="hidden" id="locationSource" name="locationSource" value="unknown">
                    <input type="hidden" id="locationAccuracy" name="locationAccuracy" value="">

                    <div class="location-options">
                        <button type="button" class="location-button" onclick="getLocation()">Get Precise
                            Location</button>
                        <button type="button" class="toggle-manual" onclick="toggleManualLocation()">Enter
                            Manually</button>
                    </div>

                    <div id="locationLoading" class="loading">Fetching your location...</div>

                    <div class="location-info">
                        <div id="locationStatus" class="location-status"></div>
                        <div id="locationAccuracyDisplay" class="location-accuracy"></div>
                        <a id="mapLink" class="map-link" target="_blank">View on Map</a>
                    </div>

                    <div id="manualLocation" class="manual-location">
                        <input type="text" id="manualAddress">
                        <input type="text" id="manualCity">
                        <button type="button" onclick="setManualLocation()">Set Location</button>
                    </div>
                </div>

                <div class="slider-container" id="sliderContainer">
                    <div class="slider" id="slider"></div>
                    <div class="slide-text">Slide to Submit</div>
                </div>
                <div class="message">Slide all the way to the right to submit your emergency request</div>
            </form>
        </div>
    </div>

    <script>
        const slider = document.getElementById('slider');
        const sliderContainer = document.getElementById('sliderContainer');
        const slideText = document.querySelector('.slide-text');
        const form = document.getElementById('emergencyForm');
        const locationLoading = document.getElementById('locationLoading');
        const locationStatus = document.getElementById('locationStatus');
        const locationAccuracyDisplay = document.getElementById('locationAccuracyDisplay');
        const mapLink = document.getElementById('mapLink');
        const manualLocation = document.getElementById('manualLocation');

        let isDragging = false;
        let startX, startLeft;
        let touchStartX;
        let watchId = null;
        let bestLocation = null;

        slider.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.clientX;
            startLeft = parseInt(window.getComputedStyle(slider).left);
            slider.style.cursor = 'grabbing';
            e.preventDefault();
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;

            const deltaX = e.clientX - startX;
            let newLeft = startLeft + deltaX;

            const containerWidth = sliderContainer.offsetWidth - slider.offsetWidth;
            newLeft = Math.max(5, Math.min(newLeft, containerWidth));

            slider.style.left = `${newLeft}px`;

            const progress = newLeft / containerWidth;
            slideText.style.opacity = 1 - progress;

            if (newLeft >= containerWidth - 10) {
                sliderContainer.classList.add('active');
                setTimeout(() => {
                    form.submit();
                }, 300);
            }
        });

        document.addEventListener('mouseup', () => {
            if (!isDragging) return;

            isDragging = false;
            slider.style.cursor = 'grab';

            const containerWidth = sliderContainer.offsetWidth - slider.offsetWidth;
            const currentLeft = parseInt(window.getComputedStyle(slider).left);
            if (currentLeft < containerWidth - 10) {
                slider.style.left = '5px';
                sliderContainer.classList.remove('active');
                slideText.style.opacity = 1;
            }
        });

        slider.addEventListener('touchstart', (e) => {
            isDragging = true;
            touchStartX = e.touches[0].clientX;
            startLeft = parseInt(window.getComputedStyle(slider).left);
        });

        document.addEventListener('touchmove', (e) => {
            if (!isDragging) return;

            const deltaX = e.touches[0].clientX - touchStartX;
            let newLeft = startLeft + deltaX;

            const containerWidth = sliderContainer.offsetWidth - slider.offsetWidth;
            newLeft = Math.max(5, Math.min(newLeft, containerWidth));

            slider.style.left = `${newLeft}px`;

            const progress = newLeft / containerWidth;
            slideText.style.opacity = 1 - progress;

            if (newLeft >= containerWidth - 10) {
                sliderContainer.classList.add('active');
                setTimeout(() => {
                    form.submit();
                }, 300);
            }
        });

        document.addEventListener('touchend', () => {
            if (!isDragging) return;

            isDragging = false;

            const containerWidth = sliderContainer.offsetWidth - slider.offsetWidth;
            const currentLeft = parseInt(window.getComputedStyle(slider).left);
            if (currentLeft < containerWidth - 10) {
                slider.style.left = '5px';
                sliderContainer.classList.remove('active');
                slideText.style.opacity = 1;
            }
        });

        function createMapUrl(latitude, longitude) {
            return `https://www.google.com/maps?q=${latitude},${longitude}`;
        }

        function toggleManualLocation() {
            if (manualLocation.style.display === 'block') {
                manualLocation.style.display = 'none';
            } else {
                manualLocation.style.display = 'block';
            }
        }

        function setManualLocation() {
            const address = document.getElementById('manualAddress').value;
            const city = document.getElementById('manualCity').value;

            if (!address) {
                alert("Please enter an address or landmark");
                return;
            }

            const fullAddress = `${address}, ${city}`;
            document.getElementById('locationDisplay').value = fullAddress;
            document.getElementById('locationSource').value = "manual";
            locationStatus.textContent = "Using manually entered location";

            const encodedAddress = encodeURIComponent(fullAddress);
            locationLoading.style.display = 'block';

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodedAddress}&limit=1`)
                .then(response => response.json())
                .then(data => {
                    locationLoading.style.display = 'none';

                    if (data && data.length > 0) {
                        const lat = parseFloat(data[0].lat);
                        const lon = parseFloat(data[0].lon);

                        document.getElementById('latitude').value = lat;
                        document.getElementById('longitude').value = lon;

                        const mapUrl = createMapUrl(lat, lon);
                        document.getElementById('locationUrl').value = mapUrl;

                        mapLink.href = mapUrl;
                        mapLink.style.display = 'inline-block';

                        document.getElementById('locationDisplay').value = `${fullAddress}`;
                        locationAccuracyDisplay.textContent = `Coordinates: ${lat.toFixed(6)}, ${lon.toFixed(6)}`;
                    } else {
                        alert("Could not find coordinates for this address. Please try a different address or be more specific.");
                    }
                })
                .catch(error => {
                    locationLoading.style.display = 'none';
                    console.error("Geocoding error:", error);
                    alert("Error finding location. Please try again with a different address.");
                });
        }

        function getIpBasedLocation() {
            locationStatus.textContent = "Attempting to get location from IP address (less accurate)...";
            locationLoading.style.display = 'block';

            fetch('https://ipapi.co/json/')
                .then(response => response.json())
                .then(data => {
                    locationLoading.style.display = 'none';

                    const latitude = data.latitude;
                    const longitude = data.longitude;
                    const city = data.city;
                    const region = data.region;
                    const country = data.country_name;

                    document.getElementById('locationDisplay').value = `${city}, ${region}, ${country}`;
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                    document.getElementById('locationSource').value = "ip";
                    document.getElementById('locationAccuracy').value = "low";

                    locationStatus.textContent = "Using approximate location based on IP address";
                    locationAccuracyDisplay.textContent = "Warning: This is a low accuracy location and may not be your actual position";

                    const mapUrl = createMapUrl(latitude, longitude);
                    document.getElementById('locationUrl').value = mapUrl;
                    mapLink.href = mapUrl;
                    mapLink.style.display = 'inline-block';

                    alert("Using approximate location based on your IP address. For emergency services, please verify your location on the map or enter it manually for better accuracy.");
                })
                .catch(error => {
                    locationLoading.style.display = 'none';
                    console.error("IP geolocation error:", error);
                    locationStatus.textContent = "Could not determine your location automatically";
                    alert("Could not determine your location. Please enter your location manually.");
                    toggleManualLocation();
                });
        }

        function updateLocationUI(position) {
            const latitude = position.coords.latitude;
            const longitude = position.coords.longitude;
            const accuracy = position.coords.accuracy;

            const mapUrl = createMapUrl(latitude, longitude);

            document.getElementById('locationDisplay').value = `Current Location (GPS)`;
            document.getElementById('latitude').value = latitude;
            document.getElementById('longitude').value = longitude;
            document.getElementById('locationUrl').value = mapUrl;
            document.getElementById('locationSource').value = "gps";
            document.getElementById('locationAccuracy').value = accuracy;

            locationStatus.textContent = "Using precise GPS location";
            locationAccuracyDisplay.textContent = `Accuracy: ±${Math.round(accuracy)} meters | Coordinates: ${latitude.toFixed(6)}, ${longitude.toFixed(6)}`;

            mapLink.href = mapUrl;
            mapLink.style.display = 'inline-block';

            if (!bestLocation || accuracy < bestLocation.coords.accuracy) {
                bestLocation = position;
            }
        }

        function getLocation() {
            if (watchId !== null) {
                navigator.geolocation.clearWatch(watchId);
                watchId = null;
            }

            bestLocation = null;

            if (navigator.geolocation) {
                locationLoading.style.display = 'block';
                mapLink.style.display = 'none';
                locationStatus.textContent = "Requesting precise GPS location...";
                locationAccuracyDisplay.textContent = "";

                const options = {
                    enableHighAccuracy: true,
                    timeout: 15000,
                    maximumAge: 0
                };

                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        updateLocationUI(position);

                        watchId = navigator.geolocation.watchPosition(
                            (updatedPosition) => {
                                updateLocationUI(updatedPosition);

                                if (updatedPosition.coords.accuracy < 20) {
                                    navigator.geolocation.clearWatch(watchId);
                                    watchId = null;
                                    locationLoading.style.display = 'none';
                                    locationStatus.textContent = "High accuracy location obtained";
                                }
                            },
                            (error) => {
                                console.warn("Watch position error:", error);
                                if (bestLocation) {
                                    navigator.geolocation.clearWatch(watchId);
                                    watchId = null;
                                    locationLoading.style.display = 'none';
                                }
                            },
                            options
                        );

                        setTimeout(() => {
                            if (watchId !== null) {
                                navigator.geolocation.clearWatch(watchId);
                                watchId = null;
                                locationLoading.style.display = 'none';

                                if (bestLocation) {
                                    locationStatus.textContent = "Using best available GPS location";
                                }
                            }
                        }, 30000);

                        locationLoading.style.display = 'none';
                    },
                    (error) => {
                        locationLoading.style.display = 'none';

                        console.error('Geolocation error:', error);

                        let errorMessage = "";
                        switch (error.code) {
                            case error.PERMISSION_DENIED:
                                errorMessage = "Location access was denied. Please enable location services in your browser settings or enter your location manually.";
                                break;
                            case error.POSITION_UNAVAILABLE:
                                errorMessage = "Location information is unavailable. Please try again or enter your location manually.";
                                break;
                            case error.TIMEOUT:
                                errorMessage = "The request to get your location timed out. Please try again or enter your location manually.";
                                break;
                            default:
                                errorMessage = "An unknown error occurred while trying to get your location. Please try again or enter your location manually.";
                                break;
                        }

                        locationStatus.textContent = "Could not access GPS location";
                        alert(errorMessage);

                        getIpBasedLocation();
                    },
                    options
                );
            } else {
                locationStatus.textContent = "Geolocation not supported by this browser";
                alert("Geolocation is not supported by this browser. Using IP-based location instead.");
                getIpBasedLocation();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (window.location.protocol !== 'https:' && window.location.hostname !== 'localhost' && window.location.hostname !== '127.0.0.1') {
                locationStatus.textContent = "Warning: Geolocation requires HTTPS for accurate results";
                locationAccuracyDisplay.textContent = "Your connection is not secure, which may affect location accuracy";
            }
        });
    </script>
</body>

</html>