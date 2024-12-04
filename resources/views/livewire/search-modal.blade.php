<div>
    <div className="block relative">
        <div class="modal fade" id="quickViewModalSearch" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Product Search</h3>
                        <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                margin-right: 10px;">

                            X</span>
                    </div>
                    <div class="modal-body" style="height: 100px;">
                        <style>
                            .searchbar {
                                margin-bottom: auto;
                                margin-top: auto;
                                height: 60px;
                                background-color: #353b48;
                                border-radius: 30px;
                                padding: 10px;
                            }

                            .search_input {
                                color: white;
                                border: 0;
                                outline: 0;
                                background: none;
                                width: 0;
                                caret-color: transparent;
                                line-height: 40px;
                                transition: width 0.4s linear;
                            }

                            .searchbar:hover>.search_input {
                                padding: 0 10px;
                                width: 450px;
                                caret-color: red;
                                transition: width 0.4s linear;
                            }

                            .searchbar:hover>.search_icon {
                                background: white;
                                color: #e74c3c;
                            }

                            .search_icon {
                                height: 40px;
                                width: 40px;
                                float: right;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                border-radius: 50%;
                                color: white;
                                text-decoration: none;
                                background: none;
                                border: none;
                                outline: none;
                            }
                        </style>
                        <div class="d-flex justify-content-center h-100">
                            <form method="POST" action="/search">
                                @csrf
                                <div class="searchbar">
                                    <input class="search_input" type="text" name="search" placeholder="Search...">
                                    <button type="submit" class="search_icon"><i class="pe-7s-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>