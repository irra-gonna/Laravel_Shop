<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
</head>
<body>
    <div>
        <form action="{{route('')}}" method="POST">
        <input type="text" placeholder="username" name='username'>
        <input type="email" placeholder="email"  name='email'>
        <input type="password" placeholder="password"  name='password'>
        <input type="password" placeholder="password_confirmation" name='password_confirmation'>
        <input type="submit" name="save">
        </form>
    </div>
</body>
</html>
