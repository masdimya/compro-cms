@extends('admin.views.base')
@section('content')
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-12">
        <div class="mb-3 d-flex flex-row-reverse">
          <a href="{{route('page_create')}}" class="btn btn-primary">
            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            Add Page
          </a>
          
        </div>
        <div class="card">
          <div>
            <table class="table table-vcenter card-table table-striped">
              <thead>
                <tr>
                  <th>Page Name</th>
                  <th>Type</th>
                  <th class="w-1"></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pageList as $page)
                  <tr>
                    <td>{{$page['name']}}</td>
                    <td><span class="badge bg-blue">{{ucwords($page['type'])}}</span></td>
                    <td>
                      <div class="dropdown">
                        <div class="btn btn-sm dropdown-toggle" data-bs-toggle="dropdown"  role="button" >
                          Action
                        </div>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="{{route('page_edit',['id'=> $page['id']])}}">
                            Edit
                          </a>
                          <a class="dropdown-item delete-page" data-page="{{$page['id']}}" href="#" class="btn" data-bs-toggle="modal" data-bs-target="#modal-delete">
                            Delete
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="modal-status bg-danger"></div>
        <div class="modal-body text-center py-4">
          <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
          <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 9v2m0 4v.01" /><path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" /></svg>
          <h3>Are you sure?</h3>
          <div class="text-muted">Do you really want to remove this page ? </div>
        </div>
        <div class="modal-footer">
          <div class="w-100">
            <div class="row">
              <div class="col">
                <a id="cancel-delete" href="#" class="btn w-100" data-bs-dismiss="modal">
                  Cancel
                </a></div>
              <div class="col">
                <form id="formDelete" action="{{route('page_delete',['id' => 'ID'])}}" default-action="{{route('page_delete',['id' => 'ID'])}}" method="post">
                  @method('DELETE')
                  <button href="#" class="btn btn-danger w-100" data-bs-dismiss="modal">
                    Delete
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@push('script')
    <script>
      const el = document.querySelectorAll(".delete-page");
      
      el.forEach(function(element) {
          element.addEventListener("click", function() {
            const pageId = this.getAttribute('data-page')
            const form = document.getElementById('formDelete')

            const url = form.getAttribute('action').replace('ID',pageId)
            form.setAttribute('action', url)
          });
      });

      const cancelDelete = document.getElementById('cancel-delete')
      cancelDelete.addEventListener("click", function() {
        const form = document.getElementById('formDelete')
        const url = form.getAttribute('default-action')
        console.log(url)
        form.setAttribute('action', url)
      })

    </script>
@endpush
@endsection