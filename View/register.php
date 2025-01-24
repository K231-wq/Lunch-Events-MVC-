<div class="container-fluid p-5 border mt-5 bg-dark" style="width: 800px; height: auto; color: white;">
    <h1>Register Form</h1>
    
        <?php if(!empty($errors)): ?>
            <div class="alert alert-danger font-monospace">
                <?php foreach($errors as $error): ?>
                    <span style="color: rgb(245, 42, 38); font-weight: 700; font-size: 18px">
                        <?php echo $error; ?>
                    </span>    
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        
        <form action="/register"  method="post" enctype="multipart/form-data">
            <div class="row mb-4">
                <label for="image" class="col-sm-4">Image</label>
                <div class="col-sm-5">
                    <input type="file" name="imageFile" required class="form-control">
                </div>
            </div>
            <div class="row mb-4">
                <label for="name" class="col-sm-4">Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <div class="row mb-4">
                <label for="email" class="col-sm-4">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" name="email" id="email">
                </div>
            </div>
            <div class="row mb-4">
                <label for="password" class="col-sm-4">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" id="password">
                </div>
            </div>
            <button type="Submit" class="btn btn-primary" style="width: 150px;">Register</button>
            <div class="mt-4 text-start font-monospace">
                <p>If you have a account? Go to <span style="font-weight: 800; font-size: 1.2rem;text-decoration: none;">
                    <a href="/login">Sign In</a>
                </span>
            </p>
            </div>
     
        </form>
    

</div>