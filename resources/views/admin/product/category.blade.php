@extends('layouts.app')

@section('title', 'Category Page')
@section('page-title', 'Category')

@section('meta-tags')
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('css')

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- third party css end -->
@endsection



@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Product Category</h4>
                    <p class="sub-header">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet dolorum facilis fuga molestiae quidem repellendus similique, velit veniam.
                    </p>

                    <!-- Button to trigger the modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        Add Category
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="categoryForm" method="POST" action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Category Name</label>
                                                    <input type="text" id="name" name="name" class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="category_logo" class="form-label">Category Logo</label>
                                                    <input class="form-control" type="file" id="category_logo" name="category_logo">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="mb-1">Status</label>
                                                    <div class="switchery-demo">
                                                        <input type="checkbox" checked data-switchery="true" name="status" data-plugin="switchery" data-color="#039cfd"/>
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row-->

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <h4 class="mt-0 header-title">Categories </h4>
                    <p class="text-muted font-14 mb-3">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium beatae explicabo facilis in minima minus necessitatibus quibusdam repellat!
                    </p>

                    <div class=" mt-5">
                        <table id="category-datatable" class="table table-bordered category-datatable">
                            <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->status }}</td>
                                    <td><img src="{{ asset($category->category_logo) }}" alt="Category Image" style="max-width: 100px; height: auto;"></td>
                                    <td>
                                        <!-- Add action buttons here -->
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- end row -->





@endsection


@section('js')
    <script src="/admin/assets/libs/mohithg-switchery/switchery.min.js"></script>


    <!-- Datatables init -->
    <script src="/admin/assets/js/pages/datatables.init.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#categoryForm').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = new FormData(this); // Create FormData object from form

                $.ajax({
                    url: "{{ route('category.add') }}", // Use the named route for AJAX request
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(); // Optionally reload the page
                            }
                        });
                    },
                    error: function(xhr) {
                        // Show error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: xhr.responseJSON.message || 'An error occurred.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });


        {{--$(document).ready(function () {--}}

        {{--    $(".category-datatable").DataTable({--}}
        {{--        processing: true,--}}
        {{--        serderSide: true,--}}
        {{--        ajax: "{{route('categories.data.yajra')}}",--}}

        {{--        columns : [--}}

        {{--            {data: 'name' ,  name: 'name'},--}}
        {{--            {data: 'description' ,  name: 'description'},--}}
        {{--        ]--}}
        {{--    });--}}

        {{--})--}}
    </script>


@endsection
