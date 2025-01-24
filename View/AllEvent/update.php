
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link rel="stylesheet" href="../css/update.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>
<body>
    <div class="form-container2">
        <div >
            <p style="text-align: center; font-weight: 800; font-size: 1.8rem; color: white;">Update</p>
        </div>
        <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            
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
                    <input type="text" id="capacity" name="capacity" value="<?php echo $getEvent['capacity']; ?>" required placeholder="Capacity">
                    <i class="fa-solid fa-users"></i>
                </div>
                
            </div>
            <div class="input input2">
                <label for="Description">Description</label>
                <div class="input-sub">
                    <textarea name="description" id="description" cols="40" rows="4"><?php echo trim($getEvent['description']); ?></textarea>
                </div>
            </div>
            <div class="input input2">
                <label for="address">Address</label>
                <div class="input-sub">
                    <input type="text" id="address" name="address" value="<?php echo $getEvent['address']; ?>" required placeholder="Address">
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
                    Update
                </button>
            </div>
            
        </form>
    </div>
    <script src="https://kit.fontawesome.com/c5f1dc3da2.js" crossorigin="anonymous"></script>
</body>
</html>