@extends('/app')

@section('content')
    <div class="container">
       <div class="cart-relative-div">
           <div class="cart-left-div">
               <h4>Моя корзина({{$totalCount or '0'}})</h4>
           </div>
           <div class="cart-right-div">
                <button class="btn btn-warning"><h4>Оформить заказ</h4></button>
           </div>
       </div>
        <div class="list-cart">
            <table class="table-cart table">
                <tr>
                    <td>Товар</td>
                    <td>Наименование</td>
                    <td>Количество</td>
                    <td>Цена</td>
                    <td>Итого</td>
                </tr><?php //TODO при изменении количества изменять в куках?>
                @foreach($data as $value)
                <tr>
                    <td class="col-md-2">
                        <a class="not-a" href="/{{$value['typeItem']}}/{{$value['id']}}">
                            <img class="col-md-12"  src="{{ $value['img'] }}" >
                        </a>
                    </td>
                    <td >
                        <a class="not-a" href="/{{$value['typeItem']}}/{{$value['id']}}">
                            <h4 class="first-up">{{ $value['title'] }}</h4>
                        </a>
                        <p>
                            Диаметр: {{$value['diametr']}}<br>
                            Ширина: {{$value['width']}}<br>
                            @unless($value['typeItem'] == 'disk')
                                Профиль: {{  $value['profile']}}<br>
                                Зима: {{ $value['winter'] ? '✔' : 'Нет'}}<br>
                            @endunless
                            @if($value['typeItem'] == 'disk')
                                PCD: {{$value['PCD']}}<br>
                                Вылет: {{$value['ET']}}<br>
                                Тип: <span class="first-up">{{$value['type']}}</span><br>
                            @endif

                        </p>
                    </td>
                    <td>
                        <div class="input-lg">
                            <input class="col-md-3" type="number" value="{{ $value['count'] }}">
                        </div>
                    </td>
                    <td><h5>{{ $value['cost'] }} RUB</h5></td>
                    <td><h4>{{ $value['count']*$value['cost'] }} RUB</h4></td>
                </tr>
                @endforeach

            </table>
        </div>

        <div class="cart-relative-div">
            <div class="cart-left-div">
                <h4>Моя корзина({{$totalCount or '0'}})</h4>
            </div>
            <div class="cart-right-div">
                <button class="btn btn-warning"><h4>Оформить заказ</h4></button>
            </div>
        </div>

    </div>
@endsection