 <?php $__env->startSection('content'); ?>

<div class="row">
    <div class="nk-block-head-content col-sm-12 mb-2">
        <h3 class="nk-block-title page-title text-uppercase ">
            QUESTION-BANK - Test Management - Edit <a href="<?php echo e(route('question_bank_question')); ?>" class="btn btn-secondary btn-rounded float-right"> <em class="icon ni ni-chevrons-left"></em> Back</a>
        </h3>
    </div>
</div>

<div class="card">
    <div class="card card-preview">
        <div class="card-inner">
            <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <ul class="nav nav-tabs mt-n3">
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->get('tab') == 1)?'active':''); ?>"  data-toggle="tab" href="#editTabContent" id="editTabNav" ><em class="icon ni ni-edit"></em><span class="text-uppercase" >Edit details</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->get('tab') == 2 || (isset($tab) && $tab ==2))?'active':''); ?>" data-toggle="tab" href="#addQuestionTab" id="edittab" ><em class="icon ni ni-plus"></em><span class="text-uppercase" >Add Questions</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e((request()->get('tab') == 3)?'active':''); ?>" data-toggle="tab" href="#removeQuestionTab"><em class="icon ni ni-minus"></em><span class="text-uppercase" >Remove Questions</span></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane <?php echo e((request()->get('tab') == 1)?'active':''); ?>"  id="editTabContent">
                    <div class="nk-block nk-block-lg">
                        <div class="row g-gs">
                            <div class="col-lg-12">
                                <div class="card h-100">
                                    <form id="form1" action="<?php echo e(route('update_question_bank',$datas->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="">


                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="name">Test Name<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="name" class="form-control" value="<?php echo e($datas->name); ?>" />
                                                        <?php if($errors->has('name')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="category">Category<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="subject_id" data-search="on" id="category">
                                                            <option value="">Please Select</option>
                                                            <?php $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($subject->id); ?>" <?php echo e($subject->id == $datas->subject['id'] ? 'selected' : ''); ?>> <?php echo e($subject->subject); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('subject_id')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('subject_id')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="category_id">Sub-Category<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <select class=" form-select " name="category_id" data-search="on" id="subcategory">
                                                            <option value="">Please Select</option>
                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($subcategory->id); ?>" <?php echo e($subcategory->id == $datas->category['id'] ? 'selected' : ''); ?>> <?php echo e($subcategory->category); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                        <?php if($errors->has('category_id')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="mark">Mark<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="mark" class="form-control" value="<?php echo e($datas->mark); ?>" />
                                                        <?php if($errors->has('mark')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('mark')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="duration">Test Duration (in minutes)<span
                                                style="color: red" class="required">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="duration" value="<?php echo e($datas->duration); ?>"
                                                        class="form-control">
                                                        <?php if($errors->has('duration')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('duration')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="negativemark">Negativemark<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="negativemark" class="form-control" value="<?php echo e($datas->negativemark); ?>" />
                                                        <?php if($errors->has('negativemark')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('negativemark')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="type">Type<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <select class="form-select" name="type" data-search="on" id="type">
                                                            <option value="0" <?php echo e($datas->type==0 ? 'selected' : ''); ?> >Free</option>
                                                            <option value="1" <?php echo e($datas->type==1 ? 'selected' : ''); ?> >Paid</option>
                                                        </select>
                                                        <?php if($errors->has('category_id')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('category_id')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="slug">Slug<span  class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">
                                                        <input type="text" name="slug" class="form-control" value="<?php echo e($datas->slug); ?>" />
                                                        <?php if($errors->has('slug')): ?>
                                                        <span class="text-danger"><?php echo e($errors->first('slug')); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="status">Status<span style="color: red;"
                                                class="required">*</span></label>
                                                <div class="col-md-9">
                                                    <div class="form-control-wrap">

                                                        <div class="custom-control custom-radio">
                                                            <input
                                                            class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>"
                                                            id="ForActive" type="radio" name="status" value="1"
                                                            <?php echo e(($datas->status ==1)?'checked' : ''); ?>>
                                                            <label class="custom-control-label"
                                                            for="ForActive">Active</label>
                                                        </div>
                                                        <div class="custom-control custom-radio">
                                                            <input
                                                            class="custom-control-input <?php echo e($errors->has('status')?'is-invalid':''); ?>"
                                                            id="ForInactive" type="radio" name="status" value="0"  <?php echo e(($datas->status ==0)?'checked' : ''); ?>>
                                                            <label class="custom-control-label"
                                                            for="ForInactive">Inactive</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label class="form-label col-md-3" for="slug">Slug<span   class="required text-danger">*</span></label>
                                                <div class="col-md-9">
                                                    <button type="submit" class="btn btn-lg btn-primary btn-xs ">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .nk-block -->
                </div>

                <div class="tab-pane <?php echo e((request()->get('tab') == 2 || (isset($tab) && $tab ==2))?'active':''); ?>" id="addQuestionTab">
                    <div class="card card-preview">

                        <div class="bg-light p-2 mb-2">
                            <form action="<?php echo e(route('search_question_bank_test',$datas->id)); ?>" method="get" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <select name="level" class="form-select" data-search="on" id="custom">
                                            <option value="">Filter By Level</option>
                                            <option value="1">Easy</option>
                                            <option value="2">Medium</option>
                                            <option value="3">Hard</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <select name="subject_id" id="subject" class="form-select" data-search="on">
                                                <option value="">Filter By Subject</option>
                                                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>

                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <a href="<?php echo e(route('edit_question_bank_question',['id'=>$datas->id,'tab'=>2])); ?>" class="btn btn-sm float-left btn-secondary">Reset</a>
                                            <button class="btn btn-primary btn-sm ml-2">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <form id="form2" action="<?php echo e(route('update_question_bank_question',$datas->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="row" style="margin-left: 0px;">
                                <input type="button" onclick='selects()' class="btn btn-xs btn-dark"  value="Select All"/> &nbsp;
                                <input type="button" onclick='deselects()' class="btn btn-xs btn-danger"  value="De-Select All"/>

                            </div><br>

                            <table id="" class="table table-striped datatable-init py-2 display" cellspacing="0" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" >Serial.No</th>
                                        <th scope="col" >S.No</th>

                                        <th scope="col">Question</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Level</th>
                                        <th scope="col">Edit </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>

                                        <td><input type="checkbox" class="chk" name="question_id[]" value="<?php echo e($value->id); ?>" /></td>

                                        <td><?php echo $value->question; ?></td>
                                        <td><?php echo e($value->subject['name']); ?></td>
                                        <td>
                                            <?php if($value['level']==1): ?> Easy <?php elseif($value['level']==2): ?> Medium <?php else: ?> Hard <?php endif; ?>
                                        </td>
                                        <td><a target="_blank" href="<?php echo e(route('edit_question',$value->id)); ?>" class="btn btn-xs btn-dark " ><em class="icon ni ni-edit"></em></a></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <input type="hidden" name="bank_id" value="<?php echo e($datas->id); ?>" />
                            <?php if($questions->isEmpty() ): ?>
                            <button class=" mt-3 btn btn-danger btn-sm" style="display:none;" type="submit">Add</button>
                            <?php else: ?>
                            <button class=" mt-3 btn btn-primary btn-xs" type="submit">Add</button>
                            <?php endif; ?>
                        </form>
                    </div>
                    <br>
                    <div style="float:left;">
                        <?php echo e(($questions ->currentpage()-1) * $questions ->perpage() +count ($questions)); ?> of <?php echo e($questions->total()); ?> entries
                        </div>
                        <div style="float:right;">
                            <span id="pagination_click"  ><?php echo e($questions->links()); ?></span>
                        </div>
                    </div>

                    <!-- .card-preview -->

                <div class="tab-pane <?php echo e((request()->get('tab') == 3)?'active':''); ?>" id="removeQuestionTab">
                    <div class="card card-preview">

                        <form action="<?php echo e(route('destroy_question_bank_question',$datas->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <table class="table table-striped datatable-init">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Serial.No</th>

                                        <th scope="col"><input type="checkbox" name="delete_all" value="1" id="master" /></th>

                                        <th scope="col">Question</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">level</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $showQuestion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($key+1); ?></td>
                                        <td><input type="checkbox" class="sub_chk" data-id="<?php echo e($value->id); ?>" name="question_id[]" value="<?php echo e($value->id); ?>" /></td>

                                        <td><?php echo $value->question['question']; ?></td>
                                        <td><?php echo e($value->question->subject['name']); ?></td>
                                        <td>
                                            <?php if($value->question['level']==1): ?> Easy <?php elseif($value->question['level']==2): ?> Medium <?php else: ?> Hard <?php endif; ?>
                                        </td>

                                        <td><a target="_blank" href="<?php echo e(route('edit_question',$value->question->id)); ?>" class="btn btn-xs btn-dark " ><em class="icon ni ni-edit"></em></a></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                            <?php if($showQuestion->isEmpty() ): ?>
                            <button class=" mt-3 btn btn-danger btn-sm" style="display:none;" type="submit">Delete</button>
                            <?php else: ?>
                            <button class=" mt-3 btn btn-danger btn-xs" type="submit">Remove</button>
                            <?php endif; ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?> <?php $__env->startSection('javascript'); ?>

    <script>
        $(document).ready(function () {

            $("#category").trigger('click');

            var table = $("#example").DataTable({
                columnDefs: [
                {
                    targets: 0,
                    searchable: true,
                    orderable: false,
                    className: "dt-head-center",
                },
                ],
                aoColumns: [
                {
                    sName: "",
                },
                {
                    sName: "question",
                },
                {
                    sName: "subject",
                },
                {
                    sName: "level",
                },
            ],
            order: [[1, "asc"]],
            dom: "lrtip",
        });

        // $("#master1").on("click", function (e) {
        //     var rows = table
        //     .rows({
        //         search: "applied",
        //     })
        //     .nodes();
        //     // Check/uncheck checkboxes for all rows in the table
        //     $('input[type="checkbox"]', rows).prop("checked", this.checked);
        // });

        $("#master").on("click", function (e) {
            if ($(this).is(":checked", true)) {
                $(".sub_chk").prop("checked", true);
                } else {
                $(".sub_chk").prop("checked", false);
            }
        });
    });

    $("#category").on("click change", function (e) {
        var subject_id = e.target.value;
        $.ajax({
            url: "<?php echo e(route('subcat')); ?>",
            type: "POST",
            data: {
                subject_id: subject_id,
            },

            success: function (data) {
                $("#subcategory").empty();
                $.each(data.subcategories, function (index, subcategory) {
                    if (subcategory.id == subject_id) {
                        $("#subcategory").append('<option value="' + subcategory.id + '">' + subcategory.category + "</option>");
                        } else {
                        $("#subcategory").append('<option value="' + subcategory.id + '">' + subcategory.category + "</option>");
                    }
                });
            },
        });
    });

</script>


<script type="text/javascript">
    function selects(){
        var ele=document.getElementsByClassName('chk');
        for(var i=0; i<ele.length; i++){
            if(ele[i].type=='checkbox')
                ele[i].checked=true;
        }
    }
    function deselects(){
        var ele=document.getElementsByClassName('chk');
        for(var i=0; i<ele.length; i++){
            if(ele[i].type=='checkbox')
                ele[i].checked=false;

        }
    }
</script>

<script>
    var url = window.location.href;

    if (url.search("%40%24") >= 0) {

        $('#editTabNav').removeClass('active');
        $('#editTabContent').removeClass('active');
        $('#addQuestionTab').addClass('active');
        $('#edittab').addClass('active');

    }
 </script>


<script>

$('.page-link').on('click', function (e) {
e.preventDefault();
var url_num = $(this).text();

const urlParams = new URLSearchParams(window.location.search);

urlParams.set('set', '@$');
urlParams.toString();
urlParams.set('page', url_num);

window.location.search = urlParams;



});
</script>





<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/admin/questionbank/question-bank/edit.blade.php ENDPATH**/ ?>