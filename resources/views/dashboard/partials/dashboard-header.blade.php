<div class="row" id="dashboard-header">
	<div>
		<h1>Aversions Dashboard</h1>
	</div>
	<div class="user-ui">
		<ul>
			<li>{{ Auth::user()->name }}</li>
			<span>|</span>
			<li><a href="{{ url('/logout') }}">logout</a></li>
		</ul>
	</div>
</div>