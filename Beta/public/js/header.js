// http://stackoverflow.com/a/6466217
function addLeadingZeros(n, length) {
    var str = (n > 0 ? n : -n) + '';
    var zeros = '';
    for (var i = length - str.length; i > 0; i--)
        zeros += '0';
    zeros += str;
    return n >= 0 ? zeros : '-' + zeros;
}

$(function () {
    var assignment_interval = setInterval(function () {
        var timestamp = parseInt($('#assignment-start-time').val());
        var duration = parseInt($('#assignment-duration').val());
        var peanuts = parseInt($('#assignment-peanuts').val());
        var assignment_type_id = parseInt($('#assignment-status').val());

        if (assignment_type_id === 1)
        {
            assignment_status = 'Leren';
        } else if (assignment_type_id === 2)
        {
            assignment_status = 'Werken';
        } else {
            assignment_status = 'Niet aan het werk';
        }

        if (timestamp > 0) {
            var diff = Math.floor($.now() / 1000) - timestamp;

            var seconds = duration - diff;
            var minutes = seconds / 60;
            var hours = minutes / 60;

            var seconds_converted = addLeadingZeros(seconds % 60, 2);
            var minutes_converted = addLeadingZeros(Math.floor(minutes) % 60, 2);
            var hours_converted = addLeadingZeros(Math.floor(hours), 2);
            var assignment_time_formatted = hours_converted + " : " + minutes_converted + " : " + seconds_converted;
            $("#mo-timer__time").html(assignment_time_formatted);

        }

        if (seconds <= 0) {
            $('#mo-timer__time').html('');

            $('#mo-money__amount').html(parseInt($('#mo-money__amount').html()) + peanuts);

            $('.assignment-start-button-disabled').removeClass('assignment-start-button-disabled');

            clearInterval(assignment_interval);
        }

        $("#mo-timer__status").html(assignment_status);
    }, 500);
});
