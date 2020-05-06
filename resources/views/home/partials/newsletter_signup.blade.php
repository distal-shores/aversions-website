<section class="newsletter-signup">
	@include('home.partials.hand_drawn')
	<h2>Stay Informed</h2>
    <form id="mailchimp_subscribe">
		<form-group>
    		<input type="text" name="MERGE0" placeholder="Enter email here" />
    		<span class="hand_drawn"></span>
    	</form-group>
    	<button class="mailchimp_submit" type="submit">Submit</button>
    </form>
</section>

@push('scripts')
	<script src="{{ mix('js/newsletter.js') }}"></script>
@endpush
