<section class="quote-list">
	<h2>Aversions Affection</h2>
	<div class="quote-carousel no-top-margin">
		@foreach($quotes as $quote)
			<div class="pullquote">
				<h3>{{ $quote->pullquote }}</h3>
				<div class="quote_caption no-top-margin">- {{ $quote->publication->contact_name }}, <a href="{{ $quote->url }}"><em>{{ $quote->publication->name }}</em></a></div>
			</div>
		@endforeach
	</div>
	<div class="quote-carousel_arrows no-top-margin"></div>
</section>

<script src="/js/quoteCarousel.js"></script>
