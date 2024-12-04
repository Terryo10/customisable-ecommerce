<div>
    <header class="header-section section sticker">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <!-- logo -->
                    <div class="header-logo">
                        <a href="/"><img src="/logo.png" alt="main logo" style="height: 80px"></a>
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
                                    class="loginModal">Login / SignUp</a>
                                @endif

                            </li>

                            <li><a href="#!" data-bs-toggle="modal" data-bs-target="{{" #quickViewModalSearch"}}"
                                    class="search-toggle"><i style="font-size: 15px;" class="pe-7s-search"></i></a></li>
                        </ul>
                    </nav>
                    <div class="header-option-btns d-flex">
                        <!-- header-search -->
                        {{-- <div class="header-search">
                            <button class="search-toggle" data-bs-toggle="modal" data-bs-target="{{"
                                #quickViewModalSearch"}}"><i class="pe-7s-search"></i></button>
                            <div class="header-search-form">
                                <form method="POST" action="/search">
                                    @csrf
                                    <input type="text" name="search" placeholder="Search">
                                    <button type="submit"><i class="fa fa-long-arrow-right"></i></button>
                                </form>
                            </div>
                        </div> --}}

                    </div>

                </div>
                <div class="mobile-menu"></div>
            </div>
        </div>
    </header>
</div>