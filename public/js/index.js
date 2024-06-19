function fetchclubdetails() {
    $.ajax({
        type: "GET",
        url: "http://127.0.0.1:8000/club",
        dataType: "json",
        success: function (response) {
            // console.log(response);
            $('tbody').html("");
            $.each(response, function (key, item) {
                $('tbody').append(
                    `<tr>
                    <td>${item.group_id}</td>
                    <td>${item.business_name}</td>
                    <td>${item.club_number}</td>
                    <td>${item.club_name}</td>
                    <td>${item.club_state}</td>
                    <td>${item.club_description}</td>
                    <td>${item.club_slug}</td>
                    <td>${item.website_title}</td>
                    <td>${item.website_link}</td>      
                    <td><img src="images/${item.club_logo}" width="100" class="img-thumbnail rounded-circle" alt="abcd"></td>
                     <td><img src="images/${item.club_banner}" width="100" class="img-thumbnail rounded-circle" alt="abd"></td>
                    <td><button type="button" data-id="${item.id}" class="delete-student btn btn-danger" id="clubdel">Delete</button></td>
                    <td><button type="button" value="${item.id}" class="edit-btn btn btn-primary btn-sm">Edit</button></td>
                </tr>`);
            });
        }
    });
}
// <button type="button" data-id="${item.id}" class="delete-student btn btn-danger  btn-sm >Delete</button>

$(document).ready(function () {
    fetchclubdetails();
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
            url: '/club',
            method: 'POST',
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response) {
                    console.log("abc");
                    Swal.fire({
                        
                        title: "well done",
                        text: "club Added Successfully!",
                        icon: "success"
                      });
                }
                fetchclubdetails()
                $(form).trigger("reset");
                $("#exampleModal").modal('hide');
            },

        });
    });


    // $('body').on('click', '.delete-student', function (event) {

    //     event.preventDefault();
    //     let id = $(this).data("id");
    //     $abc = confirm("Are You sure want to delete !");
    //     console.log($abc);
    //     console.log(id);
    //     if ($abc) {
    //         $.ajax({
    //             type: "DELETE",
    //             url: "http://127.0.0.1:8000/club/" + id,
    //             success: function (data) {
    //                 $(id).remove();
    //                 Swal.fire({
    //                     title: "well done",
    //                     text: "User Deleted Successfully!",
    //                     icon: "success"
    //                   });
    //                 fetchclubdetails();
    //             },
    //             error: function (data) {
    //                 console.log('Error:', data);
    //             }
    //         });
    //     }
    // });
    //delete using swal
    $(document).on('click', '.delete-student', function (e) {
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
                    url: "http://127.0.0.1:8000/club/" + id,
                    success: function (data) {
                        //
                        $(id).remove();
                        Swal.fire({
                            title: "well done",
                            text: "club Deleted Successfully!",
                            icon: "success"
                        });
                        fetchclubdetails();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }

                });
            }
        } )
        })
    //edit
    $(document).on('click', '.edit-btn', function (e) {
        $('#_method').val("PUT")
        e.preventDefault();
        var id = $(this).val();
        // console.log(id);
        $('#edit_modal').modal('show');
        $.ajax({
            method: 'GET',
            url: "http://127.0.0.1:8000/edit-btn/" + id,
            dataType: 'JSON',
            success: function (response) {
                //  console.log(response);

                if (response.status == 200) {
                    $('#editID').val(response.club.id);
                    $('#group_id').val(response.club.group_id);
                    $('#business_name').val(response.club.business_name);
                    $('#club_number').val(response.club.club_number);
                    $('#club_name').val(response.club.club_name);
                    $('#club_state').val(response.club.club_state);
                    $('#club_description').val(response.club.club_description);
                    $('#club_slug').val(response.club.club_slug);
                    $('#website_title').val(response.club.website_title);
                    $('#website_link').val(response.club.website_link);
                    // $("#club_logo").html(
                    //     `<img src="images/${response.club.club_logo}" width="100" class="img-fluid img-thumbnail">`);
                    // $("#club_banner").html(
                    //     `<img src="images/${response.club.club_banner}" width="100" class="img-fluid img-thumbnail">`);

                }
                else {
                    alert('hij');
                }
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
            'group_id': $('#group_id').val(),
            'business_name': $('#business_name').val(),
            'club_number': $('#club_number').val(),
            'club_name': $('#club_name').val(),
            'club_state': $('#club_state').val(),
            'club_description': $('#club_description').val(),
            'club_slug': $('#club_slug').val(),
            'website_title': $('#website_title').val(),
            'website_link': $('#website_link').val(),
            // 'club_logo': $('#club_logo').val(),
            // 'club_banner': $('#club_banner').val(),
        }
        console.log(data);
        $.ajax({
            type: 'POST',
            url: "http://127.0.0.1:8000/update-club/" + id,
            dataType: 'JSON',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log(response);
                if (response.status == 200) {
                    Swal.fire({
                        
                        title: "well done",
                        text: "club details updated Successfully!",
                        icon: "success"
                      });
                }
                $('#edit_modal').find('input').val('');
                $('#edit_modal').modal('hide');
                fetchclubdetails();
            }
        });
        e.preventDefault();
    });
});
//   value="' + item.id + '"

{/* <td><button type="button" data-edit_id="${item.id}" class="edit-student btn btn-success">Edit</button></td> */ }