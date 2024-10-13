<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="about.css">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav>
            <x-navbar />
        </nav>
    </header>
    <main>
        <div class="about-us-hero border-bottom">
            <div class="hero-background">
                <img src="https://wallpapers.com/images/hd/travel-laptop-k9ptnpwieuhwy56q.jpg" alt="Background Image">
                <div class="overlay"></div>
                <div class="hero-description">
                    <h1 class=" text-center">Discover Our Journey</h1>
                    <p  class=" text-center">At Travelease, we specialize in curating personalized travel experiences that inspire adventure and foster unforgettable memories.</p>
                </div>
            </div>
        </div>
        <div class="about-us d-flex justify-content-center align-items-center">
            <div class="about-us-description w-50">
                <h1>About Us</h1>
                <p>At Travelease, we are passionate about crafting unforgettable travel experiences that inspire exploration and adventure. Our dedicated team is committed to understanding your unique travel desires, whether you dream of a serene beach retreat, an exhilarating mountain hike, or an immersive cultural journey. With a focus on personalized service and attention to detail, we ensure that every aspect of your trip is thoughtfully curated to exceed your expectations. Join us as we turn your travel dreams into reality, creating cherished memories that last a lifetime.</p>
            </div>
            <div class="about-us-image">
                <img src="https://img.freepik.com/premium-photo/front-view-female-traveler-taking-s_960396-862066.jpg" alt="">
            </div>
        </div>
        <div class="offerings text-light p-5 d-flex justify-content-center align-items-center flex-column">
            <h1 class="text-center mb-4">Why <span style="color: orange;">Choose</span> Us</h1>
            <p class="text-center w-50">At Travelease, we believe that every journey should be a memorable adventure. Our mission is to provide personalized travel services that cater to your unique desires and needs. Whether you're seeking a relaxing beach getaway, an exhilarating mountain expedition, or a cultural city exploration, we've got you covered!</p>
            <div class="offers d-flex justify-content-center align-items-center my-5">
                <div class="offer-card">
                    <i class="fas fa-plane fa-2x"></i>
                    <h3>Your Trusted Travel Partner</h3>
                    <p>We focus on your satisfaction by providing personalized services and dedicated support throughout your journey.</p>
                </div>
                <div class="offer-card">
                    <i class="fas fa-globe fa-2x"></i>
                    <h3>Experience and Expertise</h3>
                    <p>Our knowledgeable team is committed to crafting tailored itineraries that meet your unique travel preferences.</p>
                </div>
                <div class="offer-card">
                    <i class="fas fa-headset fa-2x"></i>
                    <h3>Unmatched Customer Service</h3>
                    <p>With 24/7 availability, we ensure you have peace of mind and support at every step of your travel experience.</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <x-footer />
    </footer>
</body>
</html>