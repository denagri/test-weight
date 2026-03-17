<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weight</title>
     <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
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
        <form class="main-box">
            <div class="title-data-box">
                <div class="goal-weight">
                    <div class="title-data-ttl">目標体重</div>
                    <div class="title-data-record">45.0kg</div>
                </div>
                <div class="rest-weight">
                    <div class="title-data-ttl">目標まで</div>
                    <div class="title-data-record">-1.5kg</div>
                </div>
                <div class="latest-weight">
                    <div class="title-data-ttl">最新体重</div>
                    <div class="title-data-record">46.5kg</div>
                </div>
            </div>
            <div class="record-data-box">
                <div class="record-data-header">
                    <div class="search-box">
                        <!-- 〇〇～〇〇のやり方 -->
                        <input type="text"> 
                        <div class="search-btn">検索</div>
                    </div>
                    <div class="add-btn">データ追加</div>
                </div>
                <table class="record-data-main">
                    <tr>
                        <th>日付</th>
                        <th>体重</th>
                        <th>食事摂取カロリー</th>
                        <th colspan="2">運動時間</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>鉛筆マーク</td>
                    </tr>
                </table>
                <!-- ページネーション -->
            </div>
        </form>
    </main>
</body>
</html>