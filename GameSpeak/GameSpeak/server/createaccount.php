<!-- 
    Author: Ishkhan Terzian ID#001216827

    Date: November 25, 2021, 8:06:51 AM

    Description: Register an account to access GameSpeak by
                 passing the user's parameters into a createaccount.js
 -->
<!DOCTYPE html>
<html>

<head>
    <title>Create Account</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/createaccount.css">
    <script src="../js/createaccount.js"></script>
</head>

<body>
    <h1 id="headerMsg">Create your account!</h1>
    <div id="form">
        <label>Enter your Email <span id="emailMsg"></span></label>
        <input type="email" id="email"><br>

        <label>Enter your name <span id="nameMsg"></label>
        <input type="text" id="userid"><br>

        <label>Enter your password <span id="pwMsg"></label>
        <input type="password" id="password"><br>

        <input type="button" id="createButton" value="Create Account!">
    </div>

    <div id="goBack">
        <a href="../index.html">Go back to Log in!</a>
    </div>


</body>

</html>