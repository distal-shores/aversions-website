@if (session('status'))
  <div class="alert alert-{{ session('message_type') }}" role="alert">
      {{ session('status') }}
  </div>
@endif