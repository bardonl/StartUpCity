var script = document.createElement('script');
script.src = 'https://code.jquery.com/jquery-3.2.1.min.js';
script.type = 'text/javascript';
document.getElementsByTagName('head')[0].appendChild(script);

// http://stackoverflow.com/a/6466217
function addLeadingZeros(n, length) {
    var str = (n > 0 ? n : -n) + '';
    var zeros = '';
    for (var i = length - str.length; i > 0; i--)
        zeros += '0';
    zeros += str;
    return n >= 0 ? zeros : '-' + zeros;
}

var assignment_type_id = parseInt($('#assignment-status').val());

if (assignment_type_id === 0) {
    setTimeStatusPeanuts('', 'Niet aan het werk', 0);
}

var assignment_interval = setInterval(function () {
    var that = this;

    var timestamp = parseInt($('#assignment-start-time').val());
    var duration = parseInt($('#assignment-duration').val());
    var peanuts = parseInt($('#assignment-peanuts').val());

    if (timestamp > 0) {
        var diff = Math.floor($.now() / 1000) - timestamp;

        var seconds = duration - diff;
        var minutes = seconds / 60;
        var hours = minutes / 60;

        var seconds_converted = addLeadingZeros(seconds % 60, 2);
        var minutes_converted = addLeadingZeros(Math.floor(minutes) % 60, 2);
        var hours_converted = addLeadingZeros(Math.floor(hours), 2);
        var converted_time = hours_converted + " : " + minutes_converted + " : " + seconds_converted;

        if (assignment_type_id === 2) {
            setTimeStatusPeanuts(converted_time, 'Werken', 0);
        } else if (assignment_type_id === 1) {
            setTimeStatusPeanuts(converted_time, 'Leren', 0);
        }

    }

    if (seconds <= 0) {
        clearInterval(assignment_interval);

        setTimeStatusPeanuts('', 'Niet aan het werk', peanuts);

        that.$.ajax({
            type:"GET",
            url:"/learning/updateAssignment",
            success:function (data) {

                console.log(data);

                for (var i = 1; i <= $('.co-panel').length; i++) {
                    document.getElementById(i).classList.remove('assignment-start-button-disabled');
                }


            }
        });

        console.log(peanuts);
        console.log($('#mo-money__amount').html());

        $('#assignment-start-time').val(0);
        $('#assignment-duration').val(0);
        $('#assignment-peanuts').val(0);
        $('#assignment-status').val(0);
    }

}, 500);


function setTimeStatusPeanuts(time, status, peanuts) {
    $("#mo-timer__status").html(status);
    $('#mo-timer__time').html(time);
    $('#mo-money__amount').html(parseInt($('#mo-money__amount').html()) + peanuts);
}