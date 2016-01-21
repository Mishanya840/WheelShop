@extends('/app')

@section('content')
    <div class="container">
        <div class="row">
            <form enctype="multipart/form-data" action="/admin/changeItem" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="typeItem" value="{{ $type }}">
                <input type="hidden" name="id" value="{{ $id or $item['id'] }}">
                <div class="col-md-6 left-part">
                    <div class="slider-for ">
                        @foreach($item->toArray()['images'] as $image)
                            <div class="image-item">
                                <img class="col-md-12 slick-slide " src="{{$image['url'] or '#'}}">
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-nav">
                        @foreach($item->toArray()['images'] as $image)
                            <img class="col-md-12 slick-slide" src="{{$image['url'] or '#'}}">
                        @endforeach
                    </div>

                </div>

                <div class="col-md-5 right-part">
                    <h4>Наименование</h4>
                    <input class="text-left first-up item-title form-control " name="title" value="{{$item['title']}}">
                    <h4>Цена</h4>
                    <div class="input-group col-md-6">
                        <input class="item-cost form-control" name="cost" value=" {{$item['cost']}} ">
                        <span class="input-group-addon">RUB</span>
                    </div>
                    <h4 class="count">Количество</h4>
                    <div class="input-group col-md-6">
                        <input type="number" class="form-control" name="count" value="1"><?//TODO count<=$item['count']?>
                        <span class="input-group-addon">В наличии</span>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">Основная информация</div>
                        <div class="panel-body">
                            <textarea class="first-up " name="description">{{$item['description']}}</textarea>

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
                                    @endif
                                </tr>
                                <tr class="text-center">
                                    <td><input type="text" class="form-control" name="diametr" value=" {{$item['diametr']}} "></td>
                                    <td><input type="text" class="form-control" name="width" value=" {{$item['width']}} "></td>
                                    @unless($type == 'disk')
                                        <td><input type="text" class="form-control" name="profile" value=" {{$item['profile']}} "></td>
                                        <td><input type="checkbox" name="winter" value="1"  {{  $item['winter'] ? 'checked' : ''}} ></td>
                                    @endunless
                                    @if($type == 'disk')
                                        <td><input type="text" class="form-control" name="PCD" value=" {{$item['PCD']}} "></td>
                                        <td><input type="text" class="form-control" name="ET" value=" {{$item['ET']}} "></td>
                                        @endif
                                </tr>
                                @if($type == 'wheel')
                                    <tr class="tr-title active">
                                        <td>PCD</td>
                                        <td>Вылет</td>
                                        <td>Тип</td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" name="PCD" value=" {{$item['PCD']}} "></td>
                                        <td><input type="text" class="form-control" name="ET" value=" {{$item['ET']}} "></td>
                                        <td class="first-up"><input type="text" name="type" class="form-control" value=" {{$item['type']}} "></td>
                                    </tr>

                                @endif
                                @if($type == 'disk')
                                    <tr class="tr-title active text-center">
                                        <td>Тип</td>
                                    </tr>
                                    <tr>
                                        <td class="first-up"><input type="text" name="type" class="form-control" value=" {{$item['type']}} "></td>
                                    </tr>
                                @endif
                            </table>
                            <p class="text-add-file">Добавить изображения:  </p>
                            <input  type="file" id="image" name="image[]"  accept="image/jpeg,image/png" class="text-add-file" multiple>
                            <button type="submit" id="change" name="change" class="col-md-6">Сохранить</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.image-item').click(function(){
                alertify.confirm("Вы точно ходите удалить изображение?",
                        function(){

                            alertify.success('Удаленно');
                        },
                        function(){
                        });
            });
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                arrows: false,
                asNavFor: '.slider-for',
                centerMode: true,
                focusOnSelect: true,
                lazyLoad: 'ondemand',
            });
            $('#chagggnge').click(function () {

                var id = $('input[name="id"]').val();
                var typeItem = $('input[name="typeItem"]').val();
                var title = $('input[name="title"]').val();
                var image = $('#image').val();
                var cost = $('input[name="cost"]').val();
                var count = $('input[name="count"]').val();
                var description = $('textarea[name="description"]').val();
                var diametr = $('input[name="diametr"]').val();
                var width = $('input[name="width"]').val();
                var profile = $('input[name="profile"]').val();
                var winter = $('input[name="winter"]').val();
                var PCD = $('input[name="PCD"]').val();
                var ET = $('input[name="ET"]').val();
                var type = $('input[name="type"]').val();
                console.log(image);
                    $.ajax({
                        url: '/admin/changeItem',
                        type: "POST",
                        data: {
                            id: id,
                            typeItem: typeItem,
                            title: title,
                            image: image,
                            cost: cost,
                            count: count,
                            description: description,
                            diametr: diametr,
                            width: width,
                            profile: profile,
                            winter: winter,
                            PCD: PCD,
                            ET: ET,
                            type: type,
                        },
                        headers: {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        },
                        success: function ($data) {
                            document.write($data);
                        },
                        error: function (msg) {
                            document.write(msg['responseText']);
                        }
                    });
            });
        });

    </script>

@endsection