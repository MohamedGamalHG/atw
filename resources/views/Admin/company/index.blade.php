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
    @include('Admin.company.add')
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
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Website</th>
                    <th>Company logo</th>
                    <th>Operations</th>
                </tr>
                </thead>

                <tbody>
                <?php $i=0;?>
                @foreach($companies as $com)
                <tr>
                    <td>{{++$i}}</td>
                    <td>{{$com->name}}</td>
                    <td>{{$com->email}}</td>
                    <td>{{$com->website}}</td>
                    <td><img src="{{asset('storage/image/'.explode('_',$com->logo)[0].'/'.$com->logo) }}" width="100" height="100"> </td>
                    <td>
                        <button  class="btn  btn-danger" data-bs-toggle="modal" data-bs-target="#Delete{{$com->id}}">Delete</button>
                        <button class="btn  btn-success" data-bs-toggle="modal" data-bs-target="#Edit{{$com->id}}"> Edit</button>
                    </td>
                </tr>
                @include('Admin.company.edit')
                @include('Admin.company.delete')
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Website</th>
                    <th>Company logo</th>
                    <th>Operations</th>
                </tr>
                </tfoot>
            </table>
            {{ $companies->onEachSide(5)->links() }}
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
