<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight</title>
     <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/register-step1.css') }}" />
</head>
<body>
    <form class="register-box" action="/register" method="post">
        @csrf
            <div class="text-box">
                <h1>PiGLy</h1>
                <h2>新規会員登録</h2>
                <h3>STEP1アカウント情報の登録</h3>
            </div>
            <div class="data-box">
                <div class="input-text">お名前</div>
                <div class="input-box"><input type="text" name="name" value="{{ old('name') }}"/>
                </div>
                <div class="form-error">
                    @error('name')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="data-box">
                <div class="input-text">メールアドレス</div>
                <div class="input-box"><input type="email" name="email" value="{{ old('email') }}"/>  
                </div>
                <div class="form-error">
                    @error('email')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="data-box">
                <div class="input-text">パスワード</div>
                <div class="input-box"><input type="password" name="password" />  
                </div>
                <div class="form-error">
                    @error('password')
                    <div style="color:red;">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- 目標体重の新規登録の行き方 -->
            <div class="register-form" action="/first" method="post" >
                @csrf
                <button type="submit" class="next-btn">次に進む</button>
            </div>
             <a href="/login">ログインはこちら</a>
    </form>
</body>
</html>