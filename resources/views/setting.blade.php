@extends('layouts.app')
@section('title', 'Название страницы')

@section('content')
	<style>
		#drag-element {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			margin: 10px;
			display: inline-block;
		}

		#drop-element {
			border: 2px dashed #ccc;
			padding: 20px;
			margin: 20px;
			min-height: 100px;
			text-align: center;
		}
	</style>
    <div id="drag-element" draggable="true" data-value="123">Drag me!</div>
	<div id="drop-element">Drop here!</div>

	<script>
		const dragElement = document.getElementById('drag-element');
		const dropElement = document.getElementById('drop-element');

		// Drag handlers
		dragElement.addEventListener('dragstart', (event) => {
			event.dataTransfer.setData('text/plain', 'Dragged element');
			dragElement.style.opacity = '0.5';
		});

		dragElement.addEventListener('dragend', (event) => {
			dragElement.style.opacity = '1';
		});

		// Drop handlers
		dropElement.addEventListener('dragover', (event) => {
			event.preventDefault();
			dropElement.style.border = '2px dashed red';
		});

		dropElement.addEventListener('dragenter', (event) => {
			event.preventDefault();
			dropElement.style.border = '2px dashed red';
		});

		dropElement.addEventListener('dragleave', (event) => {
			event.preventDefault();
			dropElement.style.border = '2px dashed #ccc';
		});

/* 		dropElement.addEventListener('drop', (event) => {
			event.preventDefault();
			const data = event.dataTransfer.getData('text/plain');
			dropElement.textContent = data;
			dropElement.style.border = '2px dashed #ccc';
		}); */
    /*     dropElement.addEventListener('drop', (event) => {
            event.preventDefault();
            const data = event.dataTransfer.getData('text/plain');
            const draggedElement = document.getElementById(data);
            const draggedValue = draggedElement.getAttribute('data-value');
            dropElement.textContent = 'Dropped value: ' + draggedValue;
            dropElement.style.border = '2px dashed #ccc';
        }); */
        dropElement.addEventListener('drop', (event) => {
    event.preventDefault();
    const data = event.dataTransfer.getData('text/plain');
    const draggedElement = document.getElementById('drag-element'); // get the dragged element
    const draggedValue = draggedElement.getAttribute('data-value');
    if (data === 'Dragged element') {
        dropElement.textContent = 'Dropped!' + 'Dropped value: ' + draggedValue;
        dropElement.style.border = '2px dashed #ccc';
        const formData = new FormData();
        formData.append('id', draggedValue);
        formData.append('_token', '{{ csrf_token() }}');
        sendajax(formData);
        location.reload();
    }
});

function sendajax(formData) {
    $.ajax({
        type: "POST",
        url: "{{ route('chengecat') }}", // replace with the actual route URL
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            console.log('Request successful');
            console.log(response);
        },
        error: function (xhr, textStatus, errorThrown) {
            console.error('Request failed');
            console.error(xhr.responseText);
        }
    });
}


	</script>

@endsection
