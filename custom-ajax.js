function registerUser(apiUrl) {

    var selectedHobbies = $('input[name="hobbies[]"]:checked').map(function() {
        return $(this).val();
    }).get();

    console.log(selectedHobbies);

    var formData = {
        name: $('#name').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        password_confirmation: $('#password-confirm').val(),
        contact_number: $('#contact_number').val(),
        address: $('#address').val(),
        city: $('#city').val(),
        gender: $('input[name="gender"]:checked').val(),
        hobbies: selectedHobbies,
    };

    console.log(formData);
    $.ajax({
        type: 'POST',
        url: apiUrl, 
        data: formData,
        dataType: 'json',
        success: function (data) {
            window.location.href = '/'; 
        },
        error: function (xhr, textStatus, errorThrown) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                for (var field in errors) {
                    alert(errors[field][0]); 
                }
            } else {
                alert('An error occurred while registering the user');
            }
        },
    });
}



$(document).ready(function () {
    $('#register-button').click(function (e) {
        e.preventDefault();
        registerUser('/api/users/store'); 
    });
    
    $('#edit-button').click(function (e) {
        e.preventDefault();
        var userId = $(this).data('id'); 
        var url = '/api/users/update/' + userId;
        registerUser(url);
    });
    
});
