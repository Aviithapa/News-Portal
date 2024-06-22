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
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a href="{{ route('ads.create') }}" class="btn btn-primary" style="color: white;">Create New Ads</a>
                                            </div>
                                            <h5 class="header-title mb-0">Ads List</h5>
                                        </div>
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                            <div class="table-responsive">
                                                <table class="table table-nowrap table-hover mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Link</th>
                                                            <th>Is Active</th>
                                                            <th>Slug</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($ads as $data)
                                                        <tr>
                                                            <td>{{ $data->id }}</td>
                                                            <td>{{ $data->title }}</td>
                                                            <td>{{ $data->link }}</td>
                                                            <td>
                                                                <input type="checkbox" class="form-check-input toggle-checkbox" data-id="{{ $data->id }}" data-attribute="is_active" {{ $data->is_active ? 'checked' : '' }}>
                                                            </td>
                                                            <td>{{ $data->slug }}</td>
                                                             
                                                            
                                                            <td>
                                                                <a href="{{ route('ads.edit', ['ad' => $data->id]) }}"><span class="badge bg-info-subtle text-info">Edit</span></a>
                                                            </td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>

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
                url: '/dashboard/ads/' + newsId, // Adjust the URL to match your route
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