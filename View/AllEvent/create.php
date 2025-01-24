<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Launch</title>
    <link rel="stylesheet" href="css/create.css">
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
                
                <h2 class="grid-title">Create</h2>
                <div class="card-container">
                    <div class="form-container2">
                        <form action="/create" method="post" enctype="multipart/form-data">
                            <div class="input input1">
                                <label for="date">Time</label>
                                <div class="input-sub">                 
                                    <input type="date" id="date" name="date" required>
                                    <i class="fa-solid fa-calendar-days"></i>
                                </div>
                                
                            </div>
                            <div class="input input2">
                                <label for="capacity">Capacity</label>
                                <div class="input-sub">
                                    <input type="text" id="capacity" name="capacity" required placeholder="Capacity">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                
                            </div>
                            <div class="input input2">
                                <label for="Description">Description</label>
                                <div class="input-sub">
                                    <textarea name="description" id="description" cols="40" rows="4"></textarea>
                                </div>
                            </div>
                            <div class="input input2">
                                <label for="address">Address</label>
                                <div class="input-sub">
                                    <input type="text" id="address" name="address" required placeholder="Address">
                                    <i class="fa-solid fa-house"></i>
                                </div>
                            </div>
                            <?php if(!empty($errors)): ?>
                                <div>
                                    <?php foreach($errors as $error): ?>
                                        <span style="color: red; font-size: 1.2rem; font-weight: 700;">
                                            <?php echo $error. ' ' ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if(!empty($messages)): ?>
                                <div>
                                    <?php foreach($messages as $message): ?>
                                        <span style="color: green; font-size: 1.2rem; font-weight: 700;">
                                            <?php echo $message. ' ' ?>
                                        </span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <div class="input-create-btn">
                                <button class="create-btn" type="submit">
                                    Create
                                </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/c5f1dc3da2.js" crossorigin="anonymous"></script>
</body>
</html>