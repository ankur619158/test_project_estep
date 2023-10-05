@extends('layouts.app')

@section('content')
<div id="user-list">
    <!-- User data will be displayed here -->
</div>

<div id="pagination-links">
    <!-- Pagination links will be displayed here -->
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var currentPage = 1; // Initialize the current page

        // Function to load user data via AJAX
        function loadUsers(page) {
            $.ajax({
                url: '/get-paginated-users?page=' + page, // Route to fetch paginated data
                method: 'GET',
                success: function(response) {
                    $('#user-list').html(response.data); // Update user data
                    $('#pagination-links').html(response.links); // Update pagination links
                    currentPage = page; // Update the current page
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        }

        // Load initial data on page load
        loadUsers(currentPage);

        // Handle pagination link clicks
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            loadUsers(page);
        });
    });
</script>
@endsection
