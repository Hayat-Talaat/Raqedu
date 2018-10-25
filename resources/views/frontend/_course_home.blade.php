<div class="course_view mc-item mc-item-1 blue-grey lighten-3 border-0 border-radius-m z-depth-3" style="border: 0 solid !important">
    <div class="image-heading">
        <a href="{{ route('frontend.course.show', $course) }}">
            <img src="{{$course->image}}" style="max-width: 100%;" alt="">
        </a>
    </div>
    <div class="meta-categories " style="border: 0 solid !important"><a href="#">{{ $course->category->name }}</a></div>
    <div class="content-item" style="border: 0 solid !important">
        <div class="image-author">
            <img src="{{ $course->author->picture }}" alt="">
        </div>
        <h4><a href="{{ route('frontend.course.show', $course) }}">{{ $course->title }}</a></h4>
        <div class="name-author">
            <a href="{{route('frontend.user.public.profile', $course->author)}}">{{ $course->author->name }}</a>
        </div>
    </div>
    <div class="ft-item" style="border: 0 solid !important">
        <div class="ratingx">
            <rate readonly :val="{{$course->averageReviewRatings()->count()}}" size="20" active-color="#000"></rate>
            @if($course->total_reviews > 0 )
                <span>{{$course->average_rating}}</span>
                <span class="text-muted"> ({{$course->total_reviews}})</span>
            @endif
        </div>

        <div class="view-info">
            @if(Auth::user() && $course->price > 0)
                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#affiliateLink-{{$course->id}}">
                    {{trans('strings.frontend.promote-this-course')}}
                </button>
                <!--<affiliate-button link="{{ URL::route('frontend.course.show', ['course' => $course, 'ref' => Auth::user()->username]) }}">
                </affiliate-button>-->
            @endif
        </div>

        <div class="price">
           {{ Helper::getPrice($course) }}
        </div>
    </div>
</div>

