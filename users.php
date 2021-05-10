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
    $user = $user->getUserByUserId($_SESSION['user_id']);
?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="images/<?php echo $user['image_url']; ?>">
                    <div class="details">
                        <span><?php echo $user['nick_name']; ?></span>
                        <p><?php echo $user['status'] ? 'Active now' : 'offline'; ?></p>
                    </div>
                </div>
                <a href="php/logout.php?user_id=<?php echo $_SESSION['user_id']; ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>
</body>
</html>