<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
</head>
<body>
    <div class="active-user">
    <!-- For the online session you need to check for the time -->
    <?php foreach ($users as $user): ?>
        <div>
            <br>Email : <?php echo $user['email']; ?>
            
            <br>Img : <img src=data:image/jpeg;base64,<?php echo base64_encode($user['profile_img']); ?> alt="something">
        </div>
    <?php endforeach ?>
    </div>
</body>
</html>