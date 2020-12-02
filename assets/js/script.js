

$(document).ready(function () {
  $('.selectable').click(function () {
    $('.selectable').each(function (index, element) {
      $(element).removeClass('selected');
    });
    $(this).addClass('selected');
  });

  $('.selectable-group').click(function () {
    $('.selectable-group').each(function (index, element) {
      $(element).removeClass('selected');
    });
    $(this).addClass('selected');
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

