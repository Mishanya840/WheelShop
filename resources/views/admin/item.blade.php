@extends('/app')

@section('content')
    <div class="container">
        <div class="row">
            <form enctype="multipart/form-data" action="/admin/changeData" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-md-7 left-part">
                    <img class="col-md-12" src="{{$item['img']}}">
                    <input type="file" name="image[]"  accept="image/jpeg,image/png">
                </div>

                <div class="col-md-4 right-part">
                    <h4>Наименование</h4>
                    <input class="text-left first-up item-title form-control " value="{{$item['title']}}">
                    <h4>Цена</h4>
                    <div class="input-group col-md-6">
                        <input class="item-cost form-control" value=" {{$item['cost']}} ">
                        <span class="input-group-addon">RUB</span>
                    </div>
                    <h4 class="count">Количество</h4>
                    <div class="input-group col-md-6">
                        <input type="number" class="form-control" name="count_on_sklad" value="1"><?//TODO count<=$item['count']?>
                        <span class="input-group-addon">В наличии</span>
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
                                    <td><input type="text" class="form-control" value=" {{$item['diametr']}} "></td>
                                    <td><input type="text" class="form-control" value=" {{$item['width']}} "></td>
                                    @unless($type == 'disk')
                                        <td><input type="text" class="form-control" value=" {{$item['profile']}} "></td>
                                        <td><input type="checkbox"  value=" {{$item['winter'] ? true : false}} "></td>
                                    @endunless
                                    @if($type == 'disk')
                                        <td><input type="text" class="form-control" value=" {{$item['PCD']}} "></td>
                                        <td><input type="text" class="form-control" value=" {{$item['ET']}} "></td>
                                        <td class="first-up"><input type="text" value=" {{$item['type']}} "></td>
                                    @endif
                                </tr>
                                @if($type == 'wheel')
                                    <tr class="tr-title active">
                                        <td>PCD</td>
                                        <td>Вылет</td>
                                        <td>Тип</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" value=" {{$item['PCD']}} "></td>
                                        <td><input type="text" class="form-control" value=" {{$item['ET']}} "></td>
                                        <td class="first-up"><input type="text" class="form-control" value=" {{$item['type']}} "></td>
                                    </tr>
                                @endif
                            </table>
                            <button type="submit" name="change" class="col-md-6">Сохранить</button>
                        </div>
                    </div>
                </div>

            </form>
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
                    alertify.error('Введите колличество больше нуля')
                }
            });
        });

    </script>

@endsection