<div class="container-fluid p-4 mt-5 border rounded bg-secondary text-white" style="width: 400px;">
    <h1 class="text-center">Sign in</h1>

    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger font-monospace">
                <?php foreach($errors as $error): ?>
                    <span style="color: rgb(245, 42, 38); font-weight: 700; font-size: 18px">
                        <?php echo $error; ?>
                    </span>    
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary mb-4">Login</button>
        <p class="fs-monospace" style="font-size: 14px;">If you don't have an account? Go to <a href="/register" class="fw-bold" style="color:rgb(98, 234, 255); font-size: 18px;">Register Page</a></p>
    </form>
</div>