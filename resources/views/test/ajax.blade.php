@extends('layouts.app')
@section('title', 'Название страницы')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <!-- Include a button to trigger the AJAX request -->
        <input type="text" name="words">
        <button id="getIconsButton">Get Icons</button>

        <!-- Create a container element for the icons -->
        <div id="iconsContainer1" class="row">icons</div>

        <!-- Include the JavaScript code to make the AJAX request -->
        <script>
        // Get a reference to the button and container elements
            // Get a reference to the button and container elements
        var getIconsButton = document.getElementById("getIconsButton");
        var iconsContainer = document.getElementById("iconsContainer");
        var iconsContainer1 = document.getElementById("iconsContainer1");
        function fetchIcons() {
        // Get the input value
        var words = document.querySelector('input[name="words"]').value;

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();
        // Set the HTTP method and URL for the request
        xhr.open("GET", "/api/icons/show?words=" + encodeURIComponent(words), true);
        // Set the response type to JSON
        xhr.responseType = "json";
        // Add an event listener for when the response is received
        xhr.addEventListener("load", function() {
            // Handle the response
            if (xhr.status === 200) {
            displayIcons(xhr.response);
            }
        });
        // Send the request
        xhr.send();
        }

        function displayIcons(icons) {

        iconsContainer1.innerHTML = "";
        icons.forEach(function(icon) {
            var iconElement = document.createElement("x-icon.main");
            iconElement.className='icofont-'+icon.name;
            iconElement.style.fontSize = "3rem";
            iconElement.style.color = "red";
            var radioElemment = document.createElement("input");
            radioElemment.type = "radio";
            radioElemment.name = "image";
            radioElemment.id = "image_"+icon.id;
            radioElemment.value = icon.id;
            radioElemment.className = "form-check-input";
            iconsContainer1.appendChild(radioElemment);
            var labelElement = document.createElement("label");
            labelElement.className = "form-check-label";
            labelElement.for = "image_"+icon.id;
            labelElement.textContent = icon.name;
            var divElement = document.createElement("div");
            divElement.className = "form-check";
            divElement.className = "col-md-2";
            divElement.appendChild(radioElemment);
            divElement.appendChild(labelElement);
            divElement.appendChild(iconElement);
            iconsContainer1.appendChild(divElement);
        });
        }

        getIconsButton.addEventListener("click", function() {
        fetchIcons();
        });


        </script>

    </div>
</div>

@endsection