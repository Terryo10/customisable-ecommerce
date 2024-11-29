<div>
    <div className="block relative">
        <div class="modal fade" id="quickViewModalContact" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Contact US</h3>
                        <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                margin-right: 10px;">

                            X</span>
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
                                        <img src="{{ asset('template/outside/img/draw2.svg') }}" class="img-fluid"
                                            alt="Phone image">
                                    </div>
                                    <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                                        <form method="POST" action="/contact">
                                            @csrf
                                            <!-- Email input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="form1Example13" name="subject"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form1Example13">Subject</label>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="email" id="form1Example13" name="email"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form1Example13">Email address</label>
                                            </div>

                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="phone" id="form1Example23" name="phone"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="form1Example23">Phone Number</label>
                                            </div>
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <textarea id="form1Example23" name="message" rows="4"
                                                    placeholder="Enter your message"
                                                    class="form-control form-control-lg"></textarea>
                                                <label class="form-label" for="form1Example23">Message</label>
                                            </div>

                                            <!-- Submit button -->
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-primary btn-lg btn-block">Send Us Message</button>

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