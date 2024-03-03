<header class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.html"
        ><span class="rzhad">Rzhad</span><span class="bids">le</span></a
        >
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('disciplines.list')}}">Мої дисципліни</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="grades.html">Оцінки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('stats')  }}">Моя статистика</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="deadline.html">Майбутні дедлайни</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="notification-icon"><span class="fa fa-bell"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.html">Профіль</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="fa fa-sign-out-alt"></span> Вийти
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Увійти</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<div class="notification-popup" id="notification-popup">
    <button class="btn btn-primary btn-sm" id="close-notification-btn" style="position: absolute; top: 5px; right: 5px;">
        <span class="fa fa-times"></span>
    </button>
    <h4>Нещодавні повідомлення</h4>
    <ul id="recent-notifications"></ul>
    <button class="btn btn-primary btn-sm" id="view-all-notifications-btn">
        Переглянути всі повідомлення
    </button>
</div>

