<div>
    <header class="header-section section sticker">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <!-- logo -->
                    <div class="header-logo">
                        <a href="/"><img src="/template/outside/img/logo.png" alt="main logo"></a>
                        {{-- <a wire:navigate href="/"><img src="/template/outside/img/logo.png" alt="main logo"></a> --}}
                    </div>
                </div>
                <div class="col-auto d-flex">
                    <!-- header-search & total-cart -->
                    <nav class="main-menu">
                        <ul>
                            <li><a href="/">Home</a>
                                @if(Auth::check())
                            <li><a href="/orders">Orders</a></li>
                            <li><a wire:navigate href="/logout">LogOut</a>
                                @else
                                <!-- User is not logged in -->
                            <li><a href="#!" data-bs-toggle="modal" data-bs-target={{"#quickViewModalLogin"}}
                                    class="loginModal">Login with Google</a>
                                @endif


                            </li>


                            <li><a href="#!" data-bs-toggle="modal" data-bs-target="{{" #quickViewModalContact"}}"
                                    class="contactModal">Contact</a></li>
                        </ul>
                    </nav>
                    <div class="header-option-btns d-flex">
                        <!-- header-search -->
                        <div class="header-search">
                            <button class="search-toggle"><i class="pe-7s-search"></i></button>
                            <div class="header-search-form">
                                <form method="POST" action="/search">
                                    @csrf
                                    <input type="text" name="search" placeholder="Search">
                                    <button type="submit"><i class="fa fa-long-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="mobile-menu"></div>
            </div>
        </div>
    </header>
    <livewire:contact-modal>
        <livewire:login-modal>
</div>