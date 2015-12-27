@extends('/app')

@section('content')
    <div class="container">
        <div class="page-header list-page-header text-center">
            <h3>{{ $title }}</h3>
        </div>
        <div class="row">

        @foreach($list as $item)
            <div class="col-md-3">
                <div class="thumbnail list-item">
                    <a href="/{{$type}}/{{$item['id']}}">
                        <img src="{{ $item['img'] }}" alt="фото">
                        <div class="caption">
                            <h4 class="first-up">{{ $item['title'] }}</h4>
                            <p>{{ $item['description'] }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
            <?#TODO можно сделать постраничный вывод. инфа в документации https://laravel.ru/docs/v5/pagination?>
        </div>

    </div>
@endsection