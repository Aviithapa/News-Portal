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

                        <div class="row">
    
                            <div class="col-xl-12">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('category.create') }}" class="btn btn-primary" style="color: white;">Create New Category</a>
                                            </div>
                                            <h5 class="header-title mb-0">Category List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Name Nepali</th>
                                                            <th>Sub Category</th>
                                                            <th>Order</th>
                                                            <th>Featured in Home Page</th>
                                                            <th>Featured in Menu Bar</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($category as $data)
                                                        <tr>
                                                            <td>{{ $data->id }}</td>
                                                            <td>{{ $data->name }}</td>
                                                            <td>{{ $data->name_nepali }}</td>
                                                           
                                                            <td>
                                                              @foreach($data->children as $child)
                                                                   <span class="badge bg-primary-subtle text-primary"> {{ $child->name }} </span>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <input type="number" name="order[{{ $data->id }}]" value="{{ $data->order }}" class="form-control category-order" data-id="{{ $data->id }}">
                                                            </td>
                                                             <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_active_to_home" {{ $data->is_active_to_home ? 'checked' : '' }}>
                                                            </td>
                                                             <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_show_to_menu" {{ $data->is_show_to_menu ? 'checked' : '' }}>
                                                            </td>


                                                           
                                                            <td><a href="{{ route('category.edit', ['category' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                              </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                   <div style="padding: 10px; float:right;">
                                                {{  $category->appends(request()->query())->links('admin.layout.pagination') }}
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
                url: '/dashboard/updateCategory/' + newsId, // Adjust the URL to match your route
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

<script>
    $(document).ready(function(){
        $('.category-order').on('blur', function(){
            let id = $(this).data('id');
            let order = $(this).val();
    
            $.ajax({
                url: '/category/update-order',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    order: order
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });
    });
    </script>
@endpush