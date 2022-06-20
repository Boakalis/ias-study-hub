@php($setting = \App\Models\SettingGeneral::first()) @php($pages = \App\Models\Page::where('status',1)->get())
<div class="cta-section cta-section--l1 bg-purple-heart dark-mode-texts">
    <div class="footer__shape-1">
        <img class="w-100" src="{{ asset('website/image/home-1/footer-shape.png') }}" alt="" />
    </div>
    <div class="container">
        <div class="row justify-content-center aos-init aos-animate" data-aos="fade-up" data-aos-duration="300" data-aos-once="true">
            <div class="col-lg-7 col-md-8">
                <div class="section-title text-center">
                    <!-- Newsletter -->
                    <div class="newsletter-form mx-auto newsletter--l1-2"></div>
                    <!--/ .Newsletter -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-area--l1 bg-purple-heart dark-mode-texts">
    <div class="container">
        <footer class="footer-top">
            <div class="row">
                {{--
                <div class="col-lg-3 col-md-8 col-xs-10">
                    <div class="footer-widgets footer-widgets--l2">
                        <!-- Brand Logo-->
                        <div class="brand-logo mt-1">
                            <a href="#">
                                <!-- light version logo (logo must be black)-->
                                <img src="image/png/logo-dark.png" alt="" class="light-version-logo" />
                                <!-- Dark version logo (logo must be White)-->
                                <img src="image/png/logo-white.png" alt="" class="dark-version-logo" />
                            </a>
                        </div>
                        <p class="footer-widgets__text">
                            {{ $setting->description }}
                        </p>
                    </div>
                </div>
                --}}
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 col-xs-6">
                            <div class="footer-widgets footer-widgets--1 mb-10 mb-md-0">
                                <h4 class="footer-widgets__title font-weight-bold text-white font-24">Company</h4>
                                <ul class="footer-widgets__list">
                                    <li>
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about-us') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('faq') }}">FAQ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-3 col-xs-6">
                            <div class="footer-widgets footer-widgets--1 mb-10 mb-md-0">
                                <h4 class="footer-widgets__title font-weight-bold text-white font-24">Quick Links</h4>
                                <ul class="footer-widgets__list">
                                    <li>
                                        <a href="{{ route('test-series') }}">IAS Test Series</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('previousYearIndex') }}">Previous Year Questions</a>
                                    </li>
                                     <li>
                                        <a href="{{ route('getQuestionBankPages') }}">Questions Bank</a>
                                    </li> 
                                    {{--<li>
                                        <a href="{{ route('dailyQuizIndex') }}">Daily Quiz</a>
                                    </li>--}}
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="footer-widgets footer-widgets--1 mb-10 mb-md-0">
                                <h4 class="footer-widgets__title font-weight-bold text-white font-24">Legal Info</h4>
                                <ul class="footer-widgets__list">
                                    @foreach ($pages as $page)
                                    <li>
                                        <a href="{{ route('getPage',$page->slug) }}">{{ ucwords($page->title) }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="footer-widgets footer-widgets--1">
                                <h4 class="footer-widgets__title font-weight-bold text-white font-24">Contact Details</h4>
                                <ul class="footer-widgets__list footer-widgets--address">
                                    <li>
                                        <i class="fa fa-map-marker-alt text-white"></i>
                                        <span>{!! $setting->address !!}</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-phone-alt text-white"></i>
                                        <div class="list-content">
                                            <a href="tel:{{ $setting->phone_no }}">{{ $setting->phone_no }}</a>
                                        </div>
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope text-white"></i>
                                        <a class="heading-default-color gr-text-hover-underline text-break" href="mailto:{{ $setting->email }}">{{ $setting->email }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="footer-copyright footer-copyright--l1 py-3 mt-2">
            <div class="row text-center align-items-center text-white">
                <div class="col-xs-12 text-sm-start">
                    <p class="text-white">&copy; {{ date('Y') }} {{ Str::ucfirst($setting->title) }}. All Rights Reserved</p>
                </div>
                
            </div>
        </div>
    </div>
</div>
