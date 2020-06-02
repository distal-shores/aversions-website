<section class="contact collapsible collapsed">
	<h2>Contact Us</h2>
	<div class="collapsible-content">
		<form id="contact">
			@include('home.partials.hand_drawn')
			@csrf
			<div class="form-group">
				<div class="form-row">
					<div class="col mr-20">
						<input type="text" id="name" name="name" placeholder="Name">
						<span class="hand_drawn"></span>
					</div>
					<div class="col">
						<input type="email" id="email" name="email" placeholder="Email">
						<span class="hand_drawn"></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<input type="text" id="subject" name="subject" placeholder="Subject">
						<span class="hand_drawn"></span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<textarea name="message" id="message" rows="4" cols="50" placeholder="Message"></textarea>
			</div>
			<input type="submit" class="submit" value="Submit">
		</form>
	</div>
</section>

@push('scripts')
	<script src="{{ mix('js/contactForm.js') }}"></script>
	<script src="{{ mix('js/collapsible.js') }}"></script>
@endpush