document.addEventListener('DOMContentLoaded', function() {
    // Function to fetch students data and generate table
    function fetchAndDisplaystudentsData() {
        fetch('get_students.php')
            .then(response => response.json())
            .then(data => {
                const tableElement = document.getElementById('studentsTable');
                tableElement.innerHTML = generateTable(data);
            })
            .catch(error => console.error('Error:', error));
    }

    // Add event listener to fetch and display students data when the button is clicked
    document.getElementById('studentsBtn').addEventListener('click', fetchAndDisplayStudentsData);

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
});