@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{ session('success')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (session('fail'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success</strong> {{ session('fail')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif