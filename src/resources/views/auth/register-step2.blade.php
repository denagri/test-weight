<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register-step2.css') }}" />
</head>
<body>
    <form class="first-box" action="{{ route('register.step2.post')}} " method="post">
        @csrf
        <div class="text-box">
            <h1>PiGLy</h1>
            <h2>新規会員登録</h2>
            <h3>STEP2 体重データの入力</h3>
        </div>
        <div class="data-box">
            <div class="input-text">現在の体重</div>
            <div class="input-box"><input name="current" type="text" value="{{ old('current') }}">kg
            </div>
            <div class="form-error">
                @error('current')
                <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="data-box">
            <div class="input-text">目標の体重</div>
            <div class="input-box"><input name="goal" type="text" value="{{ old('goal') }}">kg  
            </div>
            <div class="form-error">
                @error('goal')
                <div style="color:red;">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="logout-form">
            <button type="submit" class="create-btn">アカウント作成</button>
        </div>
    </form>
</body>
</html>