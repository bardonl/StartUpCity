// http://stackoverflow.com/a/6466217
function addLeadingZeros (n, length)
{
    var str = (n > 0 ? n : -n) + "";
    var zeros = "";
    for (var i = length - str.length; i > 0; i--)
        zeros += "0";
    zeros += str;
    return n >= 0 ? zeros : "-" + zeros;
}

$(function()
{
    var assignment_interval = setInterval(function()
    {
        var timestamp = parseInt( $("#assignment-start-time").val() );
        var duration = parseInt( $("#assignment-duration").val() );
        var peanuts = parseInt( $("#assignment-peanuts").val() );

        if (timestamp > 0)
        {
             var diff = Math.floor($.now() / 1000) - timestamp;
             var duration_time = duration - diff;

             var seconds = duration_time;
             var minutes = seconds / 60;
             var hours = minutes / 60;

             var seconds_converted = addLeadingZeros(seconds % 60,2);
             var minutes_converted = addLeadingZeros(Math.floor(minutes) % 60, 2);
             var hours_converted = addLeadingZeros(Math.floor(hours), 2);
             var assignment_time_formatted = hours_converted + " : " + minutes_converted + " : " + seconds_converted;
             $("#mo-timer__time").html(assignment_time_formatted);
         }

         if (duration_time <= 0)
         {
             $("#mo-timer__time").html('');
             $("#mo-timer__status").html('Niet aan het werk');

             $('#mo-money__amount').html( parseInt( $('#mo-money__amount').html() ) + peanuts );

             $('.assignment-start-button-disabled').removeClass('assignment-start-button-disabled');

             clearInterval( assignment_interval );
         }
    }, 500);

 });
