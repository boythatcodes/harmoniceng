<form
    action="/contact_us"
    method="post" class="wpcf7-form init" aria-label="Contact form">
    @csrf
    <div class="row gutterx-40 guttery-30">
        <div class="col-6 col-smobile-12"> <label class="label">Your
                name</label> <span class="wpcf7-form-control-wrap"
                data-name="name"><input size="40" maxlength="400"
                    class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                    autocomplete="name" aria-required="true"
                    aria-invalid="false" placeholder="Harmonic Eng" value=""
                    type="text" name="name" required /></span></div>
        <div class="col-6 col-smobile-12"> <label class="label">Email
                Address</label> <span class="wpcf7-form-control-wrap"
                data-name="email"><input size="40" maxlength="400"
                    class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-email"
                    autocomplete="email" aria-required="true"
                    aria-invalid="false" placeholder="Name@harmoniceng.com"
                    value="" type="email" name="email"  required /></span></div>
        <div class="col-6 col-smobile-12"> <label class="label">Company
                Name</label> <span class="wpcf7-form-control-wrap"
                data-name="company_name"><input size="40" maxlength="400"
                    class="wpcf7-form-control wpcf7-text" aria-invalid="false"
                    placeholder="Harmonic Eng" value="" type="text"
                    name="company_name"  required /></span></div>
        <div class="col-6 col-smobile-12"> <label class="label">Phone
                Number</label> <span class="wpcf7-form-control-wrap"
                data-name="phone_number"><input size="40" maxlength="400"
                    class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel"
                    aria-required="true" aria-invalid="false"
                    placeholder="002 010668811" value="" type="tel"
                    name="phone_number"  required /></span></div>
        <div class="col-12"> <label class="label">Description</label>
            <span class="wpcf7-form-control-wrap"
                data-name="description"><textarea cols="40" rows="10"
                    maxlength="2000" class="wpcf7-form-control wpcf7-textarea"
                    aria-invalid="false"
                    placeholder="Kindly provide enough information about what you want to now..."
                    name="description"></textarea></span>
        </div>
        <div class="col-12"><button
                class="wpcf7-form-control wpcf7-submit btn btn-lg btn-accent text-white btn-hover-primary text-hover-white w-100 cms-hover-move-icon-up"
                type="submit">Submit Request<span
                    class="cms-svg-icon cms-eicon lh-0 wpcf7-submit-icon text-10 rtl-flip"><svg
                        class="cms-arrow-up cms-arrow-up-right"
                        fill="currentColor" fill-hover="currentColor"
                        viewBox="0 0 10 11" xmlns="http://www.w3.org/2000/svg">
                        <path class="cms-hover-move-1"
                            d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                        <path class="cms-hover-move-2"
                            d="M10 9.80108V0H0.198919V0.633514H8.91892L0 9.55243L0.447568 10L9.36649 1.08108V9.80108H10Z" />
                    </svg></span></button></div>
    </div>
    <div class="wpcf7-response-output" aria-hidden="true"></div>
</form>