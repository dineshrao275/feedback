$(document).ready(function () {
    var url = $('#topic_table').attr('action');
    $('#topic_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type: 'GET',
        },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' },
        ],
        columnDefs: [
            {
                targets: [1],
                orderable: false,
            },
        ],
    });

    $(document).on('click','.update_topic_btn',function () {
        var t_id = $(this).val()
        $.ajax({
            url: $(this).attr('action'),
            type: 'GET',
            data: { id: t_id },
            success: function (data) {
                $('#t_id').val(data.id);
                $('#topicname').val(data.name);
            }
        });
    });

    $(document).on('click', '.delete_topic_btn', function () {
        var t_id = $(this).val();
        $(document).on('click', '#delete_topic_btn', function () {
            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: { id: t_id },
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