@foreach($data as $key=>$value)
    <p><strong>{{ucwords(str_replace("_", " ", $key))}}</strong> : {{$value}}</p>
@endforeach
