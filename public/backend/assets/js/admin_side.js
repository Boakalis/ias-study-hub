//Checking CUrrent Password in Profile
$(document).ready(function(){
    $("#current_pwd").keyup(function(){
        var current_pwd = $("#current_pwd").val();

        $.ajax({
            type: 'post' ,
            url : '/admin/check-current-pwd',
            data :{ current_pwd:current_pwd},
            success:function(resp){
                if(resp=="false"){
                    $("#chkCurrentPwd").html("<font color=red>Current Password is Incorrect</font>");
                }else if(resp=="true"){
                    $("#chkCurrentPwd").html("<font color=green>Current Password is Correct</font>")
                }
            },error:function(){
                alert("Error");
            }
        });
    });


    //Updating the Subject Status

    $(".updateSubjectStatus").click(function(){
        var status = $(this).text();
        var subject_id = $(this).attr("subject_id");

        $.ajax({
            type: 'post',
            url:'/admin/update-subject-status',
            cache: false,
            data:{status:status,subject_id:subject_id},
            success:function(resp){
                // alert(resp['status']);
                // alert(resp['subject_id']);
                if(resp['status']==0){
                    $("#subject-"+subject_id).html("<a class='updateSubjectStatus' href='javascript:void(0)' >InActive</a>");
                }else if(resp['status']==1){
                    $("#subject-"+subject_id).html("<a class='updateSubjectStatus' href='javascript:void(0)' >Active</a>");
                }
                // window.location.reload(true);
            },error:function(){
                alert("Error");
            }

        });
    });

    //Updating the Course Status

    $(".updateCourseStatus").click(function(){
        var status = $(this).text();
        var course_id = $(this).attr("course_id");

        $.ajax({
            type: 'post',
            url:'/admin/update-course-status',
            cache: false,
            data:{status:status,course_id:course_id},
            success:function(resp){
                // alert(resp['status']);
                // alert(resp['course_id']);
                if(resp['status']==0){
                    $("#course-"+course_id).html("<a class='updateCourseStatus' href='javascript:void(0)' >InActive</a>");
                }else if(resp['status']==1){
                    $("#course-"+course_id).html("<a class='updateCourseStatus' href='javascript:void(0)' >Active</a>");
                }
                window.location.reload(true);
            },error:function(){
                alert("Error");
            }

        });
    });

    //Appending the categories

    $('#subject_id').change(function(){
        var subject_id =$(this).val();
        // alert(subject_id) For Debugging

        $.ajax({
            type:'post',
            url :'/admin/append-categories-level',
            data :{subject_id:subject_id},
            success:function(resp){
                $("#appendCategory").html(resp);
            },error:function(){

            }
        });

    });


    $(".confirmDelete").click(function(){
        var name = $(this).attr("name");
        if(confirm("Are You sure want to delete this "   + name + "?" )){
            return true;
        }
        return false;
    });


});
