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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                margin-right: 10px;">

                                Close</button>
                        </div>
                        <div class="modal-body">
                            <div>
                                @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                @endif
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <section class="vh-100">
                                <div class="container py-5 h-100">
                                    <div class="row d-flex align-items-center justify-content-center h-100">
                                        <div class="col-md-8 col-lg-7 col-xl-6">
                                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                                                class="img-fluid" alt="Phone image">
                                        </div>
                                        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                                            <form method="POST" action="/login">
                                                @csrf
                                                <!-- Email input -->
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="email" id="form1Example13" name="email"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="form1Example13">Email address</label>
                                                </div>

                                                <!-- Password input -->
                                                <div data-mdb-input-init class="form-outline mb-4">
                                                    <input type="password" id="form1Example23" name="password"
                                                        class="form-control form-control-lg" />
                                                    <label class="form-label" for="form1Example23">Password</label>
                                                </div>

                                                <div class="d-flex justify-content-around align-items-center mb-4">
                                                    <!-- Checkbox -->
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="form1Example3" checked />
                                                        <label class="form-check-label" for="form1Example3"> Remember me
                                                        </label>
                                                    </div>
                                                    <a wire:navigate href="/forgot-password">Forgot password?</a>
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
                                                    {{-- <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
                                                    --}}
                                                </a>
                                                <a data-mdb-ripple-init class="btn btn-primary btn-lg btn-block"
                                                    style="background-color: #55acee" href="/login-google"
                                                    role="button">
                                                    Continue with Google</a>

                                            </form>
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