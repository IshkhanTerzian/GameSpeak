/**
 *  Author: Ishkhan Terzian ID#001216827
 * 
 *  Date:November 29, 2021, 10:41:05 AM
 * 
 *  Description: Holds the code to determine valid input entry
 *               for user's credentials.
 */
window.addEventListener("load", function(){

    // Retrieving elements from the DOM
    let userid = document.getElementById("userid");
    let userIdMsg = document.getElementById("userIdMsg");
    let password = document.getElementById("password");
    let passwordMsg = document.getElementById("passwordMsg");


    /**
     * Validating user's userid
     */
    userid.addEventListener("keyup", function(){

        if (userid.value.length > 0 && userid.value.trim() !== ""){

            userIdMsg.innerHTML = "";

        } else {
            userIdMsg.style.color = "crimson";
            userIdMsg.innerHTML = "Username cannot be empty";
        }
    });

    /**
     * Validating user's password
     */
    password.addEventListener("keyup", function(){

        if (password.value.length > 0 && password.value.trim() !== ""){
            passwordMsg.innerHTML = "";
        } else {
            passwordMsg.style.color = "crimson";
            passwordMsg.innerHTML = "Please enter your password"
        }
    });
});