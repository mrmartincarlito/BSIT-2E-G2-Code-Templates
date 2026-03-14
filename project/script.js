function processLogin() {
    var payload = {
        username : $("#emailAddress").val(),
        password : $("#password").val()
    }

    /**
     * post
     * get
     * 
     */
    $.post("login.php",
        payload,
    function(data, status){
      $("#message").html("Data: " + data);
    });
}