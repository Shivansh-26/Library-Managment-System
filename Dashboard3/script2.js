document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch books data and generate table
    function fetchAndDisplayBooksData() {
        fetch('get_books.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const tableElement = document.getElementById('booksTable');
                tableElement.innerHTML = generateTable(data);
            })
            .catch(error => console.error('Error fetching books data:', error));
    }

    // Function to fetch students data and generate table
    function fetchAndDisplayStudentsData() {
        fetch('get_students.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const tableElement = document.getElementById('studentsTable');
                tableElement.innerHTML = generateTable(data);
            })
            .catch(error => console.error('Error fetching students data:', error));
    }

    // Function to generate HTML table from JSON data
    function generateTable(data) {
        let table = '<thead><tr>';
        for (let key in data[0]) {
            table += `<th>${key}</th>`;
        }
        table += '</tr></thead><tbody>';
        
        data.forEach(item => {
            table += '<tr>';
            for (let key in item) {
                table += `<td>${item[key]}</td>`;
            }
            table += '</tr>';
        });
        
        table += '</tbody>';
        
        return table;
    }

    // Add event listener to fetch and display books data when the button is clicked
    document.getElementById('booksBtn').addEventListener('click', fetchAndDisplayBooksData);

    // Add event listener to fetch and display students data when the button is clicked
    document.getElementById('studentsBtn').addEventListener('click', fetchAndDisplayStudentsData);
});
document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch books data and generate table
    function fetchAndDisplayBooksData() {
        fetch('get_books.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const tableElement = document.getElementById('booksTable');
                tableElement.innerHTML = generateTable(data);
            })
            .catch(error => console.error('Error fetching books data:', error));
    }

    // Function to fetch students data and generate table
    function fetchAndDisplayStudentsData() {
        fetch('get_students.php')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                const tableElement = document.getElementById('studentsTable');
                tableElement.innerHTML = generateTable(data);
            })
            .catch(error => console.error('Error fetching students data:', error));
    }

    // Function to generate HTML table from JSON data
    function generateTable(data) {
        let table = '<thead><tr>';
        for (let key in data[0]) {
            table += `<th>${key}</th>`;
        }
        table += '</tr></thead><tbody>';
        
        data.forEach(item => {
            table += '<tr>';
            for (let key in item) {
                table += `<td>${item[key]}</td>`;
            }
            table += '</tr>';
        });
        
        table += '</tbody>';
        
        return table;
    }

    // Add event listener to fetch and display books data when the button is clicked
    document.getElementById('booksBtn').addEventListener('click', fetchAndDisplayBooksData);

    // Add event listener to fetch and display students data when the button is clicked
    document.getElementById('studentsBtn').addEventListener('click', fetchAndDisplayStudentsData);
});
