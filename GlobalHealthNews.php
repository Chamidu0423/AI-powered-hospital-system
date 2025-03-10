<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Health News - Virtual Pulse Hospital</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/news.css">
</head>
<body>
    <a href="index.php" class="back-link">
        <i class="fas fa-arrow-left"></i>
        Back to Home
    </a>

    <div class="news-header">
        <div class="container">
            <h1 class="display-4 wow animate__animated animate__fadeInDown">Global Health News</h1>
            <p class="lead wow animate__animated animate__fadeInUp">Stay informed about worldwide healthcare developments</p>
        </div>
    </div>

    <div class="container mb-5">
        <div class="search-box wow animate__animated animate__fadeIn">
            <input type="text" class="search-input" placeholder="Search news...">
        </div>

        <div class="row">
            <div class="col-md-6 wow animate__animated animate__fadeInUp">
                <div class="news-card">
                    <span class="news-tag">WHO Update</span>
                    <div class="news-date">March 15, 2024</div>
                    <h3 class="news-title">WHO Announces New Global Health Initiative</h3>
                    <p class="news-content">The World Health Organization launches a comprehensive program to improve healthcare access in developing nations...</p>
                    <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="news-card">
                    <span class="news-tag">Research</span>
                    <div class="news-date">March 14, 2024</div>
                    <h3 class="news-title">Breakthrough in Cancer Treatment Research</h3>
                    <p class="news-content">Scientists discover a new approach to targeting cancer cells that shows promising results in early trials...</p>
                    <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 wow animate__animated animate__fadeInUp">
                <div class="news-card">
                    <span class="news-tag">Public Health</span>
                    <div class="news-date">March 13, 2024</div>
                    <h3 class="news-title">Global Vaccination Efforts Show Progress</h3>
                    <p class="news-content">International vaccination programs report significant achievements in reaching remote communities...</p>
                    <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>

            <div class="col-md-6 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s">
                <div class="news-card">
                    <span class="news-tag">Technology</span>
                    <div class="news-date">March 12, 2024</div>
                    <h3 class="news-title">AI in Healthcare: New Developments</h3>
                    <p class="news-content">Artificial Intelligence continues to revolutionize healthcare with new diagnostic tools...</p>
                    <a href="#" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script src="js/news-search.js"></script>
    <script>new WOW().init();</script>
</body>
</html>