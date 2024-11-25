<div>
    {{-- Do your work, then step back. --}}<div class="d-flex justify-content-center align-items-center mt-5">
        <style type="text/css">
            .divider:after,
            .divider:before {
                content: "";
                flex: 1;
                height: 1px;
                background: #eee;
            }
        </style>

        <div className="block relative">
            <div class="modal fade" id="quickViewModalLogin" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3>SlimRiff</h3>
                            <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                margin-right: 10px;">

                                X</span>
                        </div>
                        <div class="modal-body" style="overflow: hidden scroll;">

                            <div>
                                @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                @endif
                            </div>

                            <section class="vh-100">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex align-items-center justify-content-center h-100">
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                                class="img-fluid" alt="Phone image">
                                        </div>
                                        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <span class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                        role="tab" aria-controls="pills-home" aria-selected="true">Sign
                                                        In</span>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <span class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button" role="tab" aria-controls="pills-profile"
                                                        aria-selected="false">Register now</span>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
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
                                                        <div data-mdb-input-init class="form-outline mb-4">
                                                            <input type="email" id="form1Example13" name="email"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example13">Email
                                                                address</label>
                                                        </div>

                                                        <!-- Password input -->
                                                        <div data-mdb-input-init class="form-outline mb-4">
                                                            <input type="password" id="form1Example23" name="password"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label"
                                                                for="form1Example23">Password</label>
                                                        </div>

                                                        <div
                                                            class="d-flex justify-content-around align-items-center mb-4">
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
                                                            class="btn btn-primary btn-lg btn-block">Sign in</button>

                                                        <div class="divider d-flex align-items-center my-4">
                                                            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
                                                        </div>

                                                        <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
                                                            style="background-color: #3b5998" href="#!" role="button">
                                                            Continue with Facebook
                                                            {{-- <i class="fab fa-facebook-f me-2"></i>Continue with
                                                            Facebook
                                                            --}}
                                                        </a>
                                                        <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
                                                            style="background-color: #55acee" href="/login-google"
                                                            role="button">
                                                            Continue with Google</a>

                                                    </form>
                                                </div>
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
                                                        <!-- Email input -->
                                                        <div data-mdb-input-init class="form-outline mb-4">
                                                            <input type="text" id="form1Example13" name="name"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example13">Your
                                                                Name</label>
                                                        </div>
                                                        <div data-mdb-input-init class="form-outline mb-4">
                                                            <input type="email" id="form1Example13" name="email"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example13">Email
                                                                address</label>
                                                        </div>

                                                        <!-- Password input -->
                                                        <div data-mdb-input-init class="form-outline mb-4">
                                                            <input type="password" id="form1Example23" name="password"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label"
                                                                for="form1Example23">Password</label>
                                                        </div>
                                                        <div data-mdb-input-init class="form-outline mb-4">
                                                            <input type="password" id="form1Example23"
                                                                name="confirm_password"
                                                                class="form-control form-control-lg" />
                                                            <label class="form-label" for="form1Example23">Confirm
                                                                Password</label>
                                                        </div>

                                                        <div
                                                            class="d-flex justify-content-around align-items-center mb-4">

                                                        </div>

                                                        <!-- Submit button -->
                                                        <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                            class="btn btn-primary btn-lg btn-block">Sign Up</button>




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