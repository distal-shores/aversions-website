<section class="contact collapsible collapsed">
	<h2>Contact Us</h2>
	<div class="collapsible-content">
		<form id="contact">
			@csrf
			<div class="form-row">
				<div class="col-md-6">
					<input type="text" id="name" name="name" placeholder="Name">
					<span class="hand_drawn"></span>
				</div>
				<div class="col-md-6">
					<input type="email" id="email" name="email" placeholder="Email">
					<span class="hand_drawn"></span>
				</div>
			</div>
			<div class="form-row">
				<div class="col">
					<input type="text" id="subject" name="subject" placeholder="Subject">
					<span class="hand_drawn"></span>
				</div>
			</div>
			<textarea name="message" id="message" rows="4" cols="50" placeholder="Message"></textarea>
			<input type="submit" class="submit mt-10" value="Submit">
		</form>
		<p class="se mt-10 tac">(Or just email us &mdash; <a href="mailto:band&commat;aversionsband.com">band&commat;aversionsband.com</a>)</p>
	</div>
</section>

@push('scripts')
	<script src="{{ mix('js/contactForm.js') }}"></script>
	<script src="{{ mix('js/collapsible.js') }}"></script>
@endpush