<?php
    if (count($users)) {
        foreach ($users as $user) {
            if ($user['user_id'] == $_SESSION['user_id']) {
            continue;
            }
            $user['status'] = $user['status'] ? '' : 'offline';
            echo "<a href='chat.php?user_id=$user[user_id]'>
                    <div class='content'>
                    <img src='images/$user[image_url]'>
                    <div class='details'>
                        <span>$user[nick_name]</span>
                        <p>The test message</p>
                    </div>
                    </div>
                    <div class='status-dot $user[status]'><i class='fas fa-circle'></i></div>
                </a>";
        }
    } else {
        echo "No user are avaible to chat.";
    }