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