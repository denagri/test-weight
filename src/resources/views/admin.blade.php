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
                <a href="{{ route('weight.goal.setting') }}" class="header-setting-btn" style="text-decoration: none; display: inline-flex; align-items: center;">
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
                    <form class="search-box">
                        <!-- 〇〇～〇〇のやり方 -->
                        <input type="text"> 
                        <div class="search-btn">検索</div>
                    </form>
                    <!-- モーダル表示 -->
                    <div class="add-btn">
                        <button type="button" class="openBtn">データ追加</button>
                        
                        <dialog class="modal">
                            <form action="{{ route('weight.store') }}" method="post">
                                @csrf
                                <div class="modal-header">Weight Logを追加</div>
                                <div class="modal-main">
                                    <div class="add-box">
                                        <div class="add-title-box">
                                            <div class="add-title">日付</div>
                                            <div class="add-required">必須</div>
                                        </div>
                                        <input type="date" name="date" value="{{ old('date') }}">
                                    </div>
                                    <div class="add-box">
                                        <div class="add-title-box">
                                            <div class="add-title">体重</div>
                                            <div class="add-required">必須</div>
                                        </div>
                                        <div class="weight-box">
                                            <input type="text" name="weight" value="{{ old('weight') }}">kg
                                        </div>
                                    </div>
                                    <div class="add-box">
                                        <div class="add-title-box">
                                            <div class="add-title">摂取カロリー</div>
                                            <div class="add-required">必須</div>
                                        </div>
                                        <div class="calories-box">
                                            <input type="text" name="calories" value="{{ old('calories') }}">cal
                                        </div>
                                    </div>
                                    <div class="add-box">
                                        <div class="add-title-box">
                                            <div class="add-title">運動時間</div>
                                            <div class="add-required">必須</div>
                                        </div>
                                        <input type="text" name="exercise_time" value="{{ old('exercise_time') }}">
                                    </div>
                                    <div class="add-box">
                                        <div class="add-title-box">
                                            <div class="add-title">運動内容</div>
                                        </div>
                                        <textarea name="exercise_content" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="footer-btn">
                                        <button type="button" class="closeBtn">戻る</button>
                                        <button type="submit" class="register-btn">登録</button>
                                    </div>
                                </div>
                            </form>
                        </dialog>
                    </div>
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
                        <td>
                            <!-- 鉛筆マークでindex.blade.phpへ移動 -->
                            <a href="{{ route('weight.detail',['weightLogId' =>$weightLog->id]) }}" class="pencil-btn">
                                <img src="{{ asset('image/pencil.svg') }}" alt="鉛筆" width=20px height=20px>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                {{ $weightLogs->appends(request()->query())->links('vendor.pagination.custom') }}
            </div>
        </div>
    </main>

<script>
  const modals = document.getElementsByClassName('modal');
  const openBtns = document.getElementsByClassName('openBtn');
  const closeBtns = document.getElementsByClassName('closeBtn');

for (let i = 0; i < modals.length; i++) {
    openBtns[i].addEventListener('click', () => {
    modals[i].showModal();
  });
  closeBtns[i].addEventListener('click', () => {
    modals[i].close();
  });
  }
</script>

</body>
</html>