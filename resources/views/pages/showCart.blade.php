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
                    <td>Итого</td>
                </tr>
                @foreach($data as $value)
                <tr>
                    <td class="col-md-2"><img class="col-md-12" src="{{ $value['img'] }}" ></td>
                    <td class="first-up">
                        <h4 >{{ $value['title'] }}</h4>
                    </td>
                    <td><input class="col-md-2" type="number" value="{{ $value['count'] }}"></td>
                    <td>{{ $value['count']*$value['cost'] }}RUB</td>
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