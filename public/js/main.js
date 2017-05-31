// $(function() {

// 	var $post = $('#table-post');
// 	var editBtn = '<button id="edit-button" class="btn btn-warning">Edit</button>';
// 	var delBtn = '<button id="delete-button" class="btn btn-danger">Delete</button>';

	
// 	// $.ajax({
// 	// 	type	: 'GET',
// 	// 	url		: '/api/post',
// 	// 	success	: function(posts) {
// 	// 		$.each(posts, function(i, post){
// 	// 			$post.append('<tr><td>'+ post.title +'</td><td>'+ post.post +'</td><td>'+editBtn+'  '+delBtn+'</td></tr>');
// 	// 		});
// 	// 	}
// 	// });


// });

// Ajax csrf
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Create save button
$(".create-post").click(function(e){
	e.preventDefault();
	var data = $('#create-post-form').serialize();
	$.ajax({
		type: 'POST',
		url: "/api/post",
		data: data,
		success: function(response) {
			$("#create-post-form").trigger("reset");
			$('#create-post-modal').modal('hide');
			$("#flash").html('<div class="alert alert-success">'+response.message+'</div>');
			window.setTimeout(function(){
				$(".alert").fadeTo(500,0).slideUp(500, function(){
					$(this).remove();
				});
			},5000);

			loadTable();

		}
	});
});

// Create reset button
$(".reset-form-post").click(function(e){
	e.preventDefault();
	$("#create-post-form").trigger("reset");
});

// Delete button
$(document).on('click', '.delete-button', function(){
	$.ajax({
		type: 'DELETE',
		url: '/api/post/' + $(this).attr('data-id'),
		success: function(response){
			$("#flash").html('<div class="alert alert-success">'+response.message+'</div>');
			window.setTimeout(function(){
				$(".alert").fadeTo(500,0).slideUp(500, function(){
					$(this).remove();
				});
			},5000);
			loadTable();
		}
	});
});

// Fungsi load table
function loadTable(){
	$.ajax({
		type: 'POST',
		url: "/table",
		dataType: 'html',
		success: function(table) {
			$('.show-data').html(table);
		}
	});
}

// Get data before update operation
function edit(button){
	$.ajax({
		type: 'GET',
		url: '/api/post/' + $(button).attr('data-id'),
		success: function(data){
			$('#edit-id').val(data.id);
			$('#edit-title').val(data.title);
			$('#edit-post').val(data.post);
		}
	});
}

// Show edit modal
$(document).on('click', '.edit-button', function(){
	edit(this);
});

// Update button
$(".edit-post").click(function(e){
	e.preventDefault();
	var data = $('#edit-post-form').serialize();
	$.ajax({
		type: 'PUT',
		url: "/api/post/"+$('#edit-id').val(),
		data: data,
		success: function(response) {
			$("#edit-post-form").trigger("reset");
			$('#edit-post-modal').modal('hide');
			$("#flash").html('<div class="alert alert-success">'+response.message+'</div>');
			window.setTimeout(function(){
				$(".alert").fadeTo(500,0).slideUp(500, function(){
					$(this).remove();
				});
			},5000);
			loadTable();

		}
	});
});