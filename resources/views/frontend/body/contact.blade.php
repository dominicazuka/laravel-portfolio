<!-- contact-area -->
<section class="homeContact mt-5">
    <div class="container">
        <div class="homeContact__wrap">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section__title">
                        <span class="sub-title">07 - Say hello</span>
                        <h2 class="title">Any questions? Feel free <br> to contact</h2>
                    </div>
                    <div class="homeContact__content">
                        <p>I am always happy to help with anything from general programming questions to specific technical problems. I can also provide feedback on your code or help you with your software development process.</p>
                        <h2 class="mail"><a href="mailto:Visitdominicazuka@gmail.com">Visitdominicazuka@gmail.com</a></h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="homeContact__form">
                        <form id="myForm" method="post" action="{{ route('store.message') }}"
                            class="sidebar__contact">
                            @csrf

                            <div class="form-group">
                                <span class="text-danger error-message"></span>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input name="name" type="text" placeholder="Enter name*" id="name">
                            </div>

                            <div class="form-group">
                                <span class="text-danger error-message"></span>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input name="email" type="email" placeholder="Enter your mail*" id="email">
                            </div>

                            <div class="form-group">
                                <span class="text-danger error-message"></span>
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input name="subject" type="text" placeholder="Enter your subject*" id="subject">
                            </div>

                            <div class="form-group">
                                <span class="text-danger error-message"></span>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input name="phone" type="text" placeholder="Your Phone*" id="phone">
                            </div>

                            <div class="form-group">
                                <span class="text-danger error-message"></span>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <textarea name="message" id="message" placeholder="Message*"></textarea>
                            </div>
                            <div class="form-group mt-3 mb-5">
                                <span class="text-danger recaptcha" style="display: flex; justify-content: center;"></span>
                                <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}" style="display: flex; justify-content: center;"></div>
                            </div>
                            <div class="form-group text-center" id="loader" style="display: none;">
                                <div class="mb-3 spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn">send message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-area-end -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').submit(function(event) {
            if ($('#myForm').valid()) {
                $('#loader').show();
                // Submit the form
                $('.recaptcha').text('');
                $('#myForm').submit();
            } else {
                if (grecaptcha.getResponse() === '') {
                    event.preventDefault();
                    $('#myForm').find('.recaptcha').text('Please complete the reCAPTCHA verification.');
                    $('#myForm').find('.recaptcha').show();
                }
            }
        });
        $('#myForm').validate({
            rules: {
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                subject: {
                    required: true,
                },
                phone: {
                    required: true,
                },
                message: {
                    required: true,
                },
            },
            messages: {
                name: {
                    required: 'Please Enter Name',
                },
                email: {
                    required: 'Please Enter Email',
                    email: 'Please Enter a Valid Email',
                },
                subject: {
                    required: 'Please Enter Subject',
                },
                phone: {
                    required: 'Please Enter Phone Number',
                },
                message: {
                    required: 'Please Enter Message',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').find('.error-message').html(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
