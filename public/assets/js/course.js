$(document).ready(function () {

    var url = $('#course_table').attr('action');
    $('#course_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type: 'GET',
        },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'department', name: 'department' },
            { data: 'action', name: 'action' },
        ],
        columnDefs: [
            {
                targets: [2],
                orderable: false,
            },
        ],
    });


    $(document).on('click', '.update_course_btn', function () {
        var c_id = $(this).val();
        $.ajax({
            url: $(this).attr('action'),
            type: 'GET',
            data: { id: c_id },
            success: function (data) {
                $('#c_id').val(data.id);
                $('#coursename').val(data.name);
                $('#department').val(data.department);
                $('#type').val(data.type);
            }
        });
    });

    // Delete Course

    $(document).on('click', '.delete_course_btn', function () {
        var c_id = $(this).val();
        $(document).on('click', '#delete_course_btn', function () {
            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: { id: c_id },
                success: function (response) {
                    if (response.status == 'success')
                        toastr.success(response.message);
                    else
                        toastr.error('Please try again later');
                    window.location.href = response.url;
                }
            });
        });
    });
});