<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Packages</title>
    <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="package.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        /* Add custom styles */
        .card {
            transition: transform 0.2s;
            border: 1px solid #e0e0e0;
            display: flex;
            flex-direction: column; /* Ensure vertical stacking of card contents */
            height: 100%; /* Ensures all cards use the same height */
        }
        .card:hover {
            transform: scale(1.05);
        }
        .package-heading {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
        }
        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem; /* Added margin for spacing */
        }
        .card-text {
            font-size: 1rem;
            flex-grow: 1; /* Allows text to take up available space */
        }
        .btn-view {
            background-color: #007bff;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-view:hover {
            background-color: #0056b3;
        }
        .package-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            height: 100%; /* Ensures all cards use the same height */
        }
        .card-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* Ensures the card body takes up available space */
        }
        .card-footer {
            margin-top: auto; /* Push the button to the bottom */
        }
        /* Set a minimum height for the card body */
        .card-body {
            min-height: 250px; /* Adjust this value as necessary */
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <x-nav-bar />
        </nav>
    </header>
    <main>
        <div class="package-heading d-flex justify-content-center align-items-center flex-column py-5">
            <h1 class="text-center my-3">Discover Your Perfect Getaway!</h1>
            <p class="w-50 text-center">Join TravelEase and embark on unforgettable journeys. Discover top destinations with our best-selling packages designed for your ultimate comfort and adventure.</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($packages as $package)
                    <div class="col-md-4 mb-4">
                        <div class="card package-card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $package->name }}</h5>
                                <p class="card-text">{{ $package->description }}</p>
                                <p class="card-text"><strong>Price: Php{{ number_format($package->price, 2) }}</strong></p>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#packageModal" data-package="{{ json_encode($package) }}">View Package</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <!-- Package Details Modal -->
    <div class="modal fade" id="packageModal" tabindex="-1" aria-labelledby="packageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="packageModalLabel">Package Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="packageDetails"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="confirmBooking" data-bs-toggle="modal" data-bs-target="#bookingFormModal">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Form Modal -->
    <div class="modal fade" id="bookingFormModal" tabindex="-1" aria-labelledby="bookingFormModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingFormModalLabel">Booking Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="bookingForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="customerName" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="customerName" required>
                        </div>
                        <div class="mb-3">
                            <label for="customerEmail" class="form-label">Your Email</label>
                            <input type="email" class="form-control" id="customerEmail" required>
                        </div>

                        <div class="mb-3">
                            <label for="specialRequests" class="form-label">Special Requests</label>
                            <textarea class="form-control" id="specialRequests"></textarea>
                        </div>
                        <input type="hidden" id="packageId" name="package_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer>
        <x-footer />
    </footer>

    <script>
        // Handle the package modal to display package details
        const packageModal = document.getElementById('packageModal');
        packageModal.addEventListener('show.bs.modal', (event) => {
            const button = event.relatedTarget; // Button that triggered the modal
            const packageData = JSON.parse(button.getAttribute('data-package')); // Extract info from data-* attributes

            // Update the modal's content
            const packageDetails = `
                <h5>${packageData.name}</h5>
                <p>${packageData.description}</p>
                <p><strong>Price: Php${parseFloat(packageData.price).toFixed(2)}</strong></p>
                <p><strong>Guests Allowed:</strong> ${packageData.guests_allowed}</p>
                <p><strong>Available From:</strong> ${packageData.start_date}</p>
                <p><strong>Available Until:</strong> ${packageData.end_date}</p>
            `;
            document.getElementById('packageDetails').innerHTML = packageDetails;

            // Set the package ID in the booking form when opening the modal
            document.getElementById('packageId').value = packageData.id; 
        });

        // Handle the booking form submission
        document.getElementById('bookingForm').addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission
            // Add your booking submission logic here
            alert('Booking submitted successfully!'); // Placeholder for booking submission logic
            $('#bookingFormModal').modal('hide'); // Hide the booking form modal
        });
    </script>
</body>
</html>
