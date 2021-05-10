<?php 
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("location: login.php");
    }
?>
<?php include_once "header.php"; ?>
<?php 
    include_once "php/classes/DBLink.php";
    include_once "php/classes/Users.php";
    use Matt\DBLink as DB;
    use Matt\Users as Users;

    $database = new DB();
    $conn = $database->connect();
    $user = new Users($conn);
    $user = $user->getUserByUserId($_GET['user_id']);
?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="images/<?php echo $user['image_url']; ?>">
                <div class="details">
                    <span><?php echo $user['nick_name']; ?></span>
                    <p><?php echo $user['status'] ? '線上' : '離線';?></p>
                </div>
            </header>
            <div class="chat-box">
            </div>
            <form action="" class="typing-area">
                <input type="hidden" name="sender_id" value="<?php echo $_SESSION['user_id']; ?>">
                <input type="hidden" name="receiver_id" value="<?php echo $_GET['user_id']; ?>">
                <input type="text" name="message" class="input-field" placeholder="Type a message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>
</body>
</html>