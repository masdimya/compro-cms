@foreach ($pages as $page)
  <a class="dropdown-item" href="./pagination.html">
    {{$page['name']}}
  </a>
@endforeach