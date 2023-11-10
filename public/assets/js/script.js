$(document).ready(function(){

    // var url = window.location.pathname;
    // console.log('hello');



// Faculty Table

    $('.update_faculty_btn').click(function(){
        var f_id=$(this).val()
        console.log(f_id);
        $.ajax({
            url:'edit_faculty',
            type:'GET',
            data:{id:f_id},
            success: function(data){
                $('#f_id').val(data.id);
                $('#floatingName').val(data.name);
                $('#floatingEmail').val(data.email);
                $('#department').val(data.department);
                $('#designation').val(data.designation);
                $('#doj').val(data.doj);
            }
        });
    });

    // Delete Faculty script

    $('.delete_faculty_btn').click(function(){
        $('#delete_faculty_btn').val($(this).val());
        $('#delete_faculty_btn').click(function(){
            var f_id = $(this).val();
            $.ajax({
                url:'delete_faculty',
                type:'GET',
                data:{id:f_id},
                success:function(){
                    $('#basicModal').display='none';
                }
            }); 
        });
    });

//  Course Table

$('.update_course_btn').click(function(){
    var c_id=$(this).val()
    console.log(c_id);
    $.ajax({
        url:'edit_course',
        type:'GET',
        data:{id:c_id},
        success: function(data){
            $('#c_id').val(data.id);
            $('#coursename').val(data.name);
            $('#department').val(data.department);
            $('#type').val(data.type);
        }
    });
});

// Delete Course

$('.delete_course_btn').click(function(){
    $('#delete_course_btn').val($(this).val());
    $('#delete_course_btn').click(function(){
        var c_id = $(this).val();
        $.ajax({
            url:'delete_course',
            type:'GET',
            data:{id:c_id},
            success:function(){
                $('#delete_course_modal').display='none';
            }
        }); 
    });
});


// subjects

$('#subject_form').ready(function(){
    $.ajax({
        url:'get_courses',
        type:'GET',
        success:function(data){
            var output ="<option value='' selected disabled>Select Course</option>";
            for (let course = 0; course < data.length; course++) {
                var s_id = data[course].id;
                var s_name = data[course].name;
                output +="<option value="+s_id+" >"+ s_name +"</option>";
            }
            $('#course_id').html(output);
                    
        }        
    });

    $.ajax({
        url:'get_subjects_faculties',
        type:'GET',
        success:function(data){
            var output ="<option value='' selected disabled>Select faculties</option>";
            for (let faculty = 0; faculty < data.length; faculty++) {
                var f_id = data[faculty].id;
                var f_name = data[faculty].name;
                output +="<option data-tokens="+ f_name +" value="+f_id+" >"+ f_name +"</option>";
            }
            $('#faculty_id').html(output);
                    
        }        
    });

    $('#course_id').change(function(){
        var option="";
        var c_id = $(this).val();
        $.ajax({
            url:'get_type',
            type:'GET',
            data:{id:c_id},
            success:function(data){
                if(data[0].type == "Master"){
                    option +="<option value='' selected disabled >Select Semester</option>";
                    option +="<option value='I'>I</option>";
                    option +="<option value='II'>II</option>";
                    option +="<option value='III'>III</option>";
                    option +="<option value='IV'>IV</option>";
                }
                else{
                    option +="<option value='' selected disabled >Select Year</option>";
                    option +="<option value='I'>I</option>";
                    option +="<option value='II'>II</option>";
                    option +="<option value='III'>III</option>";
                }                                
                $('#semester_year').html(option);
            }
        });
    })
    
    
    
});

$('.update_subject_btn').click(function(){
    var s_id=$(this).val()
    $.ajax({
        url:'edit_subject',
        type:'GET',
        data:{id:s_id},
        success: function(data){
            $('#s_id').val(data['subject'].id);
            $('#section').val(data['subject'].section);
            $('#subjectcode').val(data['subject'].code);
            $('#subjectname').val(data['subject'].name);
        }
    });
});


$('.delete_subject_btn').click(function(){
    $('#delete_subject_btn').val($(this).val());
    $('#delete_subject_btn').click(function(){
        var s_id = $(this).val();
        $.ajax({
            url:'delete_subject',
            type:'GET',
            data:{id:s_id},
            success:function(){
                $('#delete_subject_modal').display='none';
            }
        }); 
    });
});


// Topics Js


$('.update_topic_btn').click(function(){
    var t_id=$(this).val()
    $.ajax({
        url:'edit_topic',
        type:'GET',
        data:{id:t_id},
        success: function(data){
            $('#t_id').val(data.id);
            $('#topicname').val(data.name);
        }
    });
});


$('.delete_course_btn').click(function(){
    $('#delete_course_btn').val($(this).val());
    $('#delete_subject_btn').click(function(){
        var s_id = $(this).val();
        $.ajax({
            url:'delete_subject',
            type:'GET',
            data:{id:s_id},
            success:function(){
                $('#delete_subject_modal').display='none';
            }
        }); 
    });
});


toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }



});





