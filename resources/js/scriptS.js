
//var elem = document.getElementById('year_select');

$(function() {
  $(document).on('change','#year_select', function() {
    var year = $(this).val();
    
    $('p').text(val);
    
  } );
} );