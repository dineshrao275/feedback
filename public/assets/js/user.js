$(document).ready(function () {
    var url = $('#user_table').attr('action');
    $('#user_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type: 'GET',
        },
        columns: [
            { data: 'username', name: 'username' },
            { data: 'contact', name: 'contact' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action' },
        ],
        columnDefs: [
            {
                targets: [3],
                orderable: false,
            },
        ],
    });
    
    $(document).on('click', '.delete_user_btn', function () {
        var u_id = $(this).val();
        $(document).on('click', '#delete_user_btn', function () {
            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: { id: u_id },
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
})