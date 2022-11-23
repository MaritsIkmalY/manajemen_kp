<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Dashboard</title>
</head>
<body>
    <h1>Login bro</h1>
    <form action="{{route('loginUser.auth')}}" method='post'>
    @csrf
    <div>
        <label for="email">Username</label>
        <input type="email" name='email' id='email'>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name='password' id='password'>
    </div>
    <button name='submit'>submit</button>
    </form>
</body>
</html>