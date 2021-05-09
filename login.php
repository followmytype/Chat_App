<?php 
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("location: users.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="">
                <div class="error-txt">This is an error message!!</div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text" placeholder="Enter your email" name="email" required>
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder="Enter your password" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field buttom">
                    <input type="submit" value="Continue to Chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>