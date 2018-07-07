  //  ...
	/**
	 * calls on submit button click
	 */
$(document).ready(function () {
    $('#btnSubmit').click(function () {
        if($('#inputHost').val().lenght <= 0 || $('#inputUsername').val().length <= 0 || 
        $('#inputPassword').val().length <= 0 || $('#inputDBname').val().length <= 0) {
            alert("Please fill all fields..!!");
            return;
        }
        var json = {
            'isInstalled': false,
            'db_host': $('#inputHost').val(),
            'db_username': $('#inputUsername').val(),
            'db_password': $('#inputPassword').val(),
            'db_name': $('#inputDBname').val()
        }
        $.post('form_submit.php', json)
            .done(function (data) {
                console.log(data);
                window.location = '../index.php'
            }).fail(function (jqxhr, settings, ex) {
                console.log('failed, ', jqxhr);
            });
    });
});