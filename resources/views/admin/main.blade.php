@extends('/admin/app')

@section('content')
    <div class="container">
        <div class="addItem">
            <div class="page-header text-center">
                <h3>Добавить новый товар</h3>
            </div>
            <form enctype="multipart/form-data" action="/admin/addItem" method="POST">
                <table class="table">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <tr>
                        <td><h5>Тип</h5></td>
                        <td>
                            <select id="typeItem" required name="typeItem">
                                <option>Выберите</option>
                                <option value="wheels">Колёсо</option>
                                <option value="tires">Шина</option>
                                <option value="disks">Диск</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><h5>Название</h5></td>
                        <td><input type="text" name="title"></td>
                    </tr>
                    <tr>
                        <td><h5>Описание</h5></td>
                        <td><textarea type="text" rows="5" cols="40" max="500" name="description"></textarea></td>
                    </tr>
                    <tr>
                        <td><h5>Цена</h5></td>
                        <td><input type="number" name="cost"></td>
                    </tr>
                    <tr>
                        <td><h5>В наличии</h5></td>
                        <td><input type="number" name="count"></td>
                    </tr>
                    <tr>
                        <td><h5>Диаметр</h5></td>
                        <td><input type="number" name="diametr"></td>
                    </tr>
                    <tr>
                        <td><h5>Ширина</h5></td>
                        <td><input type="number" name="width"></td>
                    </tr>
                    <tr class="not-disk">
                        <td><h5>Профиль<br>(не диск)</h5></td>
                        <td><input type="number" name="profile"></td>
                    </tr>
                    <tr class="not-disk">
                        <td><h5>Зима<br>(не диск)</h5></td>
                        <td><input type="checkbox" name="winter"></td>
                    </tr>
                    <tr class="not-tire">
                        <td><h5>PCD(5*100)<br>(не шины)</h5></td>
                        <td><input type="text" name="PCD"></td>
                    </tr>
                    <tr class="not-tire">
                        <td><h5>Вылет<br>(не шины)</h5></td>
                        <td><input type="number" name="ET"></td>
                    </tr>
                    <tr class="not-tire">
                        <td><h5>Тип(не шины)<br>(напр: литой)</h5></td>
                        <td><input type="text" name="type"></td>
                    </tr>
                    <tr>
                        <td><h5>Фото</h5></td>
                        <td><input type="file" name="image[]"  accept="image/jpeg,image/png"></td>
                    </tr>
                </table>
                <button type="submit" name="addItem" id="addItemBtn">Добавить</button>
            </form>
        </div>
        <div class="changeItem">
            <div class="page-header text-center">
                <h3>Выбрать и изменить товар</h3>
            </div>
            <select id="typeChangeItem" required>
                <option value="wheels">Колёса</option>
                <option value="tires">Шины</option>
                <option value="disks">Диски</option>
            </select>
        </div>
    </div>
    <p id="msg" style="display: none" data-msg="{{$msg or 0}}"></p>
    <script type="text/javascript">
        $(document).ready(function() {
            //отображение товаров для изменения
            $('#typeChangeItem').change( function(){
                var typeChangeItem = $("#typeChangeItem :selected").val()
                $.ajax({
                    url: "/admin/addItem" ,
                    type: "POST",
                    data: '',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result){

                    },
                    error: function (result) {
                        document.write(result['responseText']);
                    }
                });
            });

            //отображение полей, согласно выбранному типу
            $('#typeItem').change( function(){
                if($("#typeItem :selected").val() == 'disks'){
                    $(".not-disk").hide()
                }else{
                    $(".not-disk").show()
                }
                if($("#typeItem :selected").val() == 'tires'){
                    $(".not-tire").hide()
                }else{
                    $(".not-tire").show()
                }
            });


            if($('#msg').attr('data-msg') == 'true'){
                alertify.alert("Успешно добавленно");
            }else {
                if($('#msg').val() == 'false'){
                    alertify.error("Ошибка при добавлении");
                }
            }
        });
        /*AJAX отправка на добавление с ошибками
        $(document).ready(function(){
            $('#addItemBtn').submit(function(e){
                console.log('zya ');
                e.preventDefault();
                $.ajax({
                    url: "/admin/addItem" ,
                    type: "POST",
                    data: $('#addItemBtn').serialize(),
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(result){
                        if(result == 'true'){
                            alertify.error("Успешно добавленно");
                        }else{
                            alertify.error("Ошибка при добавлении");
                        };
                    }
                });
            });
        });*/
    </script>
@endsection