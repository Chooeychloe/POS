
<div>
    @if (strlen($searchItem) > 0)
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="d-flex justify-content-between">
        <h6 class="text-success fs-5"> {{$tableTitle}} </h6>
        <h6 class="text-success fs-5">Results: {{sizeof($tableRows)}} </h6>
    </div>
    <table class="table table-bordered table-left">
        <thead>
            <tr>
                <th>#</th>
                @foreach ($tableColumnsName as $column)
                <th> {{$column}} </th>    
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($tableRows as $key => $row)
            <tr>
                <td>{{$key+1}}</td>
                @foreach ($tableColumns as $column)
                <td> 
                    @if ($column == "alert_stock")
                        @if ($row['alert_stock'] >= $row['quantity']) 
                            <span class="badge badge-danger">Low Stock: must be > {{$row['alert_stock']}}</span>
                        @else
                            <span class="badge badge-success">{{$row['alert_stock']}}</span>
                        @endif
                    @elseif($column == "is_admin")    
                        @if ($row['is_admin'] == 1) Admin
                        @else Cashier
                        @endif 
                    @else
                    {{$row[$column]}} 
                    @endif

                </td>    
                @endforeach
                {{-- ACTIONS --}}
                <td>
                    <div class="btn-group">
                        <a href="#" class="btn btn-info btnt-sm"
                        data-toggle="modal" 
                        data-target="#editproduct{{$row['id']}}">
                            <i class="fas fa-edit"> Edit</i></a>
                            <a href="#"  data-toggle="modal" 
                            data-target="#deleteproduct{{$row['id']}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
            @if (sizeof($tableRows) == 0)
                <tr>
                    <td class="text-center text-danger" colspan=" {{ sizeof($tableColumns) + 2 }} ">No Result Found</td>
                </tr>
            @endif
        </tbody>
    </table>
    @endif
</div>

