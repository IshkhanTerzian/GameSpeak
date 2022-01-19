/**
 *  Author: Ishkhan Terzian ID#001216827
 * 
 *  Date:November 26, 2021, 3:05:17 PM
 * 
 *  Description: This file holds the source code that is implemented in the
 *               getuserreviews.php.
 *               The DOM dynamically is altered with user input 
 */
window.addEventListener("load", function () {

    // Retrieving the DOM elements
    let reviewButton = document.getElementById("getReviews");

    /**
     * When user clicks on the button, get all the review records from the
     * specified user, which is then displayed on the page.
     * With each review there is an image of a garbage can that is linked
     * to another listener.
     * When garbage can is clicked, the record is deleted from the database and
     * then the page is reloaded to reflect the change
     */
    reviewButton.addEventListener("click", function () {

        let url = "getuserreviews.php";

        fetch(url, {
                credentials: 'include'
            })
            .then(response => response.json())
            .then(function (data) {
                let content = document.getElementById("content");
                let image = "<img src='../images/delete.PNG'>";

                if (data.length > 0) {
                    let html = "";
                    data.forEach(function (i) {
                        html += "<br>";
                        html += image;
                        html += "<p><pre>Game Title: " + i.title + "       Genre: " + i.genre + "     Rating: " + i.rategame + "<br><br>Review: </pre></p>" + "<p class='words'>" + i.rtext + "</p><br><br>";
                    });
                    content.innerHTML = html;
                } else {
                    content.innerHTML = "<p style='text-align: center'>You do not have any reviews yet!</p>";
                }


                let images = document.querySelectorAll("img");

                images.forEach(function (image) {
                    image.addEventListener("click", function () {
                        let url = "../server/getreviewid.php";

                        fetch(url, {
                                credentials: 'include'
                            })
                            .then(response => response.json())
                            .then(DeleteItem)
                            .then(ReloadPage)
                    });
                });
            });
    });

    /**
     * Reloads the page after a deletion of a record takes place
     */
    function ReloadPage() {
        window.location.reload();
    }

    /**
     * If user clicks the garbage can, send a json request to
     * deletereview.php file with the unique id for the record as a parameter, 
     * to delete the record from the database, and then 
     * reload the table on the web page dynamically.
     * @param {Array} array 
     */
    function DeleteItem(array) {

        let deleteItem = array[0].id;

        let url = "../server/deletereview.php?id=" + deleteItem;

        fetch(url, {
                credentials: 'include'
            })
            .then(respone => respone.text())
    }
});