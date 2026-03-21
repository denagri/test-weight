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
                <a href="{{ route('weight.goal') }}" class="header-setting-btn" style="text-decoration: none; display: inline-flex; align-items: center;">
                    <img src="{{ asset('image/setting.svg') }}" alt="歯車" width="20px" height="20px">
                    目標体重設定
                </a>
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
            <div class="title-data-box">
                <div class="goal-weight">
                    <div class="title-data-ttl">目標体重</div>
                    <div class="title-data-record">{{ $weightTarget->target_weight ??'0.0' }}
                        <span?>kg</span>
                    </div>
                </div>
                <div class="rest-weight">
                    <div class="title-data-ttl">目標まで</div>
                    <div class="title-data-record">
                        @if(isset($weightTarget) && isset($latestWeight))
                            {{-- 最新体重 - 目標体重 --}}
                            {{ number_format($latestWeight->weight - $weightTarget->target_weight, 1) }}kg
                        @else
                            - kg
                        @endif
                    </div>
                </div>
                <div class="latest-weight">
                    <div class="title-data-ttl">最新体重</div>
                    <div class="title-data-record">{{ $latestWeight->weight ??'0.0' }}
                        <span?>kg</span>
                    </div>
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
                        <th>運動時間</th>
                        <th></th>
                    </tr>
                    @foreach ($weightLogs as $weightLog)
                    <tr>
                        <td>{{$weightLog->date->format('Y/m/d')}}</td>
                        <td>{{$weightLog->weight}}kg</td>
                        <td>{{$weightLog->calories}}</td>
                        <td>{{$weightLog->exercise_time}}</td>
                        <td><img src="{{ asset('image/pencil.svg') }}" alt="鉛筆" width=20px height=20px></td>
                    </tr>
                    @endforeach
                </table>
                <!-- ページネーション -->
            </div>
        </div>
    </main>
<dialog id="pencilModal">
  <div class="modal-content">
    <p>モーダルが表示されました！</p>
    <button id="closeModal">閉じる</button>
  </div>
</dialog>
</body>
</html>