const container = document.getElementById('container');
const registerBtn = document.getElementById('register');
const loginBtn = document.getElementById('log');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});

// Add event listener for sign-up button click event
document.querySelector('.sign-up button').addEventListener('click', function(event) {
    // Prevent default form submission behavior
    event.preventDefault();

    // Submit the form
    document.getElementById('register-form').submit();
});

// Function to handle sign-in and redirection
// document.getElementById('login-form').addEventListener('submit', function(event) {
//     event.preventDefault(); // prevent form submission
//     var username = document.getElementById('username').value;
//     var password = document.getElementById('password').value;
//     if (username === 'admin@gmail.com' && password === 'admin123') {
//         window.location.href = '../Dashboard3/dashboard.html'; // redirect to dashboard page
//     } else {
//         alert('Invalid credentials'); // show alert if credentials are incorrect
//     }
// });
