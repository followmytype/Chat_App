<?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("location: login.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="images/lovely.jpg">
                    <div class="details">
                        <span>Matt Chen</span>
                        <p>Active Now</p>
                    </div>
                </div>
                <a href="" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
                <a href="">
                    <div class="content">
                        <img src="images/lovely.jpg">
                        <div class="details">
                            <span>Matt Chen</span>
                            <p>The test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a href="">
                    <div class="content">
                        <img src="images/lovely.jpg">
                        <div class="details">
                            <span>Matt Chen</span>
                            <p>The test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a href="">
                    <div class="content">
                        <img src="images/lovely.jpg">
                        <div class="details">
                            <span>Matt Chen</span>
                            <p>The test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a href="">
                    <div class="content">
                        <img src="images/lovely.jpg">
                        <div class="details">
                            <span>Matt Chen</span>
                            <p>The test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a href="">
                    <div class="content">
                        <img src="images/lovely.jpg">
                        <div class="details">
                            <span>Matt Chen</span>
                            <p>The test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
                <a href="">
                    <div class="content">
                        <img src="images/lovely.jpg">
                        <div class="details">
                            <span>Matt Chen</span>
                            <p>The test message</p>
                        </div>
                    </div>
                    <div class="status-dot"><i class="fas fa-circle"></i></div>
                </a>
            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>
</body>
</html>