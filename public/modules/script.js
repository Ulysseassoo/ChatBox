window.addEventListener("DOMContentLoaded", function() {

    let chatbox = document.querySelector(".Chatbox_bg")

    function reload() {
        fetch("http://chatbox/getmessage")
        .then(function(response) {
            response.json().then(function(data) {
                // console.log(data)
                // The different messages
                // console.log(data)
                chatbox.innerHTML = ""
                console.log(data)
                
                let sender_id = data[0]['user_has_user_sender_id']
                localStorage.setItem("sender", sender_id)
                let receiver_id = data[0]['user_has_user_receiver_id']

                // looping through the data
                for (let i = 0; i < data.length; i++) {
                    let div = document.createElement("div")
                    let message = data[i]['message']
                    div.innerText = message
                    console.log(message)

                    // appending to container
                    if (data[i]["user_has_user_sender_id"] === sender_id) {
                        div.setAttribute("user_id", localStorage.getItem('sender'))
                        div.classList.add("blue")
                        console.log(div)
                        chatbox.appendChild(div)
                    }
                    else if(data[i]["user_has_user_sender_id"] === receiver_id) {
                        div.classList.add("green")
                        chatbox.appendChild(div)
                    }

                }
            })
        })
    }

    reload()

    // In order to refresh every 1seconds if there's a new message
    setInterval(() => {
        reload()
    }, 1500);
    

    let myForm = document.querySelector("#myForm")
    
// To learn more
        myForm.addEventListener('submit', function(event) {
            event.preventDefault()
            let message_value = new FormData
            let data = {
                message : myForm['message'].value
            }
            // let data = new URLSearchParams
            // for (let p of new FormData(myForm)) {
            //     data.append(p[0], p[1])
            // }
            message_value.append("message",JSON.stringify(data)) 
            console.log(message_value)

            
            fetch("http://chatbox/sendmessage", {
                method : 'POST',
                body : myForm['message'].value,
                headers: {
                    'Content-type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .catch(error => console.log(error))
            reload()
            myForm.reset()
        })
    // .then(function(response) {
    //     console.log(response.json())
    // })
    




})