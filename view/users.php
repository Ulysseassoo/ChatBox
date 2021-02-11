<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <div class="users_container">
    <!-- For the online session you need to check for the time -->
    <!-- We show in the active user, the user connected from the session -->
        <div class="active-user">
            <br>Pseudo : <?php echo $userManager->FetchUserFromSession($_SESSION['email'])['pseudo']; ?>
            <br>Email : <?php echo $userManager->FetchUserFromSession($_SESSION['email'])['email']; ?>
            <br>Img : <img src=data:image/jpeg;base64,<?php echo base64_encode($userManager->FetchUserFromSession($_SESSION['email'])['profile_img']); ?> alt="something" width="25%">
            <br>Last Time online : <?php echo TimeConversion($userManager->FetchUserFromSession($_SESSION['email'])['recent_connexion']) ?>
            
            <a href="logout">Logout</a>
        </div>
        <div class="other-users">
            <?php if(isset($users)): ?>
                <?php foreach ($users as $user): ?>
                    <div>
                        <br>Email : <?php echo $user['email']; ?>
                        <br>Img : <img src=data:image/jpeg;base64,<?php echo base64_encode($user['profile_img']); ?> alt="something" width="25%">
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <div>
                    <?php var_dump($users); ?>
                    <p>There's nobody to chat who is online right now !</p>
                </div>
            <?php endif ?>
        </div>
    </div>
</body>
</html>