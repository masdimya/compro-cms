@extends('admin.views.base')
@section('content')
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Page</h3>
          </div>
          <div class="card-body">
            <form action="{{route('page_update',['id' => $id])}}" method="post">
              @method('PUT')
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Page Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Insert Page Name" value="{{$name}}">
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Page Image</label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                  </div>
                  <div class="d-flex">
                    <a href="{{route('page_setting')}}" class="btn ">
                      Cancel
                    </a>
                    <button type="submit" class="btn btn-primary mx-3">
                      Update
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection