<x-header/>
<div class="container">


    <div
        class="table-responsive"
    >
        <table
            class="table table-info"
        >
            <thead>
                <tr>
                    <th scope="col">Tracking No</th>
                    <th scope="col">Total Price</th>
                    <th>Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    
            
                <tr class="">
                    <td scope="row">{{$item->tracking_no}}</td>
                    <td>{{$item->total_price}}</td>
                    <td>{{$item->status == '0'?'pending':'completed'}}</td>
                    <td>
                        <a href="{{url('#')}}" class="btn btn-info" >View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<x-footer/>