<section class="contact collapsible collapsed">
	<h2>Contact Us</h2>
	<div class="collapsible-content">
		<form id="contact">
			@csrf
			<div class="form-group">
				<div class="form-row">
					<div class="col">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Name">
					</div> {{-- /col --}}
					<div class="col">
						<label for="Email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Email">
					</div> {{-- /col --}}
				</div>	{{-- /row --}}	
			</div> {{-- /form-group --}}
			<div class="form-group">
				<label for="subject">Subject</label>
				<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
			</div> {{-- /form-group --}}
			<div class="form-group">
				<label for="message">Message</label>
				<textarea name="message" id="message" class="form-control" rows="4" cols="50"> Message</textarea>
			</div> {{-- /form-group --}}
			<input type="submit" class="btn btn-primary" value="Submit">
		</form>
	</div>
</section>

@push('scripts')
	<script src="{{ mix('js/contactForm.js') }}"></script>
	<script src="{{ mix('js/collapsible.js') }}"></script>
@endpush