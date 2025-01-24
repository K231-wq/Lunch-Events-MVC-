
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link rel="stylesheet" href="css/invite.css">
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
                                <img src="images/chef.jpg" alt="icon">
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
                
                <h2 class="grid-title">Invitation List</h2>
                <?php if(!empty($errors)): ?>
                        <?php foreach($errors as $error): ?>
                            <span style="color: red; font-size: 1.2rem; font-weight: 700; display: inline-block; padding: 5px 30px;">
                                <?php echo $error ?>
                            </span>
                        <?php endforeach; ?>
                    <?php endif; ?>
                <div class="card-container">
                    <?php  foreach($allEvents as $i => $event): ?>
                        <div class="card">
                            <div class="text-container">
                                <div class="textform textfrom-address">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p><?php echo $event['address']; ?></p>
                                </div>
                                <div class="textform textfrom-time">
                                    <i class="fa-regular fa-clock"></i>
                                    <p class="grid-title">Time:</p>
                                    <p><?php echo $event['time']; ?></p>
                                </div>
                                <div class="textform textfrom-capacity">
                                    <i class="fa-solid fa-users"></i>
                                    <p class="grid-title">Capacity:</p>
                                    <p><?php echo $event['capacity']; ?></p>
                                </div>
                                <div class="textform textfrom-des">
                                    <i class="fa-solid fa-circle-exclamation"></i>
                                    <p class="grid-title">Description:</p>
                                    <p><?php echo $event['description']; ?></p>
                                </div>
                                <div class="textform textfrom-create-by">
                                    <i class="fa-solid fa-user"></i>
                                    <p class="grid-title">Create By:</p>
                                    <p><?php echo $event['name']; ?></p>
                                </div>
                            </div>
                            <div class="btn-container">
                                <a href="/invitations/update?id=<?php echo $event['id']; ?>" class="btn btn-primary">
                                    Update
                                </a>
                                <form action="/invitations/delete" method="post" style="display: inline-block;">
                                    <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                                    <button class="request-btn js-request-btn btn btn-danger border-0" type="submit">Delete</button>
                                </form>
                                
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/c5f1dc3da2.js" crossorigin="anonymous"></script>
    
</body>
</html>
