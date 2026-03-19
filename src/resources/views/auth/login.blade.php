<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight</title>
     <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>
<body>
    <form class="login-box" action="/login" method="post">
        @csrf
            <div class="text-box">
                <h1>PiGLy</h1>
                <h2>ログイン</h2>
            </div>
            <div class="data-box">
                <div class="input-text">メールアドレス</div>
                <div class="input-box"><input type="email" name="email" class="input-data" value="{{ old('email') }}" />
                </div>
                <div class="form-error">
                    @error('email')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="data-box">
                <div class="input-text">パスワード</div>
                <div class="input-box"><input type="password" name="password" class="input-data" />
                </div>
                <div class="form-error">
                    @error('password')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="login-form" action="/logout" method="post" >
                <button type="submit" class="login-btn">ログイン</button>
            </div>
            <div class="register-btn"></div>
            <a href="/register/step1">アカウント作成はこちら</a>
    </form>
</body>
</html>