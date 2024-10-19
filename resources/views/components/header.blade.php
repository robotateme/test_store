<header id="header" class="header header-fullwidth header-transparent-bg">
    <div class="container">
        <div class="header-desk header-desk_type_1">
            <div class="logo">
                <a href="/">
                    <img src="https://placehold.co/738x177/orange/black?text=Test+store&font=oswald" alt="Uomo" class="logo__image d-block" />
                </a>
            </div>

            <nav class="navigation">
                <ul class="navigation__list list-unstyled d-flex">
                    <li class="navigation__item">
                        <a href="/" class="navigation__link">Home</a>
                    </li>
                    <li class="navigation__item">
                        <a href="/cart" class="navigation__link">Cart</a>
                    </li>
                </ul>
            </nav>

            <div class="header-tools d-flex align-items-center">
                <div class="header-tools__item hover-container">
                    <x-account-link></x-account-link>
                </div>

                <a href="/cart" class="header-tools__item header-tools__cart">
                    <svg class="d-block" width="20" height="20" viewBox="0 0 20 20" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <use href="#icon_cart" />
                    </svg>
                    <x-cart-indicator></x-cart-indicator>
                </a>
            </div>
        </div>
    </div>
</header>