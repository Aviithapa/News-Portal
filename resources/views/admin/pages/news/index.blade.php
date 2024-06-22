@extends('admin.layout.app')

@section('content')

  <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Innov8itcode</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">News</a></li>

                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                         <div class="card">
                               
                                    <form action="{{  route("user.index") }}"  method="GET" novalidate>
                                        <div class="row" style="padding: 20px 10px 0px 10px;"> 
                                            
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">                                   
                                                    <input type="text" class="form-control" id="validationCustom01" placeholder="Name" name="name" value="{{ isset($request) ? $request->get('name') : '' }}">
                                                </div>
                                            </div> 
                                            <div class="col-lg-4 col-md-4 col-sm-6"> 
                                                <div class="mb-3">
                                                    <input type="email" class="form-control" id="validationCustom01" placeholder="Email" name="email" value="{{ isset($request) ? $request->get('email') : '' }}">
                                                </div>
                                            </div>
                                             
                                              <div class="col-lg-3 col-md-3 col-sm-6"> 
                                                <div class="mb-3">
                                                       <select class="form-select mb-3" name="role">
                                                            <option value="{{ isset($request) ? $request->get('role') : '' }}" >{{ isset($request) ? $request->get('role') : 'Search by role' }}</option>
                                                            
                                                        </select> 
                                                        </div>
                                            </div>
                                            <div class="col-lg-1 col-md-1 col-sm-6"> 
                                                <button class="btn btn-primary" type="submit">Search</button>
                                             </div>
                                        </div>
                                      
                                       
                                    </form>
                                </div>     

                     
                        <div class="row">
    
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('news.create') }}" class="btn btn-primary" style="color: white;">Create New News</a>
                                            </div>
                                            <h5 class="header-title mb-0">News List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Is Breaking News</th>
                                                            <th>Is Trending News</th>
                                                            <th>Is Top Rated News</th>
                                                            <th>Is Top  News</th>
                                                            <th>Is Featured Post</th>
                                                            <th>Is Popular News</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($news as $data)
                                                        <tr>
                                                            <td>{{ $data->id }}</td>
                                                            <td>{{ $data->title }}</td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_breaking_news" {{ $data->is_breaking_news ? 'checked' : '' }}>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_trending_news" {{ $data->is_trending_news ? 'checked' : '' }}>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_top_rated" {{ $data->is_top_rated_news ? 'checked' : '' }}>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_top_news" {{ $data->is_top_news ? 'checked' : '' }}>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_featured_post" {{ $data->is_featured_post ? 'checked' : '' }}>
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_popular_news" {{ $data->is_popular_news ? 'checked' : '' }}>
                                                            </td>
                                                            
                                                            <td><a href="{{ route('news.edit', ['news' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                               <a  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat"  data-attr="{{ route('news.destroy', ['news' => $data->id]) }}" style="cursor: pointer;"><span class="badge bg-danger-subtle text-danger">Delete</span></a>                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                   <div style="padding: 10px; float:right;">
                                                {{  $news->appends(request()->query())->links('admin.layout.pagination') }}
                                                </div>
                                            </div>        
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>

                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="mySmallModalLabel">Delete Modal</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure want to delete?
                                                    </div>
                                                    <div class="modal-footer">
                                                         <form  action="#" method="POST" id="deleteForm">
                                                                  @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            </form>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

@endsection

@push('scripts')
<script> 
     const exampleModal = document.getElementById('exampleModal')
     exampleModal.addEventListener('show.bs.modal', event => {
     const button = event.relatedTarget
     const recipient = button.getAttribute('data-attr')
      document.getElementById('deleteForm').action = recipient; 
     })
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-checkbox').change(function() {
            var newsId = $(this).data('id');
            var attribute = $(this).data('attribute');
            var checked = $(this).prop('checked');

            $.ajax({
                url: '/dashboard/news/' + newsId, // Adjust the URL to match your route
                method: 'POST', // Use POST method
                data: {
                    _method: 'PUT', // Use _method key to override method to PUT
                    _token: '{{ csrf_token() }}', // Include CSRF token for security
                    attribute: attribute,
                    checked: checked ? 1 : 0,
                },
                success: function(response) {
                    console.log(response); // Handle success response
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Handle error response
                }
            });
        });
    });
</script>
    
@endpush