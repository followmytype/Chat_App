<?php
    include_once "classes/Message.php";

    use Matt\Message as Message;

    $messageOb = new Message($conn);

    if (count($users)) {
        foreach ($users as $user) {
            if ($user['user_id'] == $_SESSION['user_id'])
                continue;

            $message = $messageOb->getLastTalk($_SESSION['user_id'], $user['user_id']);

            if ($message['msg']) {
                $message['msg'] = mb_strlen($message['msg'], "utf-8") > 16 ? mb_substr($message['msg'], 0, 16, 'utf-8') . '...' : $message['msg'];
                $message['msg'] = $message['sender_id'] == $_SESSION['user_id'] ? '你：' . $message['msg'] : $message['msg'];
            } else {
                $message['msg'] = '開始聊天～';
            }

            $user['status'] = $user['status'] ? '' : 'offline';
            echo "<a href='chat.php?user_id=$user[user_id]'>
                    <div class='content'>
                    <img src='images/$user[image_url]'>
                    <div class='details'>
                        <span>$user[nick_name]</span>
                        <p>$message[msg]</p>
                    </div>
                    </div>
                    <div class='status-dot $user[status]'><i class='fas fa-circle'></i></div>
                </a>";
        }
    } else {
        echo "無使用者";
    }