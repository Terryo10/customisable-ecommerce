<div>
    <header class="header-section section sticker">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <!-- logo -->
                    <div class="header-logo">
                        <a wire:navigate href="/"><img src="template/outside/img/logo.png" alt="main logo"></a>
                    </div>
                </div>
                <div class="col-auto d-flex">
                    <!-- header-search & total-cart -->
                    <nav class="main-menu">
                        <ul>
                            <li><a wire:navigate href="/">Home</a>
                                @if(Auth::check())
                            <li><a wire:navigate href="/orders">Orders</a></li>
                            <li><a href="/logout">LogOut</a>
                                @else
                                <!-- User is not logged in -->
                            <li><a href="/login-google">Login with Google</a>
                                @endif


                            </li>


                            <li><a href="#" data-bs-toggle="modal"
                                    data-bs-target={{"#quickViewModalContact"}}>Contact</a></li>
                        </ul>
                    </nav>

                </div>
                <div class="mobile-menu"></div>
            </div>
        </div>
    </header>
    <livewire:contact-modal>
</div>