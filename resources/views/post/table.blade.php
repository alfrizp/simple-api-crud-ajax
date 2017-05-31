	<table id="table-post" class="table table-bordered">
		<tr>
			<th>Title</th>
			<th>Post</th>
			<th width="200px">Action</th>
		</tr>
		@foreach ($posts as $post)
		<tr>
			<td>{{ $post->title }}</td>
			<td>{{ $post->post }}</td>
			<td>
				<button class="btn btn-warning edit-button" data-id="{{ $post->id }}" data-toggle="modal" data-target="#edit-post-modal">Edit</button>
				<button class="btn btn-danger delete-button" data-id="{{ $post->id }}">Delete</button>
			</td>
		</tr>
		@endforeach
		
	</table>
