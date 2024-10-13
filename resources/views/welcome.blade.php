<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TravelEase</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <header>
        <nav>
            <x-nav-bar />
        </nav>
    </header>
    <main>
        <section>
        <div class="hero d-flex justify-content-center align-items-center">
            <div class="hero-description mt-5">
                <h1 class="animate__animated animate__fadeIn">Discover Your Next <span style="color: #4caf50;">Adventure!</span></h1>
                <p class="animate__animated animate__fadeIn">Explore exciting travel packages tailored just for you.</p>
                <div class="search-bar d-flex justify-content-center align-items-center mt-5 animate__animated animate__bounceInUp">
                    <input type="text" class="form-control me-2" placeholder="Where do you want to go?" aria-label="Search">
                    <input type="date" class="form-control me-2" placeholder="Select Date" aria-label="Select Date">
                    <button class="btn btn-success" type="button">Search</button>
                </div>
            </div>  
        </div>
        <div class="why-book-section">
            <h1 class="text-center my-3 animate__animated animate__backInDown">Why choose us?</h1>
            <div class="features">
            <div class="feature animate__animated animate__bounceInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 10l-6.5 6.5a2 2 0 0 1-2.83 0l-5.17-5.17a2 2 0 0 1 0-2.83L14 3"></path>
                    <path d="M16 6 19 3"></path>
                </svg>
                <h3>Custom Packages</h3>
                <p>Build your ideal trip with flexible options for hotels, flights, and transport.</p>
            </div>

            <div class="feature animate__animated animate__bounceInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 1l3 5.26a1 1 0 0 0 .79.49l5.61.47a1 1 0 0 1 .55 1.72l-4.05 3.91a1 1 0 0 0-.29.88l.96 5.53a1 1 0 0 1-1.45 1.05L12 19.79l-4.96 2.61a1 1 0 0 1-1.45-1.05l.96-5.53a1 1 0 0 0-.29-.88L3.16 8.94a1 1 0 0 1 .55-1.72l5.61-.47a1 1 0 0 0 .79-.49L12 1z"></path>
                </svg>
                <h3>Best Prices</h3>
                <p>Enjoy competitive rates with no hidden fees.</p>
            </div>

            <!-- 24/7 Support -->
            <div class="feature animate__animated animate__bounceInLeft">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <h3>24/7 Support</h3>
                <p>We’re always here to help, anytime you need us.</p>
            </div>
            </div>
        </div>
        </section>
        <div class="divider"></div>
        <section>
        <div class="slider mt-5">
            <div class="list">
                <h1 class='py-3 heading-top text-center'>Top Destination</h1>
                <div class="item active">
                    <div class="content mt-4 animate__animated animate__fadeInLeft">
                        <h2>Paris, France</h2>
                        <p>The City of Light awaits you with its romantic streets, iconic landmarks, and world-class cuisine.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="content mt-4 animate__animated animate__fadeInLeft">
                        <h2>Bali, Indonesia</h2>
                        <p>Experience paradise with breathtaking beaches, lush rice terraces, and vibrant culture in Bali.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="content mt-4 animate__animated animate__fadeInLeft">
                        <h2>Tokyo, Japan</h2>
                        <p>A mesmerizing blend of ancient tradition and cutting-edge modernity awaits you in the heart of Japan.</p>
                    </div>
                </div>
            </div>

            <div class="arrows">
                <button class="btn btn-success" id="prev">&lt;</button>
                <button class="btn btn-success" id="next">&gt;</button>
            </div>

            <div class="thumbnail">
                <div class="item active">
                    <img src="{{ asset('images/paris.jpg') }}" alt="Paris" />
                </div>
                <div class="item">
                    <img src="{{ asset('images/bali.jpg') }}" alt="Bali" />
                </div>
                <div class="item">
                    <img src="{{ asset('images/tokyo.jpg') }}" alt="Tokyo" />
                </div>
            </div>
            <svg class='my-4' viewBox="0 0 1440 280">
                <path fill="#4caf50 " fillOpacity="1" d="M0,224L48,208C96,192,192,160,288,133.3C384,107,480,85,576,112C672,139,768,213,864,224C960,235,1056,181,1152,176C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
            <svg class="border-bottom" viewBox="0 0 1440 280">
                <path fill="#198754" fillOpacity="1" d="M0,224L48,208C96,192,192,160,288,133.3C384,107,480,85,576,112C672,139,768,213,864,224C960,235,1056,181,1152,176C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        </section>
        <section>
        <div class="reviews">
            <h2 class="text-white text-center mb-4">Customer Reviews</h2>
            <div class="container">
                @if ($reviews->isEmpty())
                    <div class="text-center text-white mb-4">
                        <p>No reviews yet. Be the first to leave a review!</p>
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#reviewModal">Leave a Review</button>
                    </div>
                @else
                    <div class="row">
                        @foreach ($reviews as $review)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $review->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $review->created_at->format('F j, Y') }}</h6>
                                        <p class="card-text">{{ $review->comment }}</p>
                                        <p class="card-text"><strong>Rating:</strong> {{ $review->rating }}/5</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mb-4">
                        <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#reviewModal">Leave a Review</button>
                    </div>
                @endif
            </div>
        </div>
        </section>

        <!-- Review Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reviewModalLabel">Leave a Review</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('reviews.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Your Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="comment" class="form-label">Your Review</label>
                                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="rating" class="form-label">Your Rating (1-5)</label>
                                    <select class="form-select" id="rating" name="rating" required>
                                        <option value="" disabled selected>Select your rating</option>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success">Submit Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <x-footer />
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        const items = document.querySelectorAll('.slider .list .item');
        const thumbnails = document.querySelectorAll('.thumbnail .item');
        let itemActive = 0;
        let slideInterval;

        const showSlide = (index) => {
            items[itemActive].classList.remove('active');
            thumbnails[itemActive].classList.remove('active');
            itemActive = index;
            items[itemActive].classList.add('active');
            thumbnails[itemActive].classList.add('active');
        };

        const nextSlide = () => {
            showSlide((itemActive + 1) % items.length);
        };

        const prevSlide = () => {
            showSlide((itemActive - 1 + items.length) % items.length);
        };

        const resetInterval = () => {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000);
        };

        document.getElementById('next').addEventListener('click', () => {
            nextSlide();
            resetInterval(); 
        });

        document.getElementById('prev').addEventListener('click', () => {
            prevSlide();
            resetInterval();
        });

        thumbnails.forEach((thumbnail, index) => {
            thumbnail.addEventListener('click', () => {
                showSlide(index);
                resetInterval(); 
            });
        });

        slideInterval = setInterval(nextSlide, 5000);
    </script>
</body>
</html>