@auth
    <a href="{{url('/profile/orders')}}" class="header-tools__item">
        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_user" />
        </svg>
    </a>
@else
    <a href="/login" class="header-tools__item">
        <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <use href="#icon_user" />
        </svg>
    </a>
@endauth