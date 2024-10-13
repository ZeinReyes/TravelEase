<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        .dashboard-body {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            color: white;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex-grow: 1; 
            padding: 20px;
            overflow-y: auto;
            background-color: #f8f9fa;
        }
        .active {
            background-color: #388e3c;
        }
    </style>
</head>
<body class="dashboard-body">
<div class="bg-success sidebar">
    <div class="p-3 border-bottom">
        <h2>TravelEase</h2>
        <div class="mt-auto">
            <p class="nav-link dropdown-toggle text-white hover:bg-success" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
            </p>
            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Edit Profile</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <nav class="mt-2 flex-grow-1">
        <h1 class="mx-3">Dashboard</h1>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link text-white hover:bg-success active" onclick="showContent('manage-packages')">Manage Packages</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white hover:bg-success" onclick="showContent('manage-reviews')">Manage Reviews</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white hover:bg-success" onclick="showContent('manage-users')">Manage Users</a>
            </li>
        </ul>
    </nav>   
</div>

<div class="content">
    <div id="manage-packages" class="content-section" style="display: block;">
        <div class="package-header d-flex justify-content-between">
            <h2 class="mx-3">Manage Packages</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPackageModal">+ Add Package</button>
        </div>

        <div class="container mt-4">
            @if ($packages->isEmpty())
                <div class="text-center text-dark mb-4">
                    <p>No packages available yet.</p>
                </div>
            @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Guests Allowed</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $package)
                            <tr>
                                <td>{{ $package->name }}</td>
                                <td>{{ $package->description }}</td>
                                <td>Php{{ number_format($package->price, 2) }}</td>
                                <td>{{ $package->guests_allowed }}</td>
                                <td>{{ $package->start_date ? $package->start_date->format('F j, Y') : 'N/A' }}</td>
                                <td>{{ $package->end_date ? $package->end_date->format('F j, Y') : 'N/A' }}</td>
                                <td>{{ $package->created_at->format('F j, Y') }}</td>
                                <td>
                                <button class="btn btn-warning btn-sm my-3" 
                                    onclick="openEditPackageModal('{{ $package->id }}', 
                                    '{{ addslashes($package->name) }}', 
                                    '{{ addslashes($package->description) }}', 
                                    {{ $package->price }}, 
                                    {{ $package->guests_allowed }}, 
                                    '{{ $package->start_date ? $package->start_date->format('Y-m-d') : '' }}', 
                                    '{{ $package->end_date ? $package->end_date->format('Y-m-d') : '' }}')">Edit
                                </button>

                                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div id="manage-reviews" class="content-section" style="display: none;">
        <h2 class="m-3">Manage Reviews</h2>
        <div class="container">
            @if ($reviews->isEmpty())
                <div class="text-center text-dark mb-4">
                    <p>No reviews yet.</p>
                </div>
            @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Rating</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->comment }}</td>
                                <td>{{ $review->rating }}/5</td>
                                <td>{{ $review->created_at->format('F j, Y') }}</td>
                                <td>
                                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

    <div id="manage-users" class="content-section" style="display: none;">
        <h2 class="m-3">Manage Users</h2>
        <div class="container">
            @if ($users->isEmpty())
                <div class="text-center text-dark mb-4">
                    <p>No users available yet.</p>
                </div>
            @else
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('F j, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<!-- Modal -->
<!-- Add Package Modal -->
<div class="modal fade" id="addPackageModal" tabindex="-1" aria-labelledby="addPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPackageModalLabel">Add New Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('packages.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="packageName" class="form-label">Package Name</label>
                        <input type="text" class="form-control" name="name" id="packageName" placeholder="Enter package name" required>
                    </div>
                    <div class="mb-3">
                        <label for="packageDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="packageDescription" rows="3" placeholder="Enter description" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="packagePrice" class="form-label">Price (Php)</label>
                        <input type="number" class="form-control" name="price" id="packagePrice" placeholder="Enter price" required>
                    </div>
                    <div class="mb-3">
                        <label for="guestsAllowed" class="form-label">Guests Allowed</label>
                        <input type="number" class="form-control" name="guests_allowed" id="guestsAllowed" placeholder="Enter number of guests" required>
                    </div>
                    <div class="mb-3">
                        <label for="startDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="startDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="endDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" id="endDate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Add Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Package Modal -->
<div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="editPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPackageModalLabel">Edit Package</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('packages.update', '') }}" id="editPackageForm" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="package_id" id="editPackageId">
                    <div class="mb-3">
                        <label for="editPackageName" class="form-label">Package Name</label>
                        <input type="text" class="form-control" name="name" id="editPackageName" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPackageDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="editPackageDescription" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editPackagePrice" class="form-label">Price (Php)</label>
                        <input type="number" class="form-control" name="price" id="editPackagePrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="editGuestsAllowed" class="form-label">Guests Allowed</label>
                        <input type="number" class="form-control" name="guests_allowed" id="editGuestsAllowed" required>
                    </div>
                    <div class="mb-3">
                        <label for="editStartDate" class="form-label">Start Date</label>
                        <input type="date" class="form-control" name="start_date" id="editStartDate" required>
                    </div>
                    <div class="mb-3">
                        <label for="editEndDate" class="form-label">End Date</label>
                        <input type="date" class="form-control" name="end_date" id="editEndDate" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning">Update Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function showContent(section) {
        const sections = ['manage-packages', 'manage-reviews', 'manage-users'];
        sections.forEach(s => {
            document.getElementById(s).style.display = s === section ? 'block' : 'none';
            document.querySelector(`a[href='#'][onclick="showContent('${s}')"]`).classList.toggle('active', s === section);
        });
    }

    function openEditPackageModal(id, name, description, price, guests, startDate, endDate) {
        document.getElementById('editPackageId').value = id;
        document.getElementById('editPackageName').value = name;
        document.getElementById('editPackageDescription').value = description;
        document.getElementById('editPackagePrice').value = price;
        document.getElementById('editGuestsAllowed').value = guests;
        document.getElementById('editStartDate').value = startDate;
        document.getElementById('editEndDate').value = endDate;
        
        // Set the form action URL
        document.getElementById('editPackageForm').action = '/packages/' + id; // Make sure this URL is correct

        var editModal = new bootstrap.Modal(document.getElementById('editPackageModal'));
        editModal.show();
    }
</script>
</body>
</html>
