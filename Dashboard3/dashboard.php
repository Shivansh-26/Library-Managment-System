<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/lib-logo.jpg" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css" />
    <!-- Font Awesome CDN link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="logo">
                <img src="../Assets/lib-logo.jpg" class="imga" />
                <h2>LMS</h2>
            </div>

            <ul class="menu">
                <li class="active">
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="../Dashboard3/profile.php">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="../Dashboard3/statistics.php">
                        <i class="fas fa-chart-bar"></i>
                        <span>Statistics</span>
                    </a>
                </li>
                <li class="logout">
                    <a href="../LoginPage/logout.php">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main--content">
            <div class="navbar">
                <div class="navbar--dashboard">
                    <h1>Dashboard</h1>
                </div>
                <div class="user--info">
                    <i class="fas fa-user-tie"></i>
                    <a href="../Dashboard3/profile.php"><span>Admin</span></a>
                </div>
            </div>

            <div class="card--container">
                <div class="card--1">
                    <button type="button" id="show--add">Add Book</button>
                    <button type="button" id="show--studentPopup">Add Student</button>
                    <button type="button" id="show--issuePopup">Issue Book</button>
                    <button type="button" id="show--returnPopup">Return Book</button>
                </div>
                <div class="card--2">
                    <img src="../Assets/library.jpg" class="card--img" />
                </div>
            </div>
        </div>

        <!-- Add Book Form -->
        <div class="add--book">
            <div class="close--btn">&times;</div>
            <div class="book--form">
                <h2>Add Book</h2>
                <form id="addBookForm" method="POST">
                    <div class="form--element">
                        <label for="bookID">Book ID</label>
                        <input type="text" id="bookID" name="bookID" placeholder="Enter Book ID" required />
                    </div>
                    <div class="form--element">
                        <label for="bookName">Name</label>
                        <input type="text" id="bookName" name="bookName" placeholder="Enter Book Name" required />
                    </div>
                    <div class="form--element">
                        <label for="authorName">Author</label>
                        <input type="text" id="authorName" name="authorName" placeholder="Enter Author Name" required />
                    </div>
                    <div class="form--element">
                        <label for="publishYear">Published Year</label>
                        <input type="number" id="publishYear" name="publishYear" placeholder="YYYY" pattern="[0-9]{4}" required />
                    </div>
                    <div class="form--element">
                        <button type="submit" id="addBookBtn">Add Book</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Add Student Form -->
        <div class="add--student">
            <div class="close--btn">&times;</div>
            <div class="student--form">
                <h2>Add Student</h2>
                <form id="addStudentForm" method="POST">
                    <div class="form--element">
                        <label for="studentid">Student ID</label>
                        <input type="text" id="studentid" name="studentid" placeholder="Enter Student ID" required />
                    </div>
                    <div class="form--element">
                        <label for="studentName">Student Name</label>
                        <input type="text" id="studentName" name="studentName" placeholder="Enter Student Name" required />
                    </div>
                    <div class="form--element">
                        <label for="studentBranch">Branch Name</label>
                        <input type="text" id="studentBranch" name="studentBranch" placeholder="Enter Branch" required />
                    </div>
                    <div class="form--element">
                        <label for="Contact">Contact Number</label>
                        <input type="tel" id="Contact" name="Contact" placeholder="Enter Contact No." pattern="[0-9]{10}" required />
                    </div>
                    <div class="form--element">
                        <button type="submit" id="addStudentBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Issue Book Form -->
        <div class="issue--book">
            <div class="close--btn">&times;</div>
            <div class="issue--form">
                <h2>Issue Book</h2>
                <form id="issueBookForm" method="POST">
                    <div class="form--element">
                        <label for="bookID">Book ID</label>
                        <input type="text" id="bookid" name="bookID" placeholder="Enter Book ID" required />
                    </div>
                    <div class="form--element">
                        <label for="stuID">Student ID</label>
                        <input type="text" id="stuID" name="stuID" placeholder="Enter Student ID" required />
                    </div>
                    <div class="form--element">
                        <label for="issueDate">Issue Date</label>
                        <input type="date" id="issueDate" name="issueDate" placeholder="YYYY-MM-DD" required />
                    </div>
                    <div class="form--element">
                        <label for="dueDate">Due Date</label>
                        <input type="date" id="dueDate" name="dueDate" placeholder="YYYY-MM-DD" required />
                    </div>
                    <div class="form--element">
                        <button type="submit" id="issueBookBtn">Issue</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Return Book Form -->
        <div class="return--book">
            <div class="close--btn">&times;</div>
            <div class="return--form">
                <h2>Return Book</h2>
                <form id="returnBookForm">
                    <div class="form--element">
                        <label for="bookID">Book ID</label>
                        <input type="text" id="BookID" placeholder="Enter Book ID" required />
                    </div>
                    <div class="form--element">
                        <label for="stuID">Student ID</label>
                        <input type="text" id="StuID" placeholder="Enter Student ID" required />
                    </div>
                    <div class="form--element">
                        <label for="returnDate">Return Date</label>
                        <input type="date" id="returnDate" placeholder="YYYY-MM-DD" required />
                    </div>
                    <div class="form--buttons">
                        <button type="submit">Return</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to show the "Add Book" form
            function showAddBookForm() {
                document.querySelector(".add--book").classList.add("active");
            }

            // Function to close the "Add Book" form
            function closeAddBookForm() {
                document.querySelector(".add--book").classList.remove("active");
            }

            // Function to show the "Add Student" form
            function showAddStudentForm() {
                document.querySelector(".add--student").classList.add("active");
            }

            // Function to close the "Add Student" form
            function closeAddStudentForm() {
                document.querySelector(".add--student").classList.remove("active");
            }

            // Add onclick event listener for showing the "Add Book" form
            document.querySelector("#show--add").onclick = showAddBookForm;

            // Add onclick event listener for closing the "Add Book" form
            document.querySelector(".add--book .close--btn").onclick = closeAddBookForm;

            // Add onclick event listener for showing the "Add Student" form
            document.querySelector("#show--studentPopup").onclick = showAddStudentForm;

            // Add onclick event listener for closing the "Add Student" form
            document.querySelector(".add--student .close--btn").onclick = closeAddStudentForm;

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

            document.querySelector("#show--issuePopup").addEventListener("click",function(){
                document.querySelector(".issue--book").classList.add("active");
            });

            document.querySelector(".issue--book .close--btn").addEventListener("click",function(){
                document.querySelector(".issue--book").classList.remove("active");
            });

            // Function to issue book after verifying student and book IDs
            function issueBook() {
                var stuID = document.getElementById('stuID').value;
                var bookID = document.getElementById('bookid').value;
                var issueDate = document.getElementById('issueDate').value;
                var dueDate = document.getElementById('dueDate').value;

                // Create a FormData object to send data to the server
                var formData = new FormData();
                formData.append('stuID', stuID);
                formData.append('bookID', bookID);

                // AJAX request to verify student and book IDs
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'verify_ids.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // IDs verification result
                        alert(xhr.responseText);
                        // Proceed with issuing book if verification is successful for both IDs
                        if (xhr.responseText === "IDs verified.") {
                            // Fetch other book-related details and issue the book
                            // AJAX request to insert data into the database
                            var xhrInsert = new XMLHttpRequest();
                            xhrInsert.open('POST', 'issue_book.php', true);
                            xhrInsert.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhrInsert.onload = function() {
                                if (xhrInsert.status >= 200 && xhrInsert.status < 300) {
                                    // Issue book result
                                    alert(xhrInsert.responseText);
                                    closeIssueBookForm();
                                    // Optionally, you can update the UI here
                                } else {
                                    // Request failed, display error message
                                    alert('Error: ' + xhrInsert.statusText);
                                }
                            };
                            xhrInsert.onerror = function() {
                                alert('Request failed.');
                            };
                            // Send the data to the PHP script
                            xhrInsert.send('stuID=' + encodeURIComponent(stuID) + '&bookID=' + encodeURIComponent(bookID) + '&issueDate=' + encodeURIComponent(issueDate) + '&dueDate=' + encodeURIComponent(dueDate));
                        }
                    } else {
                        // Request failed, display error message
                        alert('Error: ' + xhr.statusText);
                    }
                };
                xhr.onerror = function() {
                    alert('Request failed.');
                };
                // Send the student and book IDs to the PHP script
                xhr.send('stuID=' + encodeURIComponent(stuID) + '&bookID=' + encodeURIComponent(bookID));
            }

            // Add event listener for form submission for verifying student and book IDs
            document.getElementById('issueBookForm').addEventListener('submit', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Call the issueBook function to handle the submission
                issueBook();
            });

            document.querySelector("#show--returnPopup").addEventListener("click",function(){
                document.querySelector(".return--book").classList.add("active");
            });

            document.querySelector(".return--book .close--btn").addEventListener("click",function(){
                document.querySelector(".return--book").classList.remove("active");
            });

            function returnBook() {
                var stuID = document.getElementById('StuID').value;
                var bookID = document.getElementById('BookID').value;
                var returnDate = document.getElementById('returnDate').value;

                // Create a FormData object to send data to the server
                var formData = new FormData();
                formData.append('stuID', stuID);
                formData.append('bookID', bookID);
                formData.append('returnDate', returnDate);

                // AJAX request to PHP script
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'return_book.php', true);
                xhr.onload = function() {
                    if (xhr.status >= 200 && xhr.status < 300) {
                        // Success response
                        alert(xhr.responseText);
                        closeReturnBookForm();
                    } else {
                        // Error response
                        alert('Error: ' + xhr.statusText);
                    }
                };
                xhr.onerror = function() {
                    // Request failed
                    alert('Request failed.');
                };
                xhr.send(formData);
            }

            function closeReturnBookForm() {
                document.querySelector(".return--book").classList.remove("active");
            }

            function closeIssueBookForm() {
                document.querySelector(".issue--book").classList.remove("active");
            }

            document.getElementById('returnBookForm').addEventListener('submit', function(event) {
                // Prevent the default form submission behavior
                event.preventDefault();

                // Call the issueBook function to handle the submission
                returnBook();
            });

        });
    </script>
</body>
</html>
