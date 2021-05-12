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
                <div class="error-txt">錯誤訊息唷!!</div>
                <div class="name-details">
                    <div class="field input">
                        <label>暱稱</label>
                        <input type="text" name="nick_name" placeholder="請輸入你的暱稱" required>
                    </div>
                </div>
                <div class="field input">
                    <label>Email帳號</label>
                    <input type="email" name="email" placeholder="作為登入的email" required>
                </div>
                <div class="field input">
                    <label>密碼</label>
                    <input type="password" name="password" placeholder="請輸入密碼" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label>選擇大頭貼</label>
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
                    <input type="submit" value="前往聊天室">
                </div>
            </form>
            <div class="link">已經註冊？ <a href="login.php">前往登入</a></div>
        </section>
    </div>

    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/photo-select.js"></script>
    <script src="javascript/signup.js"></script>
</body>
</html>