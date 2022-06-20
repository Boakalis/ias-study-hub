
<div class="modal fade" tabindex="-1" id="paymentModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header" style="align-self: center">
                    <h5 class="text-uppercase">Purchase Section</h5>
                </div>

                <div class="modal-body">
                    {{-- <div class="">
                        <h2>Darken</h2>
                      <div class="jumbotron bg-cover text-white" style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.6) 0%,rgba(0,0,0,0.6) 100%), url(https://placeimg.com/1000/480/nature)">
                        <div class="container">
                        <h1 class="display-4">Hello, world!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                          </div>
                      <!-- /.container   -->
                      </div>
                    </div> --}}
                    <form action="#" id="form_calc" class="form-validate is-alter">
                    <div class=" prime-modal-background  container h-auto text-dark "  >

                            <span class="text-uppercase " > <center><h6>Prime Subscription</h6></center> </span>
                            <li >Unlimited Access to All Question Bank For 1 year <br> <small>(Including the question bank which will added after purchase )</small> </li>
                            <li>Premium Badge</li>
                            <li>Premium Support</li>


                    </div>
                    <center class="p-20" ><span class="font-16  " >OR</span></center>
                    <center><span class="font-16  " ><h5>BUY ANY COURSE</h5></span></center>

                    <span class="text-danger" id="alert" style="display: none"><i class="fas fa-info-circle"></i>&nbsp;Atleast Select One Course</span>
                    <div id="contentdiv"></div>
                    <input type="hidden" id="course_ids" data-value="" value="">
                    <input type="hidden" id="course_price" value="">
                </div>

                <div class=" text-center bg-success">
                    <center>
                        <button id="price" type="submit" style=" width:100%; cursor: pointer"
                            class="text-dark pt-3 pb-3 text-center btn-success sub-text">Pay Rs.&nbsp;<span>0</span>/-
                        </button>
                    </center>
                </div>
            </form>
        </div>
    </div>
</div>
