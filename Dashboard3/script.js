document.addEventListener('DOMContentLoaded', function() {
    // Function to show the "Add Book" form
    function showAddBookForm() {
        document.querySelector(".add--book").classList.add("active");
    }

    // Function to close the "Add Book" form
    function closeAddBookForm() {
        document.querySelector(".add--book").classList.remove("active");
    }

    // Add onclick event listener for showing the "Add Book" form
    document.querySelector("#show--add").onclick = showAddBookForm;

    // Add onclick event listener for closing the "Add Book" form
    document.querySelector(".add--book .close--btn").onclick = closeAddBookForm;

    // Function to handle form submission for adding books
    function handleAddBookFormSubmit(event) {
        // Prevent default form submission behavior
        event.preventDefault();

        // Get form data
        var bookID = document.getElementById('bookID').value;
        var bookName = document.getElementById('bookName').value;
        var authorName = document.getElementById('authorName').value;
        var publishYear = document.getElementById('publishYear').value;

        // Check if any field is empty
        if (bookID.trim() === '' || bookName.trim() === '' || authorName.trim() === '' || publishYear.trim() === '') {
            alert('Please fill out all fields.');
            return;
        }

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Configure the request
        xhr.open('POST', 'books.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        // Set up the callback function
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful, display response
                alert(xhr.responseText);
                // Optionally, you can reset the form after successful submission
                document.querySelector('#addBookForm').reset();
            } else {
                // Request failed, display error message
                alert('Error: ' + xhr.statusText);
            }
        };

        // Set up error handler for the XMLHttpRequest object
        xhr.onerror = function() {
            alert('Request failed.');
        };

        // Prepare the form data to send
        var formData = 'bookID=' + encodeURIComponent(bookID) + '&bookName=' + encodeURIComponent(bookName) + '&authorName=' + encodeURIComponent(authorName) + '&publishYear=' + encodeURIComponent(publishYear);

        // Send the request
        xhr.send(formData);
    }

    // Add event listener for form submission for adding books
    document.getElementById('addBookForm').addEventListener('submit', handleAddBookFormSubmit);
});
