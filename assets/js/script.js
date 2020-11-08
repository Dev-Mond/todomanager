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