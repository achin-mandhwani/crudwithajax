<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .error {
            color: #FF0000;
            /* red */
        }
    </style>
</head>

<body>
    <h1 text align="center">product Details</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add new Product
    </button>

    <!--modal for adding-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" action="javascript:;" data-action="{{ route('products.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- {{method_field('post')}} --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="clubdata" class="form-label">Select club_id</label> 
                                    <select name="club_id_one" id="club_id_one" class="form-select">
                                        <option value=""></option>
                                        @foreach ($clubs_data as $clubdata)
                                        <option value="{{ $clubdata->id }}">{{ $clubdata->club_name }}</option>
                                        @endforeach
                                    </select> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput2" class="form-label">title</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput2" placeholder="title"
                                            name="title" id="title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput3" class="form-label">product_title</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput3" placeholder="product_title" name="product_title"
                                            id="product_title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput4" class="form-label">type</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput4" placeholder="type" name="type"
                                            id="type">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <span id="output"></span>
                </div>
            </div>
        </div>
    </div>
    <!--modal end-->
    <!--table-->
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th scope="col">club_id</th>
                <th scope="col">title</th>
                <th scope="col">product_title</th>
                <th scope="col">type</th>
                <th scope="col">DeleteAction</th>
                <th scope="col">EditAction</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!--edit modal-->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">edit-club</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="formupdate" action="javascript:;" enctype="multipart/form-data">
                        @csrf
                        {{-- {{method_field('PUT')}} --}}
                         <input type="hidden" id="_method" name="_method" value="post"> 
                        <div class="container">

                            <input type="hidden" id="editID">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="clubdata" class="form-label">Select club_id</label> 
                                    <select name="club_id" id="club_id" class="form-select">
                                        @foreach ($clubs_data as $clubdata)
                                        <option value="{{ $clubdata->id }}">{{ $clubdata->club_name }}</option>
                                        @endforeach
                                    </select> 
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput2" class="form-label">title</label>
                                        <input type="text" class="form-control form-control-lg"
                                             placeholder="title"
                                            name="title" id="title">
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput3" class="form-label">product_title</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="product_title" name="product_title"
                                            id="product_title">
                                    </div>
                                </div>
                            </div>
                            <!---->
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput4" class="form-label">type</label>
                                        <input type="text" class="form-control form-control-lg"
                                           placeholder="type" name="type"
                                            id="type">
                                    </div>
                                </div>
                            </div>
                            <!---->
                             <div class="row ">
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="update-product btn btn-primary"
                                        id="btnSubmit">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <span id="output"></span>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    <!--fetchproductdetails--> 

    <script src="js/product.js"></script>
    <script src="js/validationofproduct.js"></script>
