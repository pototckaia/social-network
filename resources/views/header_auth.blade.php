
<div id="header" class="header">
    <div class="home">
        <a aria-label="Home" href="{{route('home')}}">
            <p>Home</p>
        </a>
    </div>

    <div class="header-user">
        <div class="dropdown">
            <button  class="btn-drop"   type="button" aria-haspopup="true" aria-expanded="false" onclick="down()">
                <div class="user-info">
                    <img src="{{ asset(\App\Http\Controllers\Authentication::user()->getPathToAvatar()) }}" class="user-avatar">
                    <div class="user-name"> {{ \App\Http\Controllers\Authentication::user()->login }}</div>
                    <span id="arrow">▼</span>
                </div>
            </button>
            <ul class="dropdown-menu" id="dropdown_1">
                <li> <a href="{{route('profile.auth')}}">PROFILE</a></li>
                <li><a href="{{route('logout')}}">LOG OUT</a></li>
                <li><a href="{{ route('post.create') }}">NEW POST</a></li>
                <li><a href="{{ route('me.edit') }}">CUSTOMIZE</a></li>
            </ul>
        </div>
    </div>

    <script>
        function down() {
            document.getElementById("dropdown_1").classList.toggle("active");
        }

        window.onclick = function(event) {
            if (!(event.target.matches('.btn-drop'))) {

                var dropdowns = document.getElementsByClassName("dropdown-menu");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('active')) {
                        openDropdown.classList.remove('active');
                    }
                }
            }
        }

    </script>

</div>