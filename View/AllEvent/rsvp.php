<h2 class="grid-title">Reserve Invitation List</h2>
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
                <form action="/rsvp/delete" method="post" style="display: inline-block;">
                    <input type="hidden" name="id" value="<?php echo $event['id']; ?>">
                    <button class="request-btn js-request-btn btn btn-danger border-0" type="submit">Delete</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
</div>