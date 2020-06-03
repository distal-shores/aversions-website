<section class="newsletter-signup">
    @include('home.partials.hand_drawn')
	<h2>Stay Informed</h2>
    <form id="mailchimp_subscribe">
        <div class="form-row">
            <div class="col-8 col-md-10">
        		<input type="text" name="MERGE0" placeholder="Enter email here" />
        		<span class="hand_drawn b-0"></span>
            </div>
            <div class="col-4 col-md-2">
                <input type="submit" class="submit" value="Submit" type="submit">
            </div>
        </div>
    </form>
    <div id="newsletter-signup_message">
    	<div class="newsletter-signup_message_message"></div>
    </div>
</section>

@push('scripts')
	<script src="{{ mix('js/newsletter.js') }}"></script>
@endpush
