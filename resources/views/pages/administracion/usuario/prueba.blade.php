{{-- Content --}}


    <!--begin::Notice-->
    <!-- <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
        <div class="alert-icon">
										<span class="svg-icon svg-icon-primary svg-icon-xl">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
													<path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
												</g>
											</svg>
										</span>
        </div>
        <div class="alert-text">Metronic extends
            <code>Bootstrap Navs</code>component with a variety of options to provide unique looking Tab components that matches Metronic's design standards.
            <br />For more info on the original Bootstrap utilities please visit the official
            <a class="font-weight-bold" href="https://getbootstrap.com/docs/4.5/components/navs/" target="_blank">Bootstrap Navs Documentation</a>.</div>
    </div> -->


    <!--end::Notice-->

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h3 class="card-label">Usuarios</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Example-->
            <div class="example">
                <div class="example-preview">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab"  href="">
																	<span class="nav-icon">
																		<i class="flaticon2-chat-1"></i>
																	</span>
                                <span class="nav-text">General</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab"  href="" aria-controls="profile">
																	<span class="nav-icon">
																		<i class="flaticon2-layers-1"></i>
																	</span>
                                <span class="nav-text">Modulo</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab"  href="" aria-controls="contact">
																	<span class="nav-icon">
																		<i class="flaticon2-rocket-1"></i>
																	</span>
                                <span class="nav-text">Submodulo</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-5" id="myTabContent">

                        <!-- <main>
                            {{-- @include($data['vista'], $data) --}}
                        </main> -->

                        <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="home-tab">Tab content 1</div>
                        <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="profile-tab">Tab content 2</div>
                        <div class="tab-pane fade" id="" role="tabpanel" aria-labelledby="contact-tab">Tab content 3</div>
                    </div>


                </div>
            </div>
            <!--end::Example-->
        </div>
    </div>
    <!--end::Card-->


{{-- Styles Section --}}
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>


{{-- Scripts Section --}}
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    {{-- <script src="{{ asset('scripts/administracion/usuario/datatable.js') }}" type="text/javascript"></script>--}}
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
