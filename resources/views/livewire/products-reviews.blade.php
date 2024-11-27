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
                <span class="star" data-value="1" data-id="{{" $product->id"}}">&#9733;</span>
                <span class="star" data-value="2" data-id="{{" $product->id"}}">&#9733;</span>
                <span class="star" data-value="3" data-id="{{" $product->id"}}">&#9733;</span>
                <span class="star" data-value="4" data-id="{{" $product->id"}}">&#9733;</span>
                <span class="star" data-value="5" data-id="{{" $product->id"}}">&#9733;</span>
            </div>
            <div class="mt-3">
                <textarea name="review" id="reviewText" class="form-control" rows="4"
                    placeholder="Write your review here..." required></textarea>
            </div>
            <button id="submitReview" class="btn btn-primary mt-3">Submit</button>
        </form>

    </div>

    @else
    <h3 class="mt-5">Login Submit Reviews</h3>
    @endif

    <h3 class="mt-5">Submitted Reviews ({{$product->reviews->count()}})</h3>
    <div id="reviewsList" class="mt-3">
        @foreach ($product->reviews as $review)
        <div style="border-bottom: 1px solid #333;margin-bottom: 3px;">
            <div class="d-flex align-items-center">
                <div class="me-2">
                    {{-- ${'&#9733;'.repeat(selectedRating)}${'&#9734;'.repeat(5 - selectedRating)} --}}
                </div>
                <div class="fw-bold">Rating: {{$review->rating}}/5 by {{$review->user->name ?? "Unknown"}} :
                    {{$review->created_at}}</div>
            </div>
            <p class="mt-2">{{$review->review}}</p>
        </div>
        @endforeach
    </div>
</div>