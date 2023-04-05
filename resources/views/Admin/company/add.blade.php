<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add {{\Illuminate\Support\Facades\Request::segment(2)}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('companies.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">

                            <input type="text" id="first_input" class="form-control mt-2" name="company_name" placeholder="company name .....">
                            <input type="email"  class="form-control mt-2" name="company_email" placeholder="company email .....">
                            <input type="text"  class="form-control mt-2" name="company_website" placeholder="company website .....">
                            <input type="file" name="company_logo" class="form-control-file mt-2" accept="image/*" multiple>

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
