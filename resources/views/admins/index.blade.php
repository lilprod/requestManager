@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0">DataTables</h2>
            <div class="breadcrumb-wrapper">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index-2.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Datatable</a>
                </li>
                <li class="breadcrumb-item active">Basic
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
        <div class="form-group breadcrumb-right">
          <div class="dropdown">
            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="app-todo.html"><i class="mr-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="mr-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="mr-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="mr-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="content-body"><div class="row">
<div class="col-12">
<p>Read full documnetation <a href="https://datatables.net/" target="_blank">here</a></p>
</div>
</div>
<!-- Basic table -->
<section id="basic-datatable">
<div class="row">
<div class="col-12">
  <div class="card">
    <table class="datatables-basic table">
      <thead>
        <tr>
          <th></th>
          <th></th>
          <th>id</th>
          <th>Name</th>
          <th>Email</th>
          <th>Date</th>
          <th>Salary</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
    </table>
  </div>
</div>
</div>
<!-- Modal to add new record -->
<div class="modal modal-slide-in fade" id="modals-slide-in">
<div class="modal-dialog sidebar-sm">
  <form class="add-new-record modal-content pt-0">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
    <div class="modal-header mb-1">
      <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
    </div>
    <div class="modal-body flex-grow-1">
      <div class="form-group">
        <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
        <input
          type="text"
          class="form-control dt-full-name"
          id="basic-icon-default-fullname"
          placeholder="John Doe"
          aria-label="John Doe"
        />
      </div>
      <div class="form-group">
        <label class="form-label" for="basic-icon-default-post">Post</label>
        <input
          type="text"
          id="basic-icon-default-post"
          class="form-control dt-post"
          placeholder="Web Developer"
          aria-label="Web Developer"
        />
      </div>
      <div class="form-group">
        <label class="form-label" for="basic-icon-default-email">Email</label>
        <input
          type="text"
          id="basic-icon-default-email"
          class="form-control dt-email"
          placeholder="john.doe@example.com"
          aria-label="john.doe@example.com"
        />
        <small class="form-text text-muted"> You can use letters, numbers & periods </small>
      </div>
      <div class="form-group">
        <label class="form-label" for="basic-icon-default-date">Joining Date</label>
        <input
          type="text"
          class="form-control dt-date"
          id="basic-icon-default-date"
          placeholder="MM/DD/YYYY"
          aria-label="MM/DD/YYYY"
        />
      </div>
      <div class="form-group mb-4">
        <label class="form-label" for="basic-icon-default-salary">Salary</label>
        <input
          type="text"
          id="basic-icon-default-salary"
          class="form-control dt-salary"
          placeholder="$12000"
          aria-label="$12000"
        />
      </div>
      <button type="button" class="btn btn-primary data-submit mr-1">Submit</button>
      <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
    </div>
  </form>
</div>
</div>
</section>
<!--/ Basic table -->
@endsection

@push('user')
<script>
function deleteData(id)
 {
     var id = id;
     var url = '{{ route("admin.admins.destroy", ":id") }}';
     url = url.replace(':id', id);
     $("#deleteForm").attr('action', url);
 }

 function formSubmit()
 {
     $("#deleteForm").submit();
 }
</script>
@endpush