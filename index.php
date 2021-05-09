<?php 
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Realtime Chat App</header>
            <form action="" enctype="multipart/form-data">
                <div class="error-txt">This is an error message!!</div>
                <div class="name-details">
                    <div class="field input">
                        <label>Nick Name</label>
                        <input type="text" name="nick_name" placeholder="Enter your nick name" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Enter new password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>Select image</label>
                    <ul>
                        <li class="photo"><img src="images/dog.jpg"></li>
                        <li class="photo"><img src="images/duck.png"></li>
                        <li class="photo"><img src="images/frog.jpg"></li>
                        <li class="photo"><img src="images/light.png"></li>
                        <li class="photo"><img src="images/lovely.jpg"></li>
                        <li class="photo"><img src="images/smartphone.jpg"></li>
                        <li class="photo"><img src="images/tiger.png"></li>
                        <li class="photo"><img src="images/tooth.png"></li>
                    </ul>
                    <!-- <input type="file" accept="image/*"> -->
                </div>
                <div class="field buttom">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/photo-select.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>