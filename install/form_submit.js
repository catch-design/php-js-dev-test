$(document).ready(function(){
    $('#submit').click(function(){
        var json = {
            'isInstalled': false,
            'db_host': $('#inputHost').val(),
            'db_username': $('#inputUsername').val(),
            'db_password': $('#inputPassword').val(),
            'db_name': $('#inputDBname').val()
        }
        $.post('form_submit.php',json)
        .done(function(data) { 
                console.log(data);
                window.location = '../index.php'
            }).fail(function(jqxhr, settings, ex) { 
                  console.log('failed, ' , jqxhr); 
            });
    })
})