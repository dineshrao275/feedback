$(document).ready(function () {
  $(document).on('change', '#course_id', function () {
    var option = "";
    var c_id = $(this).val();
    $.ajax({
      url: $(this).attr('action'),
      type: 'GET',
      data: { id: c_id },
      success: function (data) {
        if (data.type == "Master") {
          option += "<option value=''>Select Semester</option>";
          option += "<option value='I'>I</option>";
          option += "<option value='II'>II</option>";
          option += "<option value='III'>III</option>";
          option += "<option value='IV'>IV</option>";
        }
        else if (data.type == "Bachelor") {
          option += "<option value=''>Select Year</option>";
          option += "<option value='I'>I</option>";
          option += "<option value='II'>II</option>";
          option += "<option value='III'>III</option>";
        }
        else {
          option += "";
        }
        $('#semester_year').html(option);
      }
    });
  });

  $('#semester_year').change(function () {
    var option = "<option value=''>Select Section</option>";
    var c_id = $('#course_id').val();
    var sem_year = $(this).val();
    $.ajax({
      url: 'get_section_student',
      type: 'GET',
      data: {
        id: c_id,
        sem_year: sem_year
      },
      success: function (data) {
        for (let index = 0; index < data.length; index++) {
          option += "<option value=" + data[index].section + ">" + data[index].section + "</option>";
        }
        $('#section').html(option);
      }
    });
  })

  $('#erp_id').on("focusout", function () {
    var c_id = $('#course_id').val();
    var sem_year = $('#semester_year').val();
    var section = $('#section').val();
    $.ajax({
      url: 'get_feedbackdata_student',
      type: 'GET',
      data: {
        id: c_id,
        sem_year: sem_year,
        section: section,
        erp_id: $(this).val()
      },
      success: function (response) {
        if (response.success == "success") {
          console.log(response);
          $('#feedbacktable').html(response.output);
          $('#student_name').val(response.student[0].name);
          $('#session').val(response.student[0].session);
        }
        else if (response.error == 'error')
          toastr['error'](response.message);
      }
    });
  });

  if ($('body.student_table').length) {
    var url = $('#student_table').attr('action');
    $('#student_table').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: url,
        type: 'GET',
      },
      columns: [
        { data: 'erp_id', name: 'erp_id' },
        { data: 'name', name: 'name' },
        { data: 'course', name: 'course' },
        { data: 'semester_year', name: 'semester_year' },
        { data: 'section', name: 'section' },
        { data: 'session', name: 'session' },
      ]
    });
  }
});
