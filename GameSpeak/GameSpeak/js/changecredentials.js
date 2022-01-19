/**
 *  Author: Ishkhan Terzian ID#001216827
 * 
 *  Date:November 29, 2021, 1:01:03 PM
 * 
 *  Description: This file holds the source code that is implemented in the
 *               changecredentials.php.
 *               The DOM dynamically is altered with user input 
 */
window.addEventListener("load", function () {

    // Retrieving the DOM elements
    let userid = document.getElementById("userid");
    let password = document.getElementById("password");
    let nameMsg = document.getElementById("nameMsg");
    let pwMsg = document.getElementById("pwMsg");
    let changeButton = document.getElementById("changeButton");
    let mainDiv = document.getElementById("main");
    let logout = document.getElementById("loggOut");

    // Boolean checkers to ensure valid entry
    let useridCheck = false;
    let passwordCheck = false;

    // Altering visibility of an element
    logout.style.visibility = "hidden";

    /**
     * Validating username parameter
     */
    userid.addEventListener("keyup", function () {
        if (userid.value.length === 0 || (userid.value).trim() === "") {
            nameMsg.style.color = "red";
            nameMsg.innerHTML = "Cannot have an empty name";
        } else {
            nameMsg.innerHTML = "";
            useridCheck = true;
        }
    });

    /**
     * Validating password parameter
     */
    password.addEventListener("keyup", function () {
        if (password.value.length === 0 || (password.value).trim() === "") {
            pwMsg.style.color = "red";
            pwMsg.innerHTML = "Password cannot be empty";
        } else {
            pwMsg.innerHTML = "";
            passwordCheck = true;
        }
    });

    /**
     * Once clicked, with valid parameter entry, pass the parameters
     * to change.php to update the credentials of the current user.
     */
    changeButton.addEventListener("click", function () {

        if (useridCheck && passwordCheck) {
            let url = "change.php?userid=" + userid.value + "&password=" + password.value;

            fetch(url, {
                    credentials: 'include'
                })
                .then(response => response.json())
                .then(function (data) {
                    if (data === 0) {
                        let topMsg = document.getElementById("topMsg");
                        topMsg.innerHTML = "You have succesfully changed your credentials!";
                        mainDiv.style.visibility = "hidden";
                        logout.style.visibility = "visible";
                    }
                });
        }
    });
});