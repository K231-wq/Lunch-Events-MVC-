<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Launch</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <div class="blank">
        <p><a href="/home">Launch Events</a></p>
    </div>
    <div class="wrapper">
        <div class="button-container js-icon-lobby-btn">
                <ul class="unorder-list-group">
                    <li>
                        <div class="image">
                            <a href="/home">
                                <img src="images/chef.jpg" alt="User Image">
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="input-container js-lobby-btn">
                            <i class="fa-solid fa-house"></i>
                            <a href="/home">Lobby</a>
                        </div>
                    </li>
                    <li>
                        <div class="input-container js-create-btn">
                            <i class="fa-solid fa-plus"></i>
                            <a href="/create">Create</a>
                        </div>
                    </li>
                    <li>
                        <div class="input-container js-invite-btn">
                            <i class="fa-solid fa-list"></i>
                            <a href="/invitations">My Invitation</a>
                        </div>
                    </li>
                    <li>
                        <div class="input-container js-rsvp-btn">
                            <i class="fa-solid fa-pen"></i>
                            <a href="/rsvp">My RSVP</a>
                        </div>
                    </li>
                    <li>
                        <div class="input-container js-profile-btn">
                            <i class="fa-solid fa-circle-user"></i>
                            <a href="/profile">My Profile</a>
                        </div>  
                    </li>
                    <li>
                        <div class="input-container js-logout-btn">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <a href="/logout">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="grid-layout">
                
                <?php echo $content ?>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/c5f1dc3da2.js" crossorigin="anonymous"></script>

</body>
</html>
