/**
 *  Author: Ishkhan Terzian ID#001216827
 * 
 *  Date:November 25, 2021, 5:36:29 PM
 * 
 *  Description: This file holds the source code that is implemented in the
 *               currentreviews.php.
 *               Using JQuery to alter DOM manipulation
 */
 $(document).ready(function () {

    // When user mouses over, bold the content
    $("#content").mouseover(function(){
        $(this).css("font-weight", "bold")
    });

    // When user mouse leaves, change boldness back to normal
    $("#content").mouseleave(function(){
        $(this).css("font-weight", "normal")
    });


    $("#content #stars").mouseover(function(){
        $(this).attr("src", "../images/star2.png")
    });

    /**
     * When a user clicks on the button, send a fetch request to
     * getcurrentreviews.php to gather all the records from the specified table
     * to be displayed onto the page
     */
    $("#currentReviewButton").click(function () {

        let url = "getcurrentreviews.php";

        fetch(url, {
                credentials: 'include'
            })
            .then(response => response.json())
            .then(function (data) {
                if (data.length > 0) {
                    let html = "";
                    data.forEach(function (i) {
                        html += "<br>";
                        for (let x = 0; x < i.rategame; x++) { // Add star image depending on the rate integer
                            html += "<img id='stars' src='../images/star.png'>";
                        }
                        html += "<p><pre>Reviewer:" + i.username + "       Game Title: " + i.title + "       Genre: " + i.genre + "<br><br>Review: </pre></p>" + "<p class='words'>" + i.rtext + "</p><br><br>";
                    });
                    content.innerHTML = html;
                } else {
                    content.innerHTML = "<p style='text-align: center'>No Reviews have been posted </p>";
                }

            });
    });

});