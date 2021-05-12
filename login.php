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
                <div class="error-txt">錯誤訊息唷!!</div>
                <div class="field input">
                    <label>Email</label>
                    <input type="text" placeholder="請輸入登入信箱" name="email" required>
                </div>
                <div class="field input">
                    <label>密碼</label>
                    <input type="password" placeholder="請輸入登入密碼" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field buttom">
                    <input type="submit" value="前往聊天室">
                </div>
            </form>
            <div class="link">還沒註冊嗎？ <a href="index.php">前往註冊</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>