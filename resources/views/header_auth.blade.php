
<div id="header" class="header">
    <div class="home">
        <a aria-label="Home" href="{{route('home')}}">
            <p>Home</p>
        </a>
    </div>

    <div class="header-user">
        <div class="dropdown">
            <button  class="" ass="dropdown-toggle" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-info">
                    <img src="{{ asset(\App\Http\Controllers\Authentication::user()->getPathToAvatar()) }}" class="user-avatar">
                    <div class="user-name"> {{ \App\Http\Controllers\Authentication::user()->login }}</div>
                    <span id="arrow">▼</span>
                </div>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('profile.auth')}}">PROFILE</a>
                <a class="dropdown-item" href="{{route('logout')}}">LOG OUT</a>
                <a class="dropdown-item" href="{{ route('post.create') }}">NEW POST</a>
                <div class="dropdown-divider"></div>    
                <a class="dropdown-item" href="{{ route('me.edit') }}">CUSTOMIZE</a>
            </div>
        </div>
    </div>

</div>