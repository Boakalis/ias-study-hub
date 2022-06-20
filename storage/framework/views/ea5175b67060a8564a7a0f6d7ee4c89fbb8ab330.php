<?php $__env->startSection('meta_title'); ?>
<!-- Fav Icon  -->
<!-- Page Title  -->
<title>Profile | IAS STUDYHUB</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- content @s  -->
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between ">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title "> Personal Information</h4>
                                            <div class="nk-block-des">
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">

                                    <div class="nk-data data-list">
                                        <?php echo $__env->make('admin.layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Full Name</span>
                                                <span
                                                    class="data-value"><?php echo e(Auth::user()->fname); ?>&nbsp;<?php echo e(Auth::user()->lname); ?></span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Display Name</span>
                                                <?php if(Auth::user()->fullname == 1): ?>
                                                <span
                                                    class="data-value"><?php echo e(Auth::user()->fname); ?>&nbsp;<?php echo e(Auth::user()->lname); ?></span>
                                                <?php else: ?>
                                                <span class="data-value"><?php echo e(Auth::user()->fname); ?></span>
                                                <?php endif; ?>

                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Email</span>
                                                <span class="data-value"><?php echo e(Auth::user()->email); ?></span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more disable"><em
                                                        class="icon ni ni-lock-alt"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Phone Number</span>
                                                <span class="data-value text-soft"><?php echo e(Auth::user()->phone); ?></span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Date of Birth</span>
                                                <?php if(Auth::user()->dob): ?>
                                                <span
                                                    class="data-value"><?php echo e(date('d-F-Y',strtotime(Auth::user()->dob))); ?></span>
                                                <?php else: ?>
                                                <span class="data-value"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit"
                                            data-tab-target="#address">
                                            <div class="data-col">
                                                <span class="data-label">Address</span>
                                                <span
                                                    class="data-value"><?php echo e(@Auth::user()->address1); ?><br><?php echo e(@Auth::user()->address2); ?><br>
                                                    <?php echo e(@Auth::user()->city->name); ?><br></span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Image</span>
                                                <?php if(!empty(Auth::user()->image)): ?>
                                                <img style="height: 100px;" src="<?php echo e(asset(Auth::user()->image)); ?> "
                                                    alt="profile-image"><br>
                                                <input type="hidden" name="current_image"
                                                    value="<?php echo e(Auth::user()->image); ?>">
                                                <?php endif; ?>

                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div><!-- data-item -->
                                    </div><!-- data-list -->

                                </div><!-- .nk-block -->
                            </div>

                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
</div>
<!-- content @e  -->

<div class="modal fade zoom" tabindex="-1" role="dialog" id="profile-edit">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
            <div class="modal-body modal-body-lg">
                <h5 class="title">Update Profile</h5>
                <ul class="nk-nav nav nav-tabs" id="check">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#personal">Personal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#address">Address</a>
                    </li>
                </ul><!-- .nav-tabs -->
                <div class="tab-content">
                    <div class="tab-pane active" id="personal">
                        <form action="<?php echo e(route('profile-update')); ?>" method="POST" name="updateProfileForm"
                            id="updateProfileForm" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Full Name</label>
                                        <input type="text" readonly class="form-control form-control-lg" id="full-name"
                                            value="<?php echo e(Auth::user()->fname); ?>&nbsp;<?php echo e(Auth::user()->lname); ?> "
                                            placeholder="Enter Full name" autocomplete="off">
                                    </div>
                                </div>
                                <?php if(Auth::user()->fullname == 1): ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Display Name</label>
                                        <input type="text" readonly class="form-control form-control-lg" id="full-name"
                                            value="<?php echo e(Auth::user()->fname); ?>&nbsp;<?php echo e(Auth::user()->lname); ?> "
                                            placeholder="Enter Full name" autocomplete="off">
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Display Name</label>
                                        <input type="text" readonly class="form-control form-control-lg" id="full-name"
                                            value="<?php echo e(Auth::user()->fname); ?> " placeholder="Enter Full name">
                                    </div>
                                </div>
                                <?php endif; ?>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="first-name">First Name<span
                                                class="required text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-lg" id="first-name"
                                            name="fname" value="<?php echo e(Auth::user()->fname); ?>" id="fname"
                                            placeholder="Enter Full name" autocomplete="off">
                                    </div>
                                    <span class=" modal-alert text-danger"><?php echo e($errors->first('fname')); ?></span>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="last-name">Last Name</label>
                                        <input type="text" class="form-control form-control-lg" id="lname" name="lname"
                                            value="<?php echo e(Auth::user()->lname); ?>" placeholder="Enter Full name"
                                            autocomplete="off">
                                    </div>
                                    <span class=" modal-alert text-danger"><?php echo e($errors->first('lname')); ?></span>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Phone Number</label>
                                        <input type="text" class="form-control form-control-lg" name="phone" id="phone"
                                            value="<?php echo e(Auth::user()->phone); ?>" placeholder="Phone Number"
                                            autocomplete="off">
                                    </div>
                                    <span class=" modal-alert text-danger"><?php echo e($errors->first('phone')); ?></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="birth-day">Date of Birth</label>
                                        <?php if(Auth::user()->dob): ?>
                                        <input type="text" class="form-control  form-control-lg date-picker  " data-date-format="yyyy-mm-dd"
                                            onkeydown="return false" id="dob" name="dob"
                                            value="<?php echo e(date('Y/m/d',strtotime(Auth::user()->dob))); ?>" placeholder=""
                                            autocomplete="off">
                                        <?php else: ?>
                                        <input type="text" class="form-control form-control-lg date-picker" id="dob"
                                            name="dob" value="" onkeydown="return false" placeholder="">
                                        <?php endif; ?>
                                    </div>
                                    <span class="text-danger modal-alert "><?php echo e($errors->first('dob')); ?></span>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label" for="customFileLabel">Upload Profile Photo</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="customFile" accept="image/x-png,image/gif,image/jpeg" />
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-danger modal-alert "><?php echo e($errors->first('image')); ?></span>
                                </div>

                                <div class="col-12">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="fullname"
                                            id="fullname" value="1">
                                        <label class="custom-control-label" for="fullname">Use full name to display
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-sm btn-primary">Update Profile</button>
                                        </li>
                                        <li>
                                            <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </form>
                    </div><!-- .tab-pane -->
                    <div class="tab-pane" id="address">
                        <form action="<?php echo e(route('profile-address-update')); ?>" method="POST" name="updateaddressProfileForm"
                            id="updateAddressForm" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group <?php echo e($errors->has('address1') ? 'has-error' : ''); ?> ">
                                        <label class="form-label" for="address1">Address Line 1</label>
                                        <input type="text" name="address1" class="form-control form-control-lg"
                                            required="" value="<?php echo e(Auth::user()->address1); ?>" id="address1" value="">
                                        <span class=" modal-alert text-danger"><?php echo e($errors->first('address1')); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="address-l2">Address Line 2</label>
                                        <input type="text" name="address2" class="form-control form-control-lg"
                                            value="<?php echo e(Auth::user()->address2); ?>" id="address-l2" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group <?php echo e($errors->has('country_id') ? 'has-error' : ''); ?>  ">
                                        <label class="form-label" for="country">Country</label>
                                        <select class="form-select" name="country_id" id="country-dropdown"
                                            data-search="on" required
                                            oninvalid="this.setCustomValidity('Please Select Country')"
                                            oninput="setCustomValidity('')" data-ui="lg">
                                            <option disabled selected>Please Select Country</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($country->id); ?>"
                                                <?php echo e(($country->id) == Auth::user()->country_id ? 'selected' : ''); ?>>
                                                <?php echo e($country->name); ?> </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <span class="text-danger modal-alert "><?php echo e($errors->first('country_id')); ?></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group  <?php echo e($errors->has('state_id') ? 'has-error' : ''); ?> ">
                                        <label class="form-label" for="state">State</label>
                                        <div class="state-list">
                                            <select name="state_id" id="state-dropdown"
                                                class="form-select form-control-lg" required="" data-search="on">
                                                <option value="">Selected State</option>
                                            </select>
                                            <span class="text-danger modal-alert "><?php echo e($errors->first('state_id')); ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group <?php echo e($errors->has('city_id') ? 'has-error' : ''); ?> ">
                                        <label class="form-label" for="city">City</label>
                                        <div class="city-list">
                                            <select name="city_id" id="city-dropdown"
                                                class="form-select form-control-lg" required="" data-search="on">
                                                <option value="">Selected City</option>
                                            </select>
                                        </div>
                                        <span class="text-danger modal-alert "><?php echo e($errors->first('city_id')); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group <?php echo e($errors->has('zipcode') ? 'has-error' : ''); ?> ">
                                        <label class="form-label" for="address-postal">Postal Code</label>
                                        <input type="text" name="zipcode" class="form-control form-control-lg"
                                            value="<?php echo e(Auth::user()->zipcode); ?>" id="address-pin" value="">
                                    </div>
                                    <span class="text-danger modal-alert "><?php echo e($errors->first('zipcode')); ?></span>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-sm btn-primary">Update Address</button>
                                        </li>
                                        <li>
                                            <button data-dismiss="modal" class="btn btn-sm btn-danger">Cancel</button>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </form>
                    </div><!-- .tab-pane -->
                </div><!-- .tab-content -->
            </div><!-- .modal-body -->
        </div><!-- .modal-content -->
    </div><!-- .modal-dialog -->
</div><!-- .modal -->


<?php $__env->stopSection(); ?>
<?php $__env->startSection('javascript'); ?>
<!-- Ajax for Country and state selector-->

<script>
    $(document).ready(function () {
        $('#country-dropdown').on('change', function () {
            var country_id = this.value;
            var url = "<?php echo e(route('getStatesByCountry')); ?>";
            $("#state-dropdown").html('');
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    country_id: country_id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dropdown').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dropdown").append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                    $('#city-dropdown').html(
                        '<option value="">Select State First</option>');
                }
            });
        });
        $('#state-dropdown').on('change', function () {
            var state_id = this.value;
            $("#city-dropdown").html('');
            $.ajax({
                url: "<?php echo e(route('getCitiesByState')); ?>",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                dataType: 'json',
                success: function (result) {
                    $('#city-dropdown').html('<option value="">Select City</option>');
                    $.each(result.cities, function (key, value) {
                        $("#city-dropdown").append('<option value="' + value.id +
                            '">' + value.name + '</option>');
                    });
                }
            });
        });
    });

