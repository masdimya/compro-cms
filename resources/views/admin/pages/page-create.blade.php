@extends('admin.views.base')
@section('content')
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Add Page</h3>
          </div>
          <div class="card-body">
            <form action="{{route('page_store')}}" method="post">
              @method('POST')
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Page Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Insert Page Name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Page Type</label>
                    <div class="form-selectgroup">
                      <label class="form-selectgroup-item">
                        <input type="radio" name="type" value="blog" class="form-selectgroup-input" checked="">
                        <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                         </svg>
                          Blog</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="radio" name="type" value="content" class="form-selectgroup-input">
                        <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stack me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 6l-8 4l8 4l8 -4l-8 -4"></path>
                            <path d="M4 14l8 4l8 -4"></path>
                         </svg>
                          Content</span>
                      </label>
                      <label class="form-selectgroup-item">
                        <input type="radio" name="type" value="gallery" class="form-selectgroup-input">
                        <span class="form-selectgroup-label"><!-- Download SVG icon from http://tabler-icons.io/i/circle -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo me-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="15" y1="8" x2="15.01" y2="8"></line>
                            <rect x="4" y="4" width="16" height="16" rx="3"></rect>
                            <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                            <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                         </svg>
                          Gallery</span>
                      </label>
                      
                    </div>
                  </div>
                  <div class="mb-4">
                    <label class="form-label">Page Image</label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                  </div>
                  <div class="d-flex">
                    <a href="{{route('page_create')}}" class="btn ">
                      Cancel
                    </a>
                    <button type="submit" class="btn btn-primary mx-3">
                      Add
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