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
        <div class="main-box">
            <div class="contents-box">
                <h1>Weight Log</h1>
                <form action="{{ route('weight.update',['weightLogId'=>$weightLog->id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <div class="current-data">
                        <div class="data-box">
                            <div class="data-title">日付</div>
                            <input type="date" name="date" class="date-data" value="{{ $weightLog->date->format('Y-m-d') }}">
                            <div class="form-error">
                                @error('date')
                                <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="data-box">
                            <div class="data-title">体重</div>
                            <div class="weight-data">
                                <input type="text" name="weight" class="weight-data-input" value="{{ $weightLog->weight}}">kg
                                <div class="form-error">
                                    @error('weight')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="data-box">
                            <div class="data-title">摂取カロリー</div>
                            <div class="cal-data">
                                <input type="text" name="calories" class="cal-data-input" value="{{ $weightLog->calories }}">cal
                                <div class="form-error">
                                    @error('calories')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>     
                        </div>
                        <div class="data-box">
                            <div class="data-title">運動時間</div>
                            <input type="text" name="exercise_time" class="time-data" value="{{ $weightLog->exercise_time }}">
                            <div class="form-error">
                                @error('exercise_time')
                                <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="data-box">
                            <div class="data-title">運動内容</div>
                            <textarea name="exercise_content" class="content-data" rows="5" cols="30">{{ $weightLog->exercise_content}}
                            </textarea>
                            <div class="form-error">
                                @error('exercise_content')
                                <div style="color:red;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="button-box">
                        <div class="button-nondelete">
                            <button type="button" class="return-btn" onclick="location.href='{{ route('home') }}'">戻る</button>
                            <button type="submit" class="update-btn">更新</button>
                        </div>
                        <a href="{{ route('weight.destroy', ['weightLogId'=>$weightLog->id]) }}" class="delete-btn" >
                            <img src="{{ asset('image/trashbox.svg') }}" alt="ごみ箱" width=20px height=20px>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>