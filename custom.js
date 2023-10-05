// custom.js

$(document).ready(function() {
    $('#hobbies').change(function() {
        // Get selected hobbies and join them with a comma
        var selectedHobbies = $('#hobbies').val();
        var selectedHobbiesText = selectedHobbies.join(', ');

        // Update the selected hobbies in the input field
        $('#selected-hobbies').val(selectedHobbiesText);

        // Update the selected hobbies in the display div
        $('#selected-hobbies-display').text(selectedHobbiesText);
    });
});


$('select[multiple]').multiselect({
    columns: 2,
    placeholder: 'Select options',
    onChange: function(element, checked) {
      var options = $('#mySelect option:selected');
      var selected = [];
      $(options).each(function(index, brand){
          selected.push($(this).val());
      });
      $('#demo').text("You selected: " + selected.join(','));
    }
  });
  
  $('#demo').text("You selected: "+$('#mySelect').val());// to show the selected on page load
