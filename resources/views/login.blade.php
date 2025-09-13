<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Invoice || Login</title>
  <link rel="stylesheet" href="{{url(asset('login_css/style.css'))}}">
</head>
<body>
  <div class="wrapper">
    <form action="{{url('index')}}">
      <h2>Login</h2>
        <div class="input-field">
        <input type="text" required>
        <label>Enter your username</label>
      </div>
      <div class="input-field">
        <input type="password" required>
        <label>Enter your password</label>
      </div>

      <button type="submit" >Log In</button>

    </form>
  </div>
</body>
</html>
