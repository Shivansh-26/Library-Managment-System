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
    document.getElementById('show--add').addEventListener('click', showAddBookForm);

    // Add onclick event listener for closing the "Add Book" form
    document.querySelector(".add--book .close--btn").addEventListener('click', closeAddBookForm);

    // Function to add a book
    function addBook() {
        var bookID = document.getElementById('bookID').value;
        var bookName = document.getElementById('bookName').value;
        var authorName = document.getElementById('authorName').value;
        var publishYear = document.getElementById('publishYear').value;

        // AJAX request to add book
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'books.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Book added successfully, close form and possibly update UI
                alert(xhr.responseText);
                closeAddBookForm();
            } else {
                // Request failed, display error message
                alert('Error: ' + xhr.statusText);
            }
        };
        xhr.onerror = function() {
            alert('Request failed.');
        };
        xhr.send('bookID=' + encodeURIComponent(bookID) + '&bookName=' + encodeURIComponent(bookName) + '&authorName=' + encodeURIComponent(authorName) + '&publishYear=' + encodeURIComponent(publishYear));
    }

    // Add event listener for form submission for adding books
    document.getElementById('addBookBtn').addEventListener('click', addBook);


    // Function to show the "Add Student" form
    function showAddStudentForm() {
        document.querySelector(".add--student").classList.add("active");
    }

    // Function to close the "Add Student" form
    function closeAddStudentForm() {
        document.querySelector(".add--student").classList.remove("active");
    }

    // Add onclick event listener for showing the "Add Student" form
    document.getElementById('show--studentPopup').addEventListener('click', showAddStudentForm);

    // Add onclick event listener for closing the "Add Student" form
    document.querySelector(".add--student .close--btn").addEventListener('click', closeAddStudentForm);
    
    // Function to add a student
    function addStudent() {
        var studentid = document.getElementById('studentid').value;
        var studentName = document.getElementById('studentName').value;
        var studentBranch = document.getElementById('studentBranch').value;
        var Contact = document.getElementById('Contact').value;

        // AJAX request to add student
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'students.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Student added successfully, close form and possibly update UI
                alert(xhr.responseText);
                closeAddStudentForm();
            } else {
                // Request failed, display error message
                alert('Error: ' + xhr.statusText);
            }
        };
        xhr.onerror = function() {
            alert('Request failed.');
        };
        xhr.send('studentid=' + encodeURIComponent(studentid) + '&studentName=' + encodeURIComponent(studentName) + '&studentBranch=' + encodeURIComponent(studentBranch) + '&Contact=' + encodeURIComponent(Contact));
    }

    // Add event listener for form submission for adding students
    document.getElementById('addStudentBtn').addEventListener('click', addStudent);
});
