<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Car Listings</strong></h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>


        <div class="row">
            @foreach($cars as $car)
            <div class="col-md-6 col-lg-4 mb-4">

                <div class="listing d-block  align-items-stretch">
                    <div class="listing-img h-100 mr-4">
                        <img src="{{asset('assets/carsimgs/'.$car->image)}}" alt="Image" class="img-fluid">
                    </div>
                    <div class="listing-contents h-100">
                        <h3>{{$car->title}}</h3>
                        <div class="rent-price">
                            <strong>${{number_format($car->price, 2)}}</strong><span class="mx-1">/</span>day
                        </div>
                        <div class="d-block d-md-flex mb-3 border-bottom pb-3">
                            <div class="listing-feature pr-4">
                                <span class="caption">Luggage:</span>
                                <span class="number">{{$car->luggage}}</span>
                            </div>
                            <div class="listing-feature pr-4">
                                <span class="caption">Doors:</span>
                                <span class="number">{{$car->doors}}</span>
                            </div>
                            <div class="listing-feature pr-4">
                                <span class="caption">Passenger:</span>
                                <span class="number">{{$car->passengers}}</span>
                            </div>
                        </div>
                        <div>
                            <p class="truncate-text" style="white-space: pre-line; display: block; word-wrap: break-word;">
                                {{$car->content}}</p>
                            <p><a href="show/{{ $car->id }}" class="btn btn-primary btn-sm">Rent Now</a></p>
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-5">
                <div class="custom-pagination">
                    <a href="#">1</a>
                    <span>2</span>
                    <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var elements = document.querySelectorAll('.truncate-text');
    elements.forEach(function(element) {
        var text = element.textContent;
        if (text.length > 100) {
            element.textContent = text.slice(0, 100) + '...'
        }
    });
    });
</script>