@extends('/app')

@section('content')
    <div class="container">
        <div class="page-header list-page-header text-center">
            <h3>{{ $header_text }}</h3>
        </div>
        <p>{{ $text }}</p>
    </div>
@endsection