<div class="table-responsive">
    <table class="table" id="todos-table">
        <thead>
            <tr>
                <th style="cursor: pointer">
                    <a href="{{route('todos.index',['sort' => 'titleAsc'])}}" style="text-decoration:none;color:inherit;">Title</a>
                    @if($sort === 'titleAsc')
                      <a href="{{route('todos.index',['sort' => 'titleDesc'])}}" style="text-decoration:none;color:inherit;"><i class="fas fa-arrow-up"></i></a>
                    @endif
                    @if($sort === 'titleDesc')
                      <a href="{{route('todos.index',['sort' => 'titleAsc'])}}" style="text-decoration:none;color:inherit;"><i class="fas fa-arrow-down"></i></a>
                    @endif
                </th>
                <th style="cursor: pointer">
                    <a href="{{route('todos.index',['sort' => 'statusAsc'])}}" style="text-decoration:none;color:inherit;">Status</a>
                    @if($sort === 'statusAsc')
                      <a href="{{route('todos.index',['sort' => 'statusDesc'])}}" style="text-decoration:none;color:inherit;"><i class="fas fa-arrow-up"></i></a>
                    @endif
                    @if($sort === 'statusDesc')
                     <a href="{{route('todos.index',['sort' => 'statusAsc'])}}" style="text-decoration:none;color:inherit;"><i class="fas fa-arrow-down"></i></a>
                    @endif
                </th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($todos as $todo)
            <tr>
                <td>{{ $todo->title }}</td>
                <td>{{ $todo->status_name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['todos.destroy', $todo->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('todos.show', [$todo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('todos.edit', [$todo->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
