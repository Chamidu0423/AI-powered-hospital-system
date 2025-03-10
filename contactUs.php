<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Pulse Hospital</title>
    <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/Contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="js/smooth-scroll.js"></script>
    <link rel="icon" href="assets/img/favicon.ico" style="border-radius: 50px;">
    <style>
        .byVismeButton--PYBh3EN {
            display: none !important;
        }

        .custom-top-bar {
            background-color: #f8f9fa;
            font-family: "Poppins", sans-serif;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 1050;
        }

        .top-bar-nav {
            display: flex;
            justify-content: flex-end;
            list-style: none;
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        .top-bar-item {
            margin-left: 20px;
            margin-right: 20px;
            font-family: "Poppins", sans-serif;
        }

        .top-bar-link {
            color: #000000;
            text-decoration: none;
            font-family: "Poppins", sans-serif;
        }

        .top-bar-link:hover {
            color: #0049be;
            text-decoration: none;
        }

        .top-bar-link:active {
            color: #003976;
            text-decoration: none;
        }

        .custom-navbar {
            background-color: #f8f9fa;
            margin-top: 40px;
            font-family: "Poppins", sans-serif;
        }

        .custom-navbar .navbar-brand img {
            height: 40px;
            margin: 10%;
        }

        .custom-navbar .navbar-nav .nav-link {
            color: #ffffff;
            transition: color 0.3s, border-bottom 0.3s;
            border-bottom: 2px solid transparent;
        }

        .custom-navbar .navbar-nav .nav-link:hover {
            color: #007bff;
            border-bottom: 2px solid #007bff;
        }

        .custom-navbar .navbar-nav .nav-link:active {
            color: #0070e8;
            border-bottom: 2px solid #0071eb;
            transition-duration: 1s;
        }

        .custom-navbar .navbar-nav .nav-item {
            margin-right: 20px;
        }

        .custom-navbar .navbar-nav .dropdown-menu {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .custom-navbar .navbar-nav .dropdown-menu .dropdown-item {
            color: #000000;
            padding: 10px 20px;
            transition: background-color 0.3s, color 0.3s;
        }

        .custom-navbar .navbar-nav .dropdown-menu .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .custom-navbar .navbar-nav .dropdown-menu .dropdown-item:active {
            background-color: #f8f9fa;
            color: #0072ec;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light custom-navbar fixed-top">
        <a class="navbar-brand" href="index.php"><img src="./assets/img/logoWithSlogan.png" alt="Logo" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto" style="color: black">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color: black">Home <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: black">Why choose Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php" style="color: black">Our Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="healthTips.php" style="color: black">Health Tips</a>
                </li>
                <li class="nav-item dropdown dropdown-hover">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black">
                        News
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="color: black">
                        <a class="dropdown-item" href="GlobalHealthNews.php">Global Health News</a>
                        <a class="dropdown-item" href="OurUpdates.php">Our Updates</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="EmergencyService.php" target="_blank" style="color: black">Emergency
                        Ambulance
                        Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactUs.php" target="_blank" style="color: black">Contact us</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="contact-form">
        <div class="visme_d" data-title="Untitled Project" data-url="ojm306ye-untitled-project" data-domain="forms"
            data-full-page="false" data-min-height="500px" data-form-id="82087"></div>
        <script src="https://static-bundles.visme.co/forms/vismeforms-embed.js"></script>
    </div>

    <script src="bootstrap/dist/js/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const targetNode = document.querySelector('.contact-form');
            const config = { childList: true, subtree: true };

            const callback = function (mutationsList, observer) {
                for (const mutation of mutationsList) {
                    if (mutation.type === 'childList') {
                        const vismeButton = document.querySelector('.byVismeButton--PYBh3EN');
                        if (vismeButton) {
                            vismeButton.style.display = 'none';
                            observer.disconnect();
                        }
                    }
                }
            };

            const observer = new MutationObserver(callback);
            observer.observe(targetNode, config);

            setTimeout(() => {
                const vismeButton = document.querySelector('.byVismeButton--PYBh3EN');
                if (vismeButton) {
                    vismeButton.style.display = 'none';
                }
            }, 3000);
        });
    </script>
</body>

</html>