@foreach ($actualities as $actuality)

    <div class="news-card">
        <h3>{{$actuality->title}}</h3>
        <p>{{$actuality->content}}</p>
    </div>

@endforeach
