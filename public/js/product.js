
function fetchproductdetails() {
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/products",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('tbody').html("");
            $.each(response, function (key, item) {
                $('tbody').append(
                    `<tr>
                    <td>${item.club_id}</td>
                    <td>${item.title}</td>
                    <td>${item.product_title}</td>
                    <td>${item.type}</td>
                    <td><button type="button" data-id="${item.id}" class="delete-product btn btn-danger" id="clubdel">Delete</button></td>
                    <td><button type="button" value="${item.id}" class="edit-product btn btn-primary btn-sm">Edit</button></td>
                </tr>`);
            });
        }
    });
}
// <button type="button" data-id="${item.id}" class="delete-student btn btn-danger  btn-sm >Delete</button>

$(document).ready(function () {
    fetchproductdetails();
    var form = '#form';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(form).on('submit', function (event) {
        event.preventDefault();
        $("tbody").empty();
        // var url = $(this).attr('data-action');

        $.ajax({
            url: '/products',
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response) {
                    Swal.fire({

                        title: "nice work",
                        text: "product Added Successfully!",
                        icon: "success"
                    });

                }
                fetchproductdetails()
                $(form).trigger("reset");
                $("#exampleModal").modal('hide');
            },

        });
    });


    //delete using swal
    $(document).on('click', '.delete-product', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        console.log(id);
        Swal.fire({
            title: "Are you sure!",
            icon: "error",
            text: "You won't be able to revert this!",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes delete it!",
            showCancelButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: "http://127.0.0.1:8000/products/" + id,
                    success: function (data) {
                        //
                        $(id).remove();
                        Swal.fire({
                            title: "well done",
                            text: "product Deleted Successfully!",
                            icon: "success"
                        });
                        fetchproductdetails();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }

                });
            }
        } )
        })
    
        //edit button

        $(document).on('click', '.edit-product', function (e) {
            $('#_method').val("PUT")
            e.preventDefault();
            var id = $(this).val();
            // console.log(id);
            $('#editmodal').modal('show');
            $.ajax({
                type: 'GET',
                url: "http://127.0.0.1:8000/edit-product/" + id,
                dataType: 'JSON',
                success: function (response) {
                    console.log(response);
                    // console.log(response.product.club_id);
                    console.log(id);
                    // if (response.status == 200) {
                    $('#editID').val(response.product.id);
                    $('#club_id').val(response.product.club_id);
                    $('#title').val(response.product.title);
                    $('#product_title').val(response.product.product_title);
                    $('#type').val(response.product.type);

                    //}

                }
            });
        });
        $('#formupdate').on('submit', function (e) {

            // var id = $(this).val();
            console.log($('#_method').val());
            var id = $('#editID').val();
            console.log(id);
            // var id = $(this).val();
            var data = {
                'club_id': $('#club_id').val(),
                'title': $('#title').val(),
                'product_title': $('#product_title').val(),
                'type': $('#type').val(),
            }
            console.log(data);
            $.ajax({
                type: 'POST',
                url: "http://127.0.0.1:8000/update-product/" + id,
                dataType: 'JSON',
                data: data,
                success: function (response) {
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({

                            title: "well done",
                            text: "club details updated Successfully!",
                            icon: "success"
                        });

                    }
                    $('#editmodal').find('input').val('');
                    $('#editmodal').modal('hide');
                    fetchproductdetails();
                }
            });
            e.preventDefault();
        });
    });
