
$(document).ready(function () {
    // Faculty Table
    var url = $('#faculty_table').attr('action');
    $('#faculty_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type: 'GET',
        },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'gender', name: 'gender' },
            { data: 'email', name: 'email' },
            { data: 'department', name: 'department' },
            { data: 'designation', name: 'designation' },
            { data: 'doj', name: 'doj' },
            { data: 'action', name: 'action' },
        ],
        columnDefs: [
            {
                targets: [6],
                orderable: false,
            },
        ],
    });

    $(document).on('click', '.update_faculty_btn', function () {
        $('#subject_form').reset;
        var f_id = $(this).val()
        $.ajax({
            url: 'edit_faculty',
            type: 'GET',
            data: { id: f_id },
            success: function (data) {
                $('#f_id').val(data.faculty.id);
                if (data.faculty.gender == 'Male') {
                    $('.female').attr("checked", false);
                    $('.male').attr("checked", true);
                }
                else {
                    $('.male').attr("checked", false);
                    $('.female').attr("checked", true);
                }
                $('#floatingName').val(data.faculty.name);
                $('#floatingEmail').val(data.faculty.email);
                $('#department').val(data.faculty.department);
                $('#designation').val(data.faculty.designation);
                $('#doj').val(data.faculty.doj);
            }
        });
    });

    // Delete Faculty script

    $(document).on('click', '.delete_faculty_btn', function () {
        var f_id = $(this).val();
        $(document).on('click', '#delete_faculty_btn', function () {
            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: { id: f_id },
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