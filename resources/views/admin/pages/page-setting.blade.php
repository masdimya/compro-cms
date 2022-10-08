@extends('admin.views.base')
@section('content')
  <div class="container-xl">
    <div class="row row-cards">
      <div class="col-12">
        <div class="my-3 d-flex flex-row-reverse">
          <a href="#" class="btn btn-primary">
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
                          <a class="dropdown-item" href="./docs/index.html">
                            Edit
                          </a>
                          <a class="dropdown-item" href="./changelog.html">
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
@endsection