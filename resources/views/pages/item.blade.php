@extends('/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7 left-part">
                <img class="col-md-12" src="{{$item['img']}}">
            </div>
            <div class="col-md-4 right-part">
                <h3 class="text-left first-up item-title">{{$item['title']}}</h3>
                <h3 class="item-cost">RUB {{$item['cost']}}</h3>
                <h6 class="count">Количество</h6>
                <div class="input-group col-md-4">
                    <input type="number" class="form-control" name="count" value="1"><?//TODO count<=$item['count']?>
                    <span class="input-group-addon">шт.</span>
                </div>
                <div class="btn-group">
                <button type="button" data-id="{{ $item['id'] }}" data-type="{{ $type }}" id="addToCart" class="btn btn-default col-md-12" >ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Основная информация</div>
                    <div class="panel-body">
                        <p class="first-up">{{$item['description']}}</p>

                    <table class="table col-md-12 table-condensed table-bordered ">
                        <tr class="tr-title active text-center">
                            <td>Diametr</td>
                            <td>Ширина</td>
                            @unless($type == 'disk')
                                <td>Профиль</td>
                                <td>Зима</td>
                            @endunless
                            @if($type == 'disk')
                                <td>PCD</td>
                                <td>Вылет</td>
                                <td>Тип</td>
                            @endif
                        </tr>
                        <tr class="text-center">
                            <td>{{$item['diametr']}}</td>
                            <td>{{$item['width']}}</td>
                            @unless($type == 'disk')
                                <td>{{$item['profile']}}</td>
                                <td>{{$item['winter'] ? '✔' : 'Нет'}}</td>
                            @endunless
                            @if($type == 'disk')
                                <td>{{$item['PCD']}}</td>
                                <td>{{$item['ET']}}</td>
                                <td class="first-up">{{$item['type']}}</td>
                            @endif
                        </tr>
                        @if($type == 'wheel')
                        <tr class="tr-title active">
                            <td>PCD</td>
                            <td>Вылет</td>
                            <td>Тип</td>
                        </tr>
                        <tr>
                            <td>{{$item['PCD']}}</td>
                            <td>{{$item['ET']}}</td>
                            <td class="first-up">{{$item['type']}}</td>
                        </tr>
                        @endif
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#addToCart').click(function () {
                var id;
                var count;
                var type;
                count = $('input[name="count"]').val();
                id = $('#addToCart').attr('data-id');
                type = $('#addToCart').attr('data-type');
                if(count > 0) {
                    $.ajax({
                        url: '/addToCart',
                        type: "POST",
                        data: {
                            id: id,
                            type: type,
                            count: count
                        },
                        headers: {
                            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function ($data) {
                            repaintBadgeCart();
                            console.log('-repaintedBadgeCart')
                            //document.write($data);
                        },
                        error: function (msg) {
                            document.write(msg['responseText']);
                        }
                    });
                }else{
                    alertify.error('Введите кол')
                }
            });
        });

    </script>

@endsection