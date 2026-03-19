<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight</title>
     <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>
<body>
    <header>
        <div class="header-box">
            <p>PiGLy</p>
            <div class="header-btn-box">
                <button type="button" class="header-setting-btn" onclick="location.href='/goal'">
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
        <div class="main-box">
            <div class="contents-box">
                <h1>Weight Log</h1>
                <div class="current-data">
                    <div class="data-box">
                        <div class="data-title">日付</div>
                        <input type="date" class="date-data">
                    </div>
                    <div class="data-box">
                        <div class="data-title">体重</div>
                        <div class="weight-data"><input type="text" class="weight-data-input" placeholder="50.0">kg
                        </div>
                    </div>
                    <div class="data-box">
                        <div class="data-title">摂取カロリー</div>
                        <div class="cal-data"><input type="text" class="cal-data-input" placeholder="1200">cal
                        </div>     
                    </div>
                    <div class="data-box">
                        <div class="data-title">運動時間</div>
                        <input type="text" class="time-data" placeholder="00:00">
                    </div>
                    <div class="data-box">
                        <div class="data-title">運動内容</div>
                        <textarea class="content-data" rows="5" cols="30" placeholder="運動内容を追加">
                        </textarea>
                    </div>
                </div>
                <div class="button-box">
                    <div class="button-nondelete">
                        <button type="button" class="return-btn" onclick="location.href='/admin'">戻る</button>
                        <form class="update-form" action="/admin" method="post" >
                        @csrf
                            <button type="submit" class="update-btn">更新</button>
                        </form>
                    </div>
                    <div class="button-delete" >
                        <img src="{{ asset('image/trashbox.svg') }}" alt="ごみ箱" width=20px height=20px class="delete-btn">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>