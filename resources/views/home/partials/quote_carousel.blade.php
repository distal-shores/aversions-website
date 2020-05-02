<div class="quote-carousel">
	@foreach($quotes as $quote)
		<div class="pullquote">
			<h3>{{ $quote->pullquote }}</h3>
			<div class="quote_caption">- {{ $quote->publication->contact_name }}, <em>{{ $quote->publication->name }}</em></div>
		</div>
	@endforeach
</div>

<script src="/js/quoteCarousel.js"></script>
