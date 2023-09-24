<!DOCTYPE html>
<html>
<head>
    <!-- Include Bootstrap CSS via CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

</head>
<body>

<div class="container">
    <div class="row">
        <style>
            .product-listing-container {
                /* background-color: #060404; */
                border: 1px solid #070606;
                padding: 10px;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .product-item {
                border: 2px solid #100d0d;
                padding: 10px;
                margin-bottom: 10px;
                background-color: #110e0e;
                border-radius: 5px;
            }
        </style>
        <div class="col-md-8">
            <!-- Left side content goes here (filters) -->
            <h4>Filters</h4>
            <div class="form-group">
                <label for="name">Filter by Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="category">Filter by Category:</label>
                <select class="form-control" id="category">
                    <option value="">Select Category</option>
                    <!-- Populate category options dynamically from your database -->
                    <option value="category1">category1</option>
                    <option value="category2">category2</option>
                    <!-- Add more category options as needed -->
                </select>
            </div>
            <div class="form-group">
                <label>Filter by Brand:</label>
                <!-- Populate brand options dynamically from your database -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="brand1" value="brand1">
                    <label class="form-check-label" for="brand1">Brand 1</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="brand2" value="brand2">
                    <label class="form-check-label" for="brand2">Brand 8</label>
                </div>
                <!-- Add more brand options as needed -->
            </div>
            <button class="btn btn-primary" id="applyFilters">Apply Filters</button>
            <button class="btn btn-secondary" id="resetFilters">Reset Filters</button>
        </div>
        <div class="col-md-4">
            <div class="product-listing-container" id="product-listing-containers">
                <h4>Product Listing</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price (Rs.)</th>
                            <!-- Add more table headers as needed -->
                        </tr>
                    </thead>
                    <tbody id="product-table-body">
                        <!-- Product rows will be dynamically added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('product-filter.js') }}"></script>
{{-- @include('products.product-list', ['products' => $products]) --}}
</body>
</html>
