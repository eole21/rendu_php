<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ===== CSS ===== -->
    <!-- 
    <link rel="stylesheet" href="css/index.css"> -->
    <title>Online Survey</title>
    <style>
        @media screen and (min-width: 768px) {

            body {
                margin: 0;
                padding: 0;
            }

            h1 {
                font-size: 50px;
            }

            img {
                width: 100%;
                height: auto;
            }

            a {
                text-decoration: none;
            }

            .container {
                display: flex;
                justify-content: space-around;
            }

            .left {
                margin-top: 35vh;
                margin-left: 5vw;
            }

            .right {
                width: 45vw;
                margin-top: 50px;
                margin-right: 5vw;
            }

            .left .loginButton {
                margin: 0 12vw;
            }

            .loginButton {
                display: block;
                padding: 1rem;
                margin: 2rem 0;
                background-color: rgba(170, 12, 39, 0.4);
                color: #FFF;
                font-weight: 600;
                text-align: center;
                border-radius: .5rem;
                transition: .3s;
            }

            .loginButton:hover {
                background-color: #aa0c27;
            }


            .loginButton :hover {
                background-color: #aa0c27;
            }
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="left">
            <h1>THE ONLINE SURVEY</h1>
            <a href="login-user.php" class="loginButton">Connexion</a>
        </div>
        <div class="right">
            <img src="image/survey_checkin.svg" alt="survey image freepiks">
        </div>
    </div>
</body>

</html>
