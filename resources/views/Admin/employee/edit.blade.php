<div class="modal fade" id="Edit{{$emp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add {{\Illuminate\Support\Facades\Request::segment(2)}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('employees.update','test')}}" method="post" enctype="multipart/form-data">
                @csrf
                {{method_field('put')}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input type="hidden" name="id" value="{{$emp->id}}">
                            <input type="text" id="first_input" value="{{$emp->first_name}}" class="form-control mt-2" name="first_name" placeholder="employee first name .....">
                            <input type="text" value="{{$emp->last_name}}" class="form-control mt-2" name="last_name" placeholder="employee last name .....">
                            <input type="email" value="{{$emp->email}}"  class="form-control mt-2" name="email" placeholder="employee email .....">
                            <input type="text" value="{{$emp->phone}}"  class="form-control mt-2" name="phone" placeholder="employee phone .....">
                            <select class="form-control mt-2" name="company_id">
                                @foreach($companies as $com)
                                    <option value="{{$com->id}}">{{$com->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>


        </div>

    </div>
</div>
