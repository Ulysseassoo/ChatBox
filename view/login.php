<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <fieldset>
        <form action="connexion" method="POST">
            <h1>Realtime Chat App</h1>
            <label for="email">Email</label>
            <input type="email" name="email" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="submit" value="Login">
        </form>
        <a href="homepage">You don't have any account ? <span>Sign up here</span></a>
    </fieldset>
</body>
</html>