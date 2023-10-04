@if (auth()->user()->role_id == 1)

    <div class="btn-group">
        <button class="btn btn-primary btn-sm mx-2" onclick="event_view({{$id}})">
            <i class="fa fa-eye"></i>
        </button>

        <button class="btn btn-success btn-sm mx-2" onclick="event_edit({{$id}})">
            <i class="fa fa-edit"></i>
        </button>

        <button class="btn btn-danger btn-sm" onclick="event_delete({{$id}})">
            <i class="fa fa-trash"></i>
        </button>
        
    </div>

@else

    <div class="btn-group">
        <button class="btn btn-primary btn-sm mx-2" onclick="event_view({{$id}})">
            <i class="fa fa-eye"></i>
        </button>
    </div>

    <button class="btn btn-success btn-sm mx-2" onclick="event_edit({{$id}})">
        <i class="fa fa-edit"></i>
    </button>
    
@endif