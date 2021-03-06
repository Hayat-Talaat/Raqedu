<div class="col-sm-6 col-md-4 ">

    <div class="mc-item mc-item-1 blue-grey lighten-4 z-depth-3 course_view" style="border-radius: 10px !important">
        <div class="image-heading">
            <a href="{{ route('frontend.course.show', $course) }}">
                <img src="{{$course->image}}" style="max-width: 100%;" alt="">
            </a>
        </div>
        <div class="meta-categories"><a href="#">{{ $course->category->name }}</a></div>
        <div class="content-item">
            <div class="image-author">
                <img src="{{ $course->author->picture }}" alt="">
            </div>
            <h3 class = "text-md text-thin" ><a href="{{ route('frontend.course.show', $course) }}">{{ $course->title }}</a></h3>
            <div class="name-author">
                <a class="text-thin text-smd blue-text" href="{{route('frontend.user.public.profile', $course->author)}}">{{ $course->author->name }}</a>
            </div>
        </div>
        <div class="ft-item border-0">
            <div class="ratingx">

               <rate :val = "{{$course->average_rating}}" readonly></rate>
                @if($course->total_reviews > 0 )
                    <span>{{$course->average_rating}}</span>
                    <span class="text-muted"> ({{$course->total_reviews}})</span>
                @endif
            </div>

            <div class="view-info">
                @if(Auth::user() && $course->price > 0)
                    <affiliate-button link="{{ URL::route('frontend.course.show', ['course' => $course, 'ref' => Auth::user()->affiliate_id]) }}"></affiliate-button>
                @endif
            </div>
            <!--
            <div class="comment-info">
                <i class="icon md-comment"></i>
                25
            </div>
            -->
            <div class="price">
               <p>
                    Egypt Price: {{ Helper::getPrice($course) }}
                    <br>
                    Outside Egypt Price: {{ Helper::getOutsidePrice($course) }}
                </p>
                <!--<span class="price-old">$134</span>-->
            </div>
        </div>
    </div>
</div>