@extends('/app')

@section('content')

    <div class="container">
        <div class="page-header list-page-header text-center">
            <a href="{{route('wheel')}}"><h3>{{ $title['titleWheel'] }}</h3></a>
        </div>
        <div class="slider">
            @foreach($list['listWheel'] as $item)

                <div class="thumbnail slider-item">
                    <a href="/wheel/{{$item['id']}}">
                        @if(isset($item['images'][0]))
                            <img src="{{ $item['images'][0]['url'] or '#' }}" alt="фото">
                        @else
                            <img src="#" alt="фото">
                        @endif
                        <div class="caption">
                            <h4 class="first-up">{{ $item['title'] }}</h4>
                            <p>Цена: {{ $item['cost'] }}р.</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="page-header list-page-header text-center">
            <a href="{{route('disk')}}"><h3>{{ $title['titleDisk'] }}</h3></a>
        </div>
        <div class="slider">
            @foreach($list['listDisk'] as $item)
                <div class="thumbnail slider-item">
                    <a href="/disk/{{$item['id']}}">
                        @if(isset($item['images'][0]))
                            <img src="{{ $item['images'][0]['url'] or '#' }}" alt="фото">
                        @else
                            <img src="#" alt="фото">
                        @endif
                        <div class="caption">
                            <h4 class="first-up">{{ $item['title'] }}</h4>
                            <p>Цена: {{ $item['cost'] }}р.</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="page-header list-page-header text-center">
            <a href="{{route('tire')}}"><h3>{{ $title['titleTire'] }}</h3></a>
        </div>
        <div class="slider">
            @foreach($list['listTire'] as $item)
                <div class="thumbnail slider-item">
                    <a href="/tire/{{$item['id']}}">
                        @if(isset($item['images'][0]))
                            <img src="{{ $item['images'][0]['url'] or '#' }}" alt="фото">
                        @else
                            <img src="#" alt="фото">
                        @endif
                        <div class="caption">
                            <h4 class="first-up">{{ $item['title'] }}</h4>
                            <p>Цена: {{ $item['cost'] }}р.</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


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