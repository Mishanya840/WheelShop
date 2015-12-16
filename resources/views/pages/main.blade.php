@extends('/app')

@section('content')

    <div class="container">
        <div class="slider">
            @foreach($list as $item)
                <div class="ss">
                    <div class="thumbnail">
                        <img src="{{ $item['img'] }}" alt="фото">
                        <div class="caption">
                            <h4>{{ $item['title'] }}</h4>
                            <p>Цена: {{ $item['cost'] }}р.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="/slick/slick.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 4000,
            });
        });
    </script>


@endsection