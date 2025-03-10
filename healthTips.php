<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Tips - Virtual Pulse Hospital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            font-family: "Nunito", sans-serif;
            background-color: #f8f9fa;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color:rgb(255, 255, 255);
            text-decoration: none;
            margin: 1rem;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
        }

        .back-link:hover {
            color:rgb(212, 212, 212);
            text-decoration: none;
        }

        .health-tips-header {
            background: linear-gradient(135deg, #0061f2 0%, #00c6f9 100%);
            color: white;
            padding: 4rem 0;
            margin-bottom: 2rem;
            text-align: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -0.75rem;
        }

        .col-md-6.col-lg-4 {
            padding: 0.75rem;
            width: 33.333%;
        }

        .tip-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .tip-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        }

        .tip-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #0061f2;
        }

        .tip-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .tip-title {
            color: #1a237e;
            font-weight: 600;
            display: inline-block;
            vertical-align: middle;
        }

        .tip-content {
            color: #6c757d;
            line-height: 1.6;
        }

        .category-badge {
            background: linear-gradient(135deg, #1ca4f2 0%, #0b34e9 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            display: inline-block;
            width: auto;
            text-align: center;
            vertical-align: middle;
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: linear-gradient(135deg, #0061f2 0%, #00c6f9 100%);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .back-to-top:hover {
            transform: translateY(-3px);
            color: white;
        }

        .search-box {
            background: white;
            padding: 1rem;
            border-radius: 30px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .search-input {
            border: none;
            border-radius: 30px;
            padding: 0.5rem 1rem;
            width: 100%;
            background: white;
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 97, 242, 0.2);
        }

        .tip-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .tip-header .tip-icon {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <a href="index.php" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Back to Home
    </a>

    <div class="health-tips-header">
        <div class="container">
            <h1 class="display-4 wow animate__animated animate__fadeInDown">Health Tips & Wellness Guide</h1>
            <p class="lead wow animate__animated animate__fadeInUp">Expert advice for a healthier lifestyle</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="search-box wow animate__animated animate__fadeIn">
            <input type="text" class="search-input" placeholder="Search health tips...">
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-apple-alt tip-icon"></i>
                        <span class="category-badge">Nutrition</span>
                    </div>
                    <h3 class="tip-title">Balanced Diet Essentials</h3>
                    <p class="tip-content">Include a variety of fruits, vegetables, whole grains, lean proteins, and healthy fats in your daily diet. Aim for colorful plates to ensure diverse nutrient intake.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-running tip-icon"></i>
                        <span class="category-badge">Exercise</span>
                    </div>
                    <h3 class="tip-title">Daily Physical Activity</h3>
                    <p class="tip-content">Aim for at least 30 minutes of moderate exercise daily. Mix cardio with strength training for optimal health benefits and improved mood.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-brain tip-icon"></i>
                        <span class="category-badge">Mental Health</span>
                    </div>
                    <h3 class="tip-title">Stress Management</h3>
                    <p class="tip-content">Practice mindfulness and meditation. Take regular breaks, maintain a healthy sleep schedule, and don't hesitate to seek professional help when needed.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-moon tip-icon"></i>
                        <span class="category-badge">Sleep</span>
                    </div>
                    <h3 class="tip-title">Better Sleep Habits</h3>
                    <p class="tip-content">Maintain a consistent sleep schedule. Create a relaxing bedtime routine and aim for 7-9 hours of quality sleep each night.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-tint tip-icon"></i>
                        <span class="category-badge">Hydration</span>
                    </div>
                    <h3 class="tip-title">Stay Hydrated</h3>
                    <p class="tip-content">Drink at least 8 glasses of water daily. Monitor your urine color - pale yellow indicates good hydration.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-heart tip-icon"></i>
                        <span class="category-badge">Prevention</span>
                    </div>
                    <h3 class="tip-title">Regular Check-ups</h3>
                    <p class="tip-content">Schedule regular health screenings and vaccinations. Early detection is key to managing potential health issues.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-sun tip-icon"></i>
                        <span class="category-badge">Skin Care</span>
                    </div>
                    <h3 class="tip-title">Protect Your Skin</h3>
                    <p class="tip-content">Apply sunscreen with SPF 30 or higher daily, even on cloudy days. Stay hydrated and moisturize regularly to keep your skin healthy.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-leaf tip-icon"></i>
                        <span class="category-badge">Aging</span>
                    </div>
                    <h3 class="tip-title">Healthy Aging Practices</h3>
                    <p class="tip-content">Stay active, eat a nutrient-rich diet, and maintain social connections to promote physical and mental health as you age.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-briefcase tip-icon"></i>
                        <span class="category-badge">Workplace</span>
                    </div>
                    <h3 class="tip-title">Ergonomic Workstations</h3>
                    <p class="tip-content">Set up an ergonomic desk with proper chair height and monitor positioning. Take regular breaks to stretch and reduce eye strain.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-utensils tip-icon"></i>
                        <span class="category-badge">Gut Health</span>
                    </div>
                    <h3 class="tip-title">Support Your Gut</h3>
                    <p class="tip-content">Incorporate probiotics and prebiotic foods like yogurt, bananas, and whole grains to maintain a healthy gut microbiome.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-eye tip-icon"></i>
                        <span class="category-badge">Eye Health</span>
                    </div>
                    <h3 class="tip-title">Protect Your Eyes</h3>
                    <p class="tip-content">Follow the 20-20-20 rule: Every 20 minutes, look at something 20 feet away for 20 seconds. Wear blue-light-blocking glasses if you work on screens.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-shield-alt tip-icon"></i>
                        <span class="category-badge">Immunity</span>
                    </div>
                    <h3 class="tip-title">Boost Your Immunity</h3>
                    <p class="tip-content">Get enough sleep, eat a diet rich in vitamin C and zinc, and stay active to keep your immune system strong.</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 wow animate__animated animate__fadeInUp">
                <div class="tip-card">
                    <div class="tip-header">
                        <i class="fas fa-child tip-icon"></i>
                        <span class="category-badge">Posture</span>
                    </div>
                    <h3 class="tip-title">Maintain Good Posture</h3>
                    <p class="tip-content">Sit and stand upright with your shoulders back. Avoid slouching to prevent back pain and improve overall health.</p>
                </div>
            </div>
        </div>

        <a href="#" class="back-to-top">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
</body>
</html>