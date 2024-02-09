<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="section-heading"><strong>Testimonials</strong></h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
        <div class="row">
            @foreach($testimonials as $testimonial)
            <div class="col-lg-4 mb-4">
                <div class="testimonial-2">
                    <blockquote class="mb-4">
                        <p class="truncate-text" style="white-space: pre-line; display: block; word-wrap: break-word;">
                            "{{$testimonial->content}}"</p>
                    </blockquote>
                    <div class="d-flex v-card align-items-center">
                        <img src="{{asset('assets/testimonialsimgs/'.$testimonial->image)}}" alt="Image"
                            class="img-fluid mr-3">
                        <div class="author-name">
                            <span class="d-block">{{$testimonial->name}}</span>
                            <span>{{$testimonial->position}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var elements = document.querySelectorAll('.truncate-text');
        elements.forEach(function (element) {
            var text = element.textContent;
            if (text.length > 90) {
                element.textContent = text.slice(0, 90) + '...'
            }
        });
    });
</script>