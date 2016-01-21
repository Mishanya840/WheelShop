@extends('/app')

@section('content')
    <div class="container">
    @if($issetCookie)
       <div class="cart-relative-div">
           <div class="cart-left-div">
               <h4>Моя корзина({{$totalCount or ''}})</h4>
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
                    <td class="col-md-2 col-sm-2">
                        <a class="not-a" href="/{{$value['typeItem']}}/{{$value['id']}}">
                            <img class="col-md-12 col-sm-12"  src="{{$value['images'][0]['url'] or '#'}}" >
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
                            <a class="deleteItemOnCart" data-id="{{$value['id']}}" data-type="{{ $value['typeItem'] }}">Удалить из корзины</a>
                        </p>
                    </td>
                    <td>
                        <div class="input-lg">
                            <input class="col-md-3 col-sm-3 input_count" id="{{$value['id']}}" type="number" value="{{ $value['count'] }}">
                        </div>
                    </td>
                    <td><h5 id="cost_{{$value['cost']}}" data-cost="{{ $value['cost'] }}">{{ $value['cost'] }} RUB</h5></td>
                    <td><h4 class="total_price" id="total_{{$value['id']}}">{{ $value['count']*$value['cost'] }} RUB</h4></td>
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
    @else
        <div class="cart-relative-div">
            <div class="cart-left-div">
                <h4>Моя корзина(0)</h4>
            </div>
            <div class="cart-right-div">
                <h4>В вашей корзине нет товаров</h4>
            </div>
        </div>
        <div class="empty-cart">ПУСТО</div>
    @endif
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.input_count').change(function(){
                var id = $(this).attr('id');
                var count = $(this).val();
                var cost = $('#cost_'+id).text();
                var value = $('#total_'+id).text();
                console.log(cost);
                alertify.message('12 '+cost);

            });

            /*$('.deleteItemOnCart').click(function(){
                var id = $(this).attr('data-id');
                var type = $(this).attr('data-type');
                $.ajax({
                    url: '/deleteItemOnCart',
                    type: "POST",
                    data: {
                        id: id,
                        type: type,
                    },
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function ($data) {
                        repaintBadgeCart();
                    },
                    error: function (msg) {
                        document.write(msg['responseText']);
                    }
                });
            });*/
        });
    </script>
@endsection