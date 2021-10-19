document.querySelector('#log').addEventListener('click',function (e) {
    var type = document.querySelector("#type").value;
    if (type == "Admin") {
        e.preventDefault()
        alert("You will be redirected to Admin Dashboard")
        window.location.replace("/admin/index.html");
    }
    else if(type == "Staff"){
        e.preventDefault()
        alert("You will be redirected to Staff Dashboard")
        window.location.replace("/staff/index.html");
    }
    else
    {e.preventDefault()
    alert("Select the type of User")
    window.location.replace("/Adminlogin.html")}
})

