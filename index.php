<?php

require_once __DIR__."/src/models/User.php";
require_once __DIR__."/src/models/Message.php";

require_once __DIR__."/src/repositories/UserRepository.php";
require_once __DIR__."/src/repositories/MessageRepository.php";

$userRepository = new UserRepository();
$messageRepository = new MessageRepository();

?>


<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Render Results</title>

</head>

<body>
    <h1>Echo Messages for Chat ID = 3 Here as HTML</h1>
    <div>
        <ul>
        <?php foreach ($messageRepository->findByChatId(3) as $message):?>
            <li><?php echo $message->message ?> </li>
        <?php endforeach; ?>
        </ul>
    </div>


    <h1>Render Messages for Chat ID = 8 Here as JSON</h1>

    <div>
        <ul>
            <?php foreach ($messageRepository->findByChatId(8) as $message):?>
                <pre><?php echo htmlentities(json_encode($message)); ?> </pre>
            <?php endforeach; ?>
        </ul>
    </div>

    <h1>Render User ID = 100 Here as JSON</h1>
    <div>
        <ul>
            <?php foreach ($userRepository->findById(100) as $user):?>
                <pre><?php echo json_encode($user); ?> </pre>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <h1>Echo Message ID = 459 Here as HTML</h1>
    <div>
        <ul>
            <?php foreach ($messageRepository->findByMessageId(459) as $message):?>
                <li><?php echo htmlentities($message->message) ?> </li>
            <?php endforeach; ?>
        </ul>
    </div>

</body>
</html>