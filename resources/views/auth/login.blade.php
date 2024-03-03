
@extends('layout')

@section('content')
<div class="wrapper">
    <div class="title">
        Вхід в акаунт
    </div>
    <form  action="{{ route('login') }}" method="POST">
        @csrf
        <div class="field">
            <input type="text" required name="email">
            <label>Email</label>
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="field">
            <input type="password" required name="password">
            <label>Password</label>
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="content">
            <div class="checkbox">
                <label for="remember-me" style="margin-top: 15px;">Запам'ятати мене:&nbsp;</label>
                <input type="checkbox" id="remember-me" name="RememberMe" style="margin-top: 15px;">
            </div>
        </div>
        <div class="field">
            <input type="submit" value="Увійти">
        </div>
    </form>
</div>
@endsection
