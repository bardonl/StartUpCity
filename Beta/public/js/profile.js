var friendsCount = $('.mo-indicator--heading').text();
var userId = $('.mo-profile__image--card').attr('id');

for(i = 1; i <= Math.round(parseFloat(friendsCount) / 8); i++) {
    $('.co-pagination').append('<li><a class="co-pagination__item">'+i+'</a></li>')
}

$('.co-pagination > li:nth-child(1) > a').addClass('co-pagination__item--active');
$('#1').css('display','block');

$('.co-pagination__item').on('click', function(){
    $.ajax({
        type:"GET",
        url:"/getfriends/"+ userId +"/"+ (8 * parseInt($(this).text()) - 8),
        success:function (data) {

            console.log(data);

            for (var a = 0; a <= data.length; a++)
            {

            }

        }
    });

    $('.co-pagination__item').removeClass('co-pagination__item--active');
    $('.row').css('display','none');
    $(this).addClass('co-pagination__item--active');
    $('#'+$(this).text()).css('display','block');
});