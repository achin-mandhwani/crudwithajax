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
    <h1 text align="center">Club Details</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add new club
    </button>

    <!--modal for adding-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adding New Club</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form" action="javascript:;" data-action="{{ route('club.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- {{method_field('post')}} --}}
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">group_id</label>
                                        <input type="number" class="form-control form-control-lg"
                                            id="exampleFormControlInput1" placeholder="group_id" name="group_id"
                                            id="group_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput2" class="form-label">business_name</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput2" placeholder="business_name"
                                            name="business_name" id="business_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput3" class="form-label">club_number</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput3" placeholder="club_number" name="club_number"
                                            id="club_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput4" class="form-label">club_name</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput4" placeholder="club_name" name="club_name"
                                            id="club_name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput5" class="form-label">club_state</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput5" placeholder="club_state" name="club_state"
                                            id="club_state">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <label for="floatingTextarea">Description</label>
                                    <textarea class="form-control" placeholder="Leave a comment here" id="club_descriptions" name="club_descriptions"
                                        style="height: 100px"></textarea>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput6" class="form-label">club_slug</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput6" placeholder="club_slug" name="club_slug"
                                            id="club_slug">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput7" class="form-label">website_title</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput7" placeholder="website_title"
                                            name="website_title" id="website_title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput8" class="form-label">website_link</label>
                                        <input type="text" class="form-control form-control-lg"
                                            id="exampleFormControlInput8" placeholder="website_link"
                                            name="website_link" id="website_link">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mt-3">
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" type="file" id="club_logo" name="club_logo">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="mt-3">
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" type="file" id="club_banner"
                                            name="club_banner">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
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
                <th scope="col">group_id</th>
                <th scope="col">business_name</th>
                <th scope="col">club_number</th>
                <th scope="col">club_name</th>
                <th scope="col">club_state</th>
                <th scope="col">club_description</th>
                <th scope="col">club_slug</th>
                <th scope="col">website_title</th>
                <th scope="col">website_link</th>
                <th scope="col">club_logo</th>
                <th scope="col">club_banner</th>
                <th scope="col">DeleteAction</th>
                <th scope="col">EditAction</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!--edit modal-->
    <div class="modal fade" id="edit_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label for="exampleFormControlInput1" class="form-label">group_id</label>
                                        <input type="number" class="form-control form-control-lg"
                                            placeholder="group_id" name="group_id" id="group_id">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput2" class="form-label">business_name</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="business_name" name="business_name" id="business_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput3" class="form-label">club_number</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="club_number" name="club_number" id="club_number">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput4" class="form-label">club_name</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="club_name" name="club_name" id="club_name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput5" class="form-label">club_state</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="club_state" name="club_state" id="club_state">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <label for="floatingTextarea">Description</label>
                                    <textarea class="form-control" id="club_description"  name="club_description"
                                        style="height: 100px"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput6" class="form-label">club_slug</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="club_slug" name="club_slug" id="club_slug">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput7" class="form-label">website_title</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="website_title" name="website_title" id="website_title">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput8" class="form-label">website_link</label>
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="website_link" name="website_link" id="website_link">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                            <div class="col-sm-12">
                                <div class="mt-3">
                                    <label for="formFile" class="form-label">Default file input example</label>
                                    <input class="form-control" type="file" id="club_logo" name="club_logo">
                                </div>
                            </div>
                        </div>
                        <!--clubbanner-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="mt-3">
                                    <label for="formFile" class="form-label">Default file input example</label>
                                    <input class="form-control" type="file" id="club_banner"
                                        name="club_banner">
                                </div>
                            </div>
                        </div> 
                            <div class="row ">
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="update-student btn btn-primary"
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
    <!--fechclubsteails-->

    <script src="js/index.js"></script>
    <script src="js/validation.js"></script>
