<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <fieldset>
    <!-- We add an enctype in order to upload images we use multipart/form-data -->
        <form enctype="multipart/form-data" action="#" method="POST">
            <h1>Realtime Chat App</h1>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" required>
            <label for="email">Email</label>
            <input type="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <label for="userfile">Select an image</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="300000">
            <input type="file" name="userfile">
            <input type="submit" name="submit" value="Start to chat">
        </form>
        <a href="login">You already have an account ? <span>Login Here</span></a>
    </fieldset>
</body>
</html>