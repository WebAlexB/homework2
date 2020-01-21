<tr>
    <td>

        @if( Storage::has ($row->model->thumbnail))
            <img src="{{ Storage::url($row->model->thumbnail) }}" height="160" width="60"
                 class="card-img-top"
                 style="max-width: 45%; margin: 0 auto; display: block;">
        @endif
        <a href="{{route('product.show',$row->id)}}"><strong> {{$row->name}}</strong></a>

        <p>{{($row->options->has('size') ? $row->options->size : '')}}</p>
    </td>
    <td>
    </td>
    <td>{{$row->qty}}</td>
    <td>${{$row->price}}</td>
    <td>${{$row->total}}</td>
</tr>