</script>



<?php if(isset(Auth::user()->country_id) && !empty(Auth::user()->country_id)): ?>
<script>
    $(function () {
        var country_id = "<?php echo e(Auth::user()->country_id); ?>";
        var state_id = "<?php echo e(Auth::user()->state_id); ?>";
        var url = "<?php echo e(route('getStatesByCountry')); ?>";
        var city_id = "<?php echo e(Auth::user()->city_id); ?>";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                country_id: country_id,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: (function (result) {
                $("#state-dropdown").empty();

                if (result.status == 200) {
                    $('#state-dropdown').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        if (typeof state_id !== 'undefined' && state_id !== null) {
                            $("#state-dropdown").append('<option value="' + value.id +
                                '" ' + ((value.id == state_id) ? 'selected' : '') +
                                ' >' + value.name + '</option>');
                        }
                    });
                }
            })
        })
        //Call City For Edit
        var url = "<?php echo e(route('getCitiesByState')); ?>";
        $.ajax({
            type: "POST",
            url: url,
            data: {
                'state_id': state_id,
                _token: '<?php echo e(csrf_token()); ?>'
            },
            success: (function (result) {
                $("#city-dropdown").empty();

                if (result.status == 200) {
                    $('#city-dropdown').html('<option value="">Select City</option>');
                    $.each(result.cities, function (key, value) {
                        if (typeof city_id !== "undefined" && city_id !== null) {
                            $("#city-dropdown").append('<option value="' + value.id +
                                '" ' + ((value.id == city_id) ? 'selected' : '') +
                                ' >' + value.name + '</option>');
                        }
                    });
                }
            })
        });
    })

</script>
<?php endif; ?>

<script type="text/javascript">
    <?php if(count($errors) > 0): ?>
    $('#profile-edit').modal('show');
    <?php endif; ?>

</script>

<script>
    $(".alert").delay(2000).fadeOut(300);
    $(".modal-alert").delay(2000).fadeOut(300);

</script>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('website.Layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/614552.cloudwaysapps.com/seeurhhvyv/public_html/resources/views/website/Users/profile.blade.php ENDPATH**/ ?>