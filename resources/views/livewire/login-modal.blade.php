<div>
    {{-- Do your work, then step back. --}}
    <div class="d-flex justify-content-center align-items-center mt-5">
        <style type="text/css">
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }
        </style>

        <div class="block relative">
            <div class="modal fade" id="quickViewModalLogin" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="/logo.png" alt="main logo" style="height: 100px">
                            <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                margin-right: 10px;">X</span>
                        </div>
                        <div class="modal-body" style="overflow: hidden scroll;">
                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>

                            <section class="">
                                <div class="container py-5">
                                    <div class="row d-flex align-items-center justify-content-center">
                                        <div class="">
                                            <!-- Add this CSS block to your styles -->
                                            <style>
                                                .nav-link {
                                                    background-color: #dca34a; /* Default background for inactive state */
                                                    color: #fff; /* Default text color */
                                                    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
                                                }

                                                .nav-link.active {
                                                    background-color: #000 !important; /* Background for active state */
                                                    color: #fff !important; /* Text color for active state */
                                                }
                                            </style>

                                            <!-- HTML for the nav pills -->
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
        <span class="nav-link active" id="pills-home-tab"
              data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
              role="tab" aria-controls="pills-home" aria-selected="true">Sign In</span>
                                                </li>
                                                <li class="nav-item" role="presentation">
        <span class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
              data-bs-target="#pills-profile" type="button" role="tab"
              aria-controls="pills-profile" aria-selected="false">Register now</span>
                                                </li>
                                            </ul>


                                            <div class="tab-content" id="pills-tabContent">
                                                <!-- Sign In Tab -->
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                     aria-labelledby="pills-home-tab">
                                                    <form method="POST" action="/login">
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

                                                        <!-- Email input -->
                                                        <div data-mdb-input-init class="form-outline mb-1">
                                                            <input type="email" id="form1Example13" name="email"
                                                                   class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example13">Email
                                                                address</label>
                                                        </div>

                                                        <!-- Password input -->
                                                        <div data-mdb-input-init class="form-outline mb-1">
                                                            <input type="password" id="form1Example23" name="password"
                                                                   class="form-control form-control-lg" />
                                                            <label class="form-label"
                                                                   for="form1Example23">Password</label>
                                                        </div>

                                                        <div
                                                                class="d-flex justify-content-around align-items-center mb-1">
                                                            <!-- Checkbox -->
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value=""
                                                                       id="form1Example3" checked />
                                                                <label class="form-check-label" for="form1Example3">
                                                                    Remember me
                                                                </label>
                                                            </div>
                                                            <a wire:navigate href="/forgot-password">Forgot
                                                                password?</a>
                                                        </div>

                                                        <!-- Submit button -->
                                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                                class="btn btn-lg btn-block"
                                                                style="background-color: #dca34a; color: #fff;">Sign in</button>

                                                        <div class="divider d-flex align-items-center my-4">
                                                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                                                        </div>

                                                        <!-- Social Buttons -->
                                                        <a data-mdb-ripple-init class="btn btn-lg btn-block"
                                                           style="background-color: #000; color: #fff;" href="#!"
                                                           role="button">
                                                            Continue with Facebook
                                                        </a>
                                                        <a data-mdb-ripple-init class="btn btn-lg btn-block"
                                                           style="background-color: #dca34a; color: #fff;"
                                                           href="/login-google" role="button">
                                                            Continue with Google
                                                        </a>
                                                    </form>
                                                </div>

                                                <!-- Register Tab -->
                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                     aria-labelledby="pills-profile-tab">
                                                    <form method="POST" action="/register">
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

                                                        <!-- Name input -->
                                                        <div data-mdb-input-init class="form-outline mb-1">
                                                            <input type="text" id="form1Example13" name="name"
                                                                   class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example13">Your
                                                                Name</label>
                                                        </div>

                                                        <!-- Email input -->
                                                        <div data-mdb-input-init class="form-outline mb-1">
                                                            <input type="email" id="form1Example13" name="email"
                                                                   class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example13">Email
                                                                address</label>
                                                        </div>

                                                        <!-- Password input -->
                                                        <div data-mdb-input-init class="form-outline mb-1">
                                                            <input type="password" id="form1Example23" name="password"
                                                                   class="form-control form-control-lg" />
                                                            <label class="form-label"
                                                                   for="form1Example23">Password</label>
                                                        </div>
                                                        <div data-mdb-input-init class="form-outline mb-1">
                                                            <input type="password" id="form1Example23"
                                                                   name="confirm_password"
                                                                   class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example23">Confirm
                                                                Password</label>
                                                        </div>

                                                        <!-- Submit button -->
                                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                                class="btn btn-lg btn-block"
                                                                style="background-color: #dca34a; color: #fff;">Sign Up</button>

                                                        <!-- Social Buttons -->
                                                        <a data-mdb-ripple-init class="btn btn-lg btn-block"
                                                           style="background-color: #000; color: #fff;"
                                                           href="/login-google" role="button">
                                                            Continue with Google
                                                        </a>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
