$(document).ready(function () {
    // Function to load all products
    function loadAllProducts() {
        // Send AJAX request to the server to get all products
        $.ajax({
            url: '/api/products', // Replace with your Laravel route for fetching all products
            method: 'GET',
            success: function (data) {
                var productTableBody = $('#product-table-body');
                productTableBody.empty(); // Clear existing table rows

                if (data.length === 0) {
                    productTableBody.append('<tr><td colspan="3">No products found.</td></tr>');
                } else {
                    $.each(data, function (index, product) {
                        var newRow = '<tr>' +
                            '<td>' + product.product_name + '</td>' +
                            '<td>' + product.category_name + '</td>' +
                            '<td>' + product.price + '</td>' +
                            '</tr>';
                        productTableBody.append(newRow);
                    });
                }
            },
            error: function (error) {
                console.log('Error:', error);
                alert('Error fetching data.');
            },
        });
    }

    // Function to load products with filters
    function loadFilteredProducts() {
        // Capture filter inputs
        var name = $('#name').val();
        var category = $('#category').val();
        var brand = []; // Capture selected brands
        $('input[name="brand"]:checked').each(function () {
            brand.push($(this).val());
        });

        console.log('Filter Parameters:', { name, category, brand });

        // Send AJAX request to the server to filter products
        $.ajax({
            url: '/api/products', // Replace with your Laravel route for filtering
            method: 'GET',
            data: {
                name: name,
                category: category,
                brand: brand
            },
            success: function (data) {
                var productTableBody = $('#product-table-body');
                productTableBody.empty(); // Clear existing table rows

                if (data.length === 0) {
                    productTableBody.append('<tr><td colspan="3">No products found.</td></tr>');
                } else {
                    $.each(data, function (index, product) {
                        var newRow = '<tr>' +
                            '<td>' + product.product_name + '</td>' +
                            '<td>' + product.category.category_name + '</td>' +
                            '<td>' + product.price + '</td>' +
                            '</tr>';
                        productTableBody.append(newRow);
                    });
                }
            },
            error: function (error) {
                console.log('Error:', error);
                alert('Error fetching data.');
            },
        });
    }

    // Attach a click event handler to the "Apply Filters" button
    $('#applyFilters').on('click', function () {
        loadFilteredProducts(); // Load filtered products when the button is clicked
    });

    // Attach a click event handler to the "Reset Filters" button
    $('#resetFilters').on('click', function () {
        // Clear filter inputs and load all products
        $('#name').val('');
        $('#category').val('');
        $('#minPrice').val('');
        $('#maxPrice').val('');
        $('input[name="brand"]').prop('checked', false);
        loadAllProducts(); // Load all products when filters are reset
    });

    // Load all products when the page initially loads
    loadAllProducts();
});
