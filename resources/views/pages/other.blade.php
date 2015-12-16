@extends('/index')

@section('slider')

<div class="slider">
    <div class="slider-item">1</div>
    <div class="slider-item">2</div>
    <div class="slider-item">3</div>
</div>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="/slick/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('.slider').slick();
    });
</script>
@endsection