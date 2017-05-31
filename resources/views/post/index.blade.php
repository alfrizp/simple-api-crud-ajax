<!DOCTYPE html>
<html>
<head>
	<title>Laravel POST API CRUD AJAX</title>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>	
</head>
<body>
<br>
<div class="container">
	<div class="row">
		<div class="col-lg-12 margin-tb">
			<div class="pull-left">
				<h2>Laravel POST API CRUD AJAX</h2>	
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-post-modal">
					Create Item
				</button>

			</div>
		</div>		
	</div>

	<div id="flash">
		
	</div>

	<div class = "show-data">
		@include('post.table')
	</div>

	<ul id="pagination" class="pagination-sm"></ul>

	<!-- Create Item Modal -->
	<div id="create-post-modal" class="modal fade" role="dialog">
	   <div class="modal-dialog">
		<!-- konten modal-->
		<div class="modal-content">
			<!-- heading modal -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Create New Post</h4>
			</div>
			<!-- body modal -->
			<div class="modal-body">
				<form id="create-post-form" method="post">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label>Post</label>
						<textarea class="form-control" rows="5" name="post"></textarea>
					</div>
					<button class="btn btn-success create-post">Create</button>
					<button class="btn reset-form-post">Reset</button>
				</form>
			</div>
			<!-- footer modal -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	   </div>
	</div>

	<!-- Edit Item Modal -->
	<div id="edit-post-modal" class="modal fade" role="dialog">
	   <div class="modal-dialog">
		<!-- konten modal-->
		<div class="modal-content">
			<!-- heading modal -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Post</h4>
			</div>
			<!-- body modal -->
			<div class="modal-body">
				<form id="edit-post-form" method="post">
					<input id="edit-id" type="hidden" name="id">
					<div class="form-group">
						<label>Title</label>
						<input id="edit-title" type="text" class="form-control" name="title">
					</div>
					<div class="form-group">
						<label>Post</label>
						<textarea id="edit-post" class="form-control" rows="5" name="post"></textarea>
					</div>
					<button class="btn btn-warning edit-post">Save</button>
					<button class="btn reset-form-post">Reset</button>
				</form>
			</div>
			<!-- footer modal -->
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	   </div>
	</div>

</div>

<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
</body>
</html>