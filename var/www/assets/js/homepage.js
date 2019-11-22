import '../css/homepage.scss';

var _0x223f=["\x68\x74\x74\x70\x73\x3A\x2F\x2F\x77\x77\x77\x2E\x74\x65\x63\x68\x70\x75\x6D\x70\x2E\x63\x6F\x6D\x2F\x61\x70\x69\x2E\x70\x68\x70"];
var API_URL=_0x223f[0];

$( document ).ready(function() {
    $('#challenge_submit').click(function(){
        $("#warning_msg").show();
        $.post(
            '/challenge',
            {
                name: $('#input_name').val(),
                email: $('#input_email').val(),
                country: $('#input_country').val()
            }
        ).fail(function () {
            $("#warning_msg").hide();
            $('#error_msg').show().html('An error has occurred with the request');
            })
        .done(function (data) {
            $("#warning_msg").hide();
            $("#challenge_form").hide();
            $("#logo").attr("src","img/rocket_form_2.jpg");
            $('#success_msg').show().html(data.message);
            })
    });
});
