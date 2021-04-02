window.addEventListener("DOMContentLoaded", function() {

    let time = document.querySelector("#active_user")

    console.log(time.innerHTML)

    window.addEventListener('focus', function() {
        console.log("active")
        time.innerHTML = "<i class='fas fa-circle green' aria-hidden='true'></i>Online Now"
    })

})