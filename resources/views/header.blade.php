@extends('index')
@section('header')
    <div class='header'>
        <div class="header-left">
            <div>
                <h3>BLOGz</h3>
            </div>
            <div class="search-bar">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Search Facebook"/>
            </div>
        </div>
        <div class="header-center">
            <div class="header-option header-option-active"><i class="fas fa-home"></i></div>
            <div class="header-option"><i class="fas fa-flag"></i></div>
            <div class="header-option"><i class="fas fa-heart"></i></div>
            <div class="header-option"><i class="fas fa-store"></i></div>
            <div class="header-option"><i class="fas fa-archive"></i></div>
        </div>
        <div class="header-right">
            <div class="account">
                <div class="header-right-profile">
                    <i class="fas fa-user-circle"></i>
                    {{-- <Avatar src="data:image/jpeg;base64,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"/>
                    --}}<h4>Lorn</h4>
                </div>
            </div>
            <div class="header-right-option"><i class="fas fa-bars"></i></div>
            <div class="header-right-option"><i class="fab fa-facebook-messenger"></i></div>
            <div class="header-right-option"><i class="fas fa-bell"></i></div>
            <div class="header-right-option"><i class="fas fa-caret-down"></i></div>
        </div>
    </div>
@endsection