@extends('Admin.main')

@section('content')
    <!-- Button trigger modal -->
    @if(session()->has('success'))
        <span class="alert alert-{{session()->get('success')}}"></span>
    @endif
    <button type="button" style="margin-bottom: 10px" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add {{ucfirst(\Illuminate\Support\Facades\Request::segment(3))}}
    </button>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Modal -->
{{--    @can('testing')--}}
    @include('Admin.employee.add')
{{--    @endcan--}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Employee First Name</th>
                    <th>Employee Last Name</th>
                    <th>Company Email</th>
                    <th>Company Phone</th>
                    <th>Employee Company</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                <?php $i=0;?>
                @foreach($employees as $emp)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$emp->first_name}}</td>
                    <td>{{$emp->last_name}}</td>
                    <td>{{$emp->email}}</td>
                    <td>{{$emp->phone}}</td>
                    <td>{{$emp->company->name}}</td>
                    <td>
                        <button  class="btn  btn-danger" data-bs-toggle="modal" data-bs-target="#Delete{{$emp->id}}">Delete</button>
                        <button class="btn  btn-success" data-bs-toggle="modal" data-bs-target="#Edit{{$emp->id}}"> Edit</button>
                    </td>
                </tr>
                @include('Admin.employee.edit')
                @include('Admin.employee.delete')
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Employee First Name</th>
                    <th>Employee Last Name</th>
                    <th>Company Email</th>
                    <th>Company Phone</th>
                    <th>Employee Company</th>
                    <th>Operations</th>
                </tr>
                </tfoot>
            </table>
            {{ $employees->onEachSide(5)->links() }}
        </div>







    <!-- /.card-body -->
    </div>
@endsection
@section('js')
    <script>
        window.addEventListener('load',function (){
           /*var mod = document.getElementById('add_modal');
           console.log(mod);
           var first = document.getElementById('first_input');
           var inp = document.createElement('input');
           console.log('from script');
           mod.addEventListener('click',function (e){
              /!* console.log(e.target+ 'you are click add');
               first.appendChild(inp);*!/
               e.target.style.BackgroundColor = 'red';
           })*/
            var btn = document.getElementById('button1');
            btn.addEventListener('click',function (e){
                e.target.style.BackgroundColor = "red";
                alert('test');
            });
        });
    </script>
@endsection
