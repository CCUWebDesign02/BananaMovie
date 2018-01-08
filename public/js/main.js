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
$('#login-popup-box .modal-body button').click(function(event){
    post_to_url('./login.php', 
        {
            'account' : $('#login-popup-box input[name="account"]').val(), 
            'password' : $('#login-popup-box input[name="password"]').val()
        }, 
        'POST');
});
$('#reg-popup-box .modal-body button').click(function(event){
    post_to_url('./reg.php', 
        {
            'account': $('#reg-popup-box input[name="account"]').val(), 
            'password': $('#reg-popup-box input[name="password"]').val(),
            'username': $('#reg-popup-box input[name="username"]').val(),
            'email': $('#reg-popup-box input[name="email"]').val()
        }, 
        'POST');
});
$('#reset-popup-box .modal-body button').click(function(event){
    post_to_url('./change_pass.php', 
        {
            'old_password': $('#reset-popup-box input[name="old_password"]').val(),
            'new_password': $('#reset-popup-box input[name="new_password"]').val(),
            'new_password_confirm': $('#reset-popup-box input[name="new_password_confirm"]').val()
        }, 
        'POST');
});
$('#pay-btn').click(function(event){
    post_to_url('./addcart.php', 
        {
            'ticket_id' : $('select[name="ticket"]').val(), 
            'num' : $('select[name="num"]').val(),
            'next_action' : 'pay',
            'action': 'add',
            'return_page' : '/cart.php'
        }, 
        'POST');
});
$('#addcart-btn').click(function(event){
    post_to_url('./addcart.php', 
        {
            'ticket_id' : $('select[name="ticket"]').val(), 
            'num' : $('select[name="num"]').val(),
            'next_action' : 'none',
            'action': 'add',
            'return_page' : location.href
        }, 
        'POST');
});
/*$('#login-popup-box .modal-body button').click(function(event) {
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
});*/
function calPrice(val) {
    document.getElementById("price").innerHTML= val * 260 + '元';
}
function cartCalPrice(ticket_id, val , subPriceTarget) {
    old = document.getElementById(subPriceTarget).innerHTML;
    document.getElementById(subPriceTarget).innerHTML= val * 260;
    diff = old - document.getElementById(subPriceTarget).innerHTML;
    total_old = document.getElementById('Total1').innerHTML;
    document.getElementById('Total1').innerHTML= total_old - diff;
    document.getElementById('Total2').innerHTML= total_old - diff;
    $.post("./addcart.php", 
    {
        'ticket_id' : ticket_id, 
        'num': val,
        'next_action': 'pay',
        'action': 'update',
        'return_page': '/cart.php'
    },
    function (data, status) {
        //$("#myText").text("Data: " + data + " Status: " + status);
        console.log("Status: " + status);
        console.log(data);
        //console.log(data[code])
    });
}
$(document).ready(function () {
    $("#search").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        /*$("#searched-item .media-body").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
        $("#searched-item div").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });*/
        $("#searched-item ").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});