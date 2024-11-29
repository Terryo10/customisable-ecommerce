<div>
    {{-- The Master doesn't talk, he acts. --}}
    <livewire:header>

        @php
        $title = "Forgot Page";
        @endphp

        <livewire:header-section :title="$title">

            <div class="page-section section pt-120 pb-120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-10 col-12 mx-auto">
                            <div class="login-reg-form">
                                <form method="POST" action="/forgot-password">
                                    @csrf
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <div>
                                        @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                        @endif
                                    </div>

                                    <div class="row">
                                        <div class="col-12 mb-20">
                                            <label for="username">Your email
                                                <span class="required">*</span></label>
                                            <input name="email" id="username" required type="text"
                                                placeholder="Enter Your Email..." />
                                        </div>

                                        <div class="col-12 mb-20">
                                            <input value="Submit" name="login" class="inline" type="submit" />

                                        </div>
                                        <div class="col-12">
                                            <a href="/">Return Home</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <livewire:footer>
</div>