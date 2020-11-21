

$(document).ready(function () {

  $("#calendar").zabuto_calendar({
    action_nav: function() {
      return myNavFunction(this.id);
    },
    showToday:true,
    legend: [{
        type: "text",
        label: "Special event",
        badge: "00"
      },
      {
        type: "block",
        label: "Regular event",
      }
    ]
  });
});

function myNavFunction(id) {
  $("#date-popover").hide();
  var nav = $("#" + id).data("navigation");
  var to = $("#" + id).data("to");
  console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
}

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

