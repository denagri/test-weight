<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight</title>
     <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/goal.css') }}" />
</head>
<body>
    <header>
        <div class="header-box">
            <p>PiGLy</p>
            <div class="header-btn-box">
                <button type="button" class="header-setting-btn" onclick="location.href='{{ route('weight.goal.setting') }}'">
                    <img src="{{ asset('image/setting.svg') }}" alt="歯車" width=20px height=20px>目標体重設定
                </button>
                <form class="logout-form" action="/logout" method="post" >
                @csrf
                    <button type="submit" class="header-logout-btn">
                        <img src="{{ asset('image/logout.svg') }}" alt="ログアウト" width=20px height=20px>ログアウト
                    </button>
                </form>
            </div>
        </div>
    </header>
    <main>
        <form class="main-box" action="{{ route('weight.goal') }}" method="post">
            @csrf
            @method('put')
            <h1>目標体重設定</h1>
            <div class="goal-data">
              <input type="number" step="0.1" name="target_weight" value="{{Auth::user()->weightTarget->target_weight ??'' }}">kg
            </div>
            <div class="button-box">
                <a href="{{ route('home') }}" class="return-btn" style="text-decoration: none; display: inline-flex; align-items: center;">戻る
                </a>
                <div class="logout-form">
                    <button type="submit" class="update-btn">更新</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>