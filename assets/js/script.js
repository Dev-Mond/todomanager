function validateData(userInputs, action, callbackOnSuccess, callbackOnError) {
    $.ajax({
        url: action,
        type: 'POST',
        dataType: 'json',
        data: userInputs,
        success: callbackOnSuccess,
        error: callbackOnError
    });
}