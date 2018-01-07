function post_to_url(path, params, method) {
    method = method || "post"; // Set method to post by default, if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        var hiddenField = document.createElement("input");
        hiddenField.setAttribute("type", "hidden");
        hiddenField.setAttribute("name", key);
        hiddenField.setAttribute("value", params[key]);

        form.appendChild(hiddenField);
    }

    document.body.appendChild(form);    // Not entirely sure if this is necessary
    form.submit();
}
/*$('#login-popup-box .modal-body button').click(function(event){
    post_to_url('./login.php', 
        {
            'account' : $('input[name="account"]').val(), 
            'password' : $('input[name="password"]').val()
        }, 
        'POST');
}); */
$('#login-popup-box .modal-body button').click(function(event) {
    $.post("./login.php", 
    {
        'account' : $('input[name="account"]').val(), 
        'password' : $('input[name="password"]').val()
    },
    function (data, status) {
        //$("#myText").text("Data: " + data + " Status: " + status);
        console.log("Status: " + status);
        console.log(data);
        //console.log(data[code])
    });
});
function calPrice(val) {
    document.getElementById("price").innerHTML= val * 260 + '元';
}