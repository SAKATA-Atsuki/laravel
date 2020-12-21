<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>会員情報変更</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <p class="mypage-edit-information-title">会員情報変更</p>
    <form action="{{ route('mypage.edit.information.check') }}" method="POST">
        @csrf
        <div class="mypage-edit-information-content">
            <div>
                <span>氏名　　姓　</span>
                <input type="text" name="name_sei" @if (old('name_sei')) value="{{ old('name_sei') }}" @else value="{{ Auth::user()->name_sei }}" @endif size="17">
                <span>　名　</span>
                <input type="text" name="name_mei" @if (old('name_mei')) value="{{ old('name_mei') }}" @else value="{{ Auth::user()->name_mei }}" @endif size="17">
            </div>
            @error('name_sei')
                <p class="error">{{ $message }}</p>
            @enderror
            @error('name_mei')
                <p class="error">{{ $message }}</p>
            @enderror
            <br>
            <div>
                <span>ニックネーム　　</span>
                <input type="text" name="nickname" @if (old('nickname')) value="{{ old('nickname') }}" @else value="{{ Auth::user()->nickname }}" @endif size="40">
            </div>
            @error('nickname')
                <p class="error">{{ $message }}</p>
            @enderror
            <br>
            <div>
                <span>性別　　　</span>
                @foreach (config('master.gender') as $index => $value)
                    @if (old('gender'))
                        <input type="radio" name="gender" value="{{ $index }}" @if (old('gender') == $index) checked @endif>{{ $value }}
                    @else
                        <input type="radio" name="gender" value="{{ $index }}" @if (Auth::user()->gender == $index) checked @endif>{{ $value }}
                    @endif
                @endforeach
            </div>
            @error('gender')
                <p class="error">{{ $message }}</p>
            @enderror
            <div class="mypage-edit-information-button">
                <input type="submit" value="確認画面へ" class="mypage-edit-information-button-1">
                <br><br>
                <a href="{{ route('mypage') }}" class="mypage-edit-information-button-2">マイページに戻る</a>    
            </div>
        </div>    
    </form>
</body>
</html>