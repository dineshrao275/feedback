// subjects.js
$(document).ready(function () {
    var url = $('#subject_table').attr('action');
    $('#subject_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: url,
            type: 'GET',
        },
        columns: [
            { data: 'course', name: 'course' },
            { data: 'semester_year', name: 'semester_year' },
            { data: 'faculty', name: 'faculty' },
            { data: 'section', name: 'section' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' },
        ],
        columnDefs: [
            {
                targets: [6],
                orderable: false,
            },
        ],
    });

    $('#subject_form').ready(function () {

        $(document).on('change', '#course_id', function () {
            var option = "";
            var c_id = $(this).val();
            $.ajax({
                url: 'get_type',
                type: 'GET',
                data: { id: c_id },
                success: function (data) {
                    console.log(data)
                    if (data.type == "Master") {
                        
                        option += "<option value='I'>I</option>";
                        option += "<option value='II'>II</option>";
                        option += "<option value='III'>III</option>";
                        option += "<option value='IV'>IV</option>";
                    }
                    else {
                        option += "<option value='I'>I</option>";
                        option += "<option value='II'>II</option>";
                        option += "<option value='III'>III</option>";
                    }
                    $('#semester_year').html(option);
                }
            });
        })



    });

    $(document).on('click', '.update_subject_btn', function () {
        var s_id = $(this).val();
        var option = "";
        $.ajax({
            url: $(this).attr('action'),
            type: 'GET',
            data: { id: s_id },
            success: function (data) {
                option += "<option value=''>Select Faculty</option>";
                data.faculty.forEach(faculty => {
                    option += "<option value='" + faculty.id + "'>" + faculty.name + "</option>";
                });
                $('#faculty_id').html(option);
                option = "<option value=''>Select Course</option>";
                data.course.forEach(course => {
                    option += "<option value='" + course.id + "'>" + course.name + "</option>";
                });
                $('#course_id').html(option);
                $('#faculty_id').val(data.subject.faculty_id);
                $('#course_id').val(data.subject.course_id);
                $('#s_id').val(data.subject.id);
                $('#semester_year').val(data.subject.semester_year)
                $('#section').val(data.subject.section);
                $('#subjectcode').val(data.subject.code);
                $('#subjectname').val(data.subject.name);
            }
        });
    });


    $(document).on('click', '.delete_subject_btn', function () {
        var s_id = $(this).val();
        $('#delete_subject_btn').click(function () {
            $.ajax({
                url: $(this).attr('action'),
                type: 'GET',
                data: { id: s_id },
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
