$(document).ready(() => {
    $("#loginButton").click(() => {
        $.ajax({
            type: 'POST',
            url: 'Login/loginrequest',
            data: {
                email: $('#email_form').val(),
                password: $('#passwd_form').val(),
                fingerprint: '52e4ceec7c8f3ce37fa7cb898d52b501',
                lalo: '23423;1234123',
                keepmeloggedin: $('#keepmeloggedin_form')[0].checked
            },
            success: function (result) {

                console.log(result)
                result = JSON.parse(result)

                $("#notification-title").html(result.title)
                $("#notification-message").html(result.message)

                if(!result.success) {
                    $("#notification-top").slideToggle("fast").css({"display": "flex"}).addClass(" notification-error")
                    setTimeout(() => {
                        $("#notification-top").slideToggle("fast")
                    }, 3500)
                }
                else {
                    $("#notification-top").slideToggle("fast").css({"display": "flex"}).addClass(" notification-success")
                    setTimeout(() => {
                        window.location = "../Admin"
                    }, 2400)

                }
            },
            error: function (xhr, status, error) {}
        })
    })
})
