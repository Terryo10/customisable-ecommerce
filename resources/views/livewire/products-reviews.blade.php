<div>
    <style>
        .star {
            font-size: 2rem;
            cursor: pointer;
            color: lightgray;
        }

        .star.selected {
            color: gold;
        }
    </style>
    @if(Auth::check())
    <div class="container mt-5">
        <h2>Submit Your Review</h2>
        <form method="POST" action={{"/review/$product->id"}}>
            @csrf
            <div id="stars" class="d-flex">
                <span class="star" data-value="1">&#9733;</span>
                <span class="star" data-value="2">&#9733;</span>
                <span class="star" data-value="3">&#9733;</span>
                <span class="star" data-value="4">&#9733;</span>
                <span class="star" data-value="5">&#9733;</span>
            </div>
            <div class="mt-3">
                <textarea name="review" id="reviewText" class="form-control" rows="4"
                    placeholder="Write your review here..."></textarea>
            </div>
            <button id="submitReview" class="btn btn-primary mt-3">Submit</button>
        </form>

    </div>

    @else
    <h3 class="mt-5">Login Submit Reviews</h3>
    @endif

    <h3 class="mt-5">Submitted Reviews</h3>
    <div id="reviewsList" class="mt-3"></div>
</div>