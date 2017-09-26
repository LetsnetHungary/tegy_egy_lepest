$(document).ready(() => {

    console.log("asdfasd")

    $("#loginButton").click(() => {

        var options = {excludeAvailableScreenResolution: true, excludeScreenResolution: true}
        new Fingerprint2(options).get(function(fingerprint){
            $.ajax({
                type: 'POST',
                url: 'Login/loginrequest',
                data: {
                    email: $('#email_form').val(),
                    password: $('#passwd_form').val(),
                    fingerprint: fingerprint,
                    lalo: '---;---',
                    keepmeloggedin: $('#keepmeloggedin_form')[0].checked
                },
                success: function (result) {
            
                    console.log(result)
            
                    result = JSON.parse(result)
            
                    $("#notification-message").html(result.message)
            
                    if(!result.success) {
                        $("#notification-title").html("Hiba: ")
                        $("#notification-top").slideToggle("fast").css({"display": "flex"}).addClass(" notification-error")
                        setTimeout(() => {
                            $("#notification-top").slideToggle("fast")
                        }, 3500)
                    }
                    else {
                       $("#notification-title").html("")
                       $("#notification-top").slideToggle("fast").css({"display": "flex"}).addClass(" notification-success")
                        setTimeout(() => {
                            window.location = "../Admin"
                        }, 700)
            
                    }
                },
                error: function (xhr, status, error) {}})
                     
        })
        
    })
})