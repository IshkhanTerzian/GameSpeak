/**
 *  Author: Ishkhan Terzian ID#001216827
 * 
 *  Date:November 25, 2021, 5:39:35 PM
 * 
 *  Description: This file holds the source code that is implemented in the
 *               createreview.php.
 *               The DOM dynamically is altered with user input 
 */
window.addEventListener("load", function () {

    // Retrieving the DOM elements
    let rateGame = document.getElementById("rateGame");
    let title = document.getElementById("psTitle");
    let genre = document.getElementById("gameGenre");
    let review = document.getElementById("reviewText");
    let button = document.getElementById("submitReview");
    let form = document.getElementById("createReviewForm");

    // Altering visibility of some elements
    form.style.visibility = "visible";

    // Boolean checkers to ensure valid entry
    let titleCheck = false;
    let genreCheck = false;
    let reviewCheck = false;
    let rateCheck = false;

    /**
     * Validating title parameter
     */
    title.addEventListener("keyup", function () {
        if (title.value.length > 0 && (title.value).trim() !== "") {
            titleCheck = true;
        }
    });

    /**
     * Validating genre parameter
     */
    genre.addEventListener("keyup", function () {
        if (genre.value.length > 0 || (genre.value).trim() !== "") {
            genreCheck = true;
        }
    });

    /**
     * Validating review parameter
     */
    review.addEventListener("keyup", function () {
        if (review.value.length > 0 || (review.value).trim() !== "") {
            reviewCheck = true;
        }
    });

    /**
     * Validating rate parameter
     */
    rateGame.addEventListener("keyup", function () {
        if (rateGame.value.length > 0 || (rateGame.value).trim() !== "") {
            rateCheck = true;
        }
    });

    /**
     * When a user clicks on the button and all the parameters are valid
     * pass the parameters to addreview.php, which inserts a new record
     * into the specified table
     */
    button.addEventListener("click", function () {

        if (titleCheck && genreCheck && reviewCheck && rateCheck) {
            let url = "addreview.php?psTitle=" + title.value + "&gameGenre=" + genre.value + "&reviewText=" + review.value + "&rateGame=" + rateGame.value;
           
            // let url = "addreview.php?psTitle=" + title.value + "&gameGenre=" + genre.value + "&reviewText=" + review.value + "&rateGame=" + rateGame.value;

            fetch(url, {
                    credentials: 'include'
                })
                .then(response => response.json())
                .then(function (data) {
                    let topMsg = document.getElementById("topMsg");
                    if (data === 0) {
                        topMsg.innerHTML = "You have left a review!";
                        form.style.visibility = "hidden";
                    } else if (data === 1) {
                        topMsg.innerHTML = "No review left!";
                    }
                });
        } else {
            topMsg.innerHTML = "All fields must be filled";
        }
    });
});