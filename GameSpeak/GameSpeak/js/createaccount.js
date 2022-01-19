/**
 *  Author: Ishkhan Terzian ID#001216827
 * 
 *  Date:November 24, 2021, 2:42:38 PM
 * 
 *  Description: This file holds the source code that is implemented in the
 *               createaccount.php.
 *               The DOM dynamically is altered with user input 
 */
window.addEventListener("load", function () {

    // Retrieving the DOM elements
    let email = document.getElementById("email");
    let userid = document.getElementById("userid");
    let password = document.getElementById("password");
    let form = document.getElementById("form");
    let goBack = document.getElementById("goBack");
    let createButton = document.getElementById("createButton");
    let emailMsg = document.getElementById("emailMsg");
    let nameMsg = document.getElementById("nameMsg");
    let pwMsg = document.getElementById("pwMsg");
    let headerMsg = document.getElementById("headerMsg");

    // Altering visibility of some elements
    form.style.visibility = "visible";
    goBack.style.visibility = "hidden";

    // Boolean checkers to ensure valid entry
    let emailCheck = false;
    let useridCheck = false;
    let passwordCheck = false;

    /**
     * Validating email parameter
     */
    email.addEventListener("keyup", function () {
        if (email.value.length === 0 || (email.value).trim() === "") {
            emailMsg.style.color = "red";
            emailMsg.innerHTML = "Must use a valid email address";
        } else {
            emailMsg.innerHTML = "";
            emailCheck = true;
        }
    });

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


    // Once the createbutton is clicked, and all the parameters valid
    // pass the parameters to registeraccount.php and insert a 
    // new record into the users database
    /**
     * Once the createbutton is clicked, and all the parameters valid
     * pass the parameters to registeraccount.php and insert a 
     * new record into the users database
     */
    createButton.addEventListener("click", function () {
        let url = "registeraccount.php?email=" + email.value + "&userid=" + userid.value + "&password=" + password.value;

       // let url = "registeraccount.php?email=" + email.value + "&userid=" + userid.value + "&password=" + password.value;
        fetch(url, {
                credentials: 'include'
            })
            .then(response => response.json())
            .then(function (data) {
                if (data === 1) {
                    emailMsg.style.color = "red";
                    emailMsg.innerHTML = "Must use a valid email address";
                } else if (data === 2) {
                    emailMsg.innerHTML = "";
                    nameMsg.style.color = "red";
                    nameMsg.innerHTML = "Cannot have an empty name";
                } else if (data === 3) {
                    nameMsg.innerHTML = "";
                    pwMsg.style.color = "red";
                    pwMsg.innerHTML = "Password cannot be empty";
                } else if (data === 4) {
                    emailMsg.style.color = "red";
                    emailMsg.innerHTML = "Email is already in use!";
                } else if (data === 0 && emailCheck && useridCheck && passwordCheck) {
                    pwMsg.innerHTML = "";
                    headerMsg.innerHTML = "You have successfully created your account!";
                    form.style.visibility = "hidden";
                    goBack.style.visibility = "visible";
                }
            });
    });
});