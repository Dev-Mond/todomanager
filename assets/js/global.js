let GROUPS = ['notesortby','notesorttype'];

$(document).ready(function () {
  $('.selectable').click(function () {
    $('.selectable').each(function (index, element) {
      $(element).removeClass('selected');
    });
    $(this).addClass('selected');
  });

  $.each(GROUPS, function(index, element) {
    $('.selectable-group-' + element).click(function () {
      $('.selectable-group-' + element).each(function (index, element) {
        $(element).removeClass('selected');
      });
      $(this).addClass('selected');
    });
  }); 
});


function validateData(userInputs, action, callbackOnSuccess, callbackOnError) {
  $.ajax({
    url: action,
    type: 'POST',
    dataType: 'json',
    data: userInputs,
    success: function(data) {
    	setTimeout(function() {
    		callbackOnSuccess(data);
    	}, 1000);
    	
    },
    error: callbackOnError
  });
}

function capitalize(str) {
  return str.toLowerCase().split(' ').map((s) => {
    return s.charAt(0).toUpperCase() + s.substring(1);
  }).join(' ');
}

