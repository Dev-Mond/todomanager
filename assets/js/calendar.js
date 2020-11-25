

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