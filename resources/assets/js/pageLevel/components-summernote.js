$(document).ready(function() {    
	$('#summernote').summernote({
		toolbar: [
			['font', ['bold', 'italic', 'underline', 'fontsize', 'clear']],
			['para', ['ul', 'ol']],
			['color', ['color']],
			['insert', ['hr']],
			['misc', ['codeview', 'undo', 'redo']]
		],
		height: 250,
		minHeight: 250,
		maxHeight: 250
	});
});

