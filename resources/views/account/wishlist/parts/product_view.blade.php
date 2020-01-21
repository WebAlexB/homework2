<tr>
    <td>

        @if( Storage::has ($row->model->thumbnail))
            <img src="{{ Storage::url($row->model->thumbnail) }}" height="160" width="60"
                 class="card-img-top"
                 style="max-width: 45%; margin: 0 auto; display: block;">
        @endif
        <a href="{{route('product.show',$row->id)}}"><strong> {{$row->name}}</strong></a>
    </td>
    <td>
        <form action="" method="POST">
            @csrf
            <input type="hidden" name="rowId" min="1" value="{{ $row->rowId}}">
            <input type="submit" value="Remove product" formaction="{{route('wishlist.delete',$row->id)}}">
        </form>
    </td>
    <td>${{$row->price}}</td>

</tr>
