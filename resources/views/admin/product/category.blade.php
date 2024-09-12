@extends('layouts.app')

@section('title', 'Category Page')
@section('page-title', 'Category')

@section('meta-tags')
{{--    <meta name="description" content="This is the category page description for SEO purposes.">--}}
{{--    <meta name="keywords" content="ecommerce, category, products, buy, sell">--}}
{{--    <meta property="og:title" content="Category Page">--}}
{{--    <meta property="og:description" content="Explore our wide range of products in this category.">--}}
{{--    <meta property="og:image" content="path/to/image.jpg">--}}
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('css')
    <!-- third party css -->
    <link href="/admin/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/assets/libs/mohithg-switchery/switchery.min.css" rel="stylesheet" type="text/css" />

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

                    <table id="responsive-datatable" class="table table-bordered table-bordered dt-responsive nowrap">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            <td>uashd</td>
                            <td>uashd</td>
                            <td>uashd</td>
                            <td>
                                <div class="switchery-demo">
                                    <input type="checkbox" checked data-switchery="true" name="status" data-plugin="switchery" data-color="#039cfd"/>
                                </div>
                            </td>
                            <td>uashd</td>
                            <td>uashd</td>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div> <!-- end row -->





@endsection


@section('js')
    <script src="/admin/assets/libs/mohithg-switchery/switchery.min.js"></script>

    <!-- third party js -->
    <script src="/admin/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/admin/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="/admin/assets/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="/admin/assets/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="/admin/assets/js/pages/datatables.init.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    </script>


@endsection
