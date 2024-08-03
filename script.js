document.getElementById('name-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const userName = document.getElementById('user-name').value;
    document.getElementById('greeting').innerText = `Hi ${userName}`;
    document.getElementById('name-section').style.display = 'none';
    document.getElementById('survey-section').style.display = 'block';
});

document.getElementById('survey-form').addEventListener('submit', function(event) {
    event.preventDefault();
    window.location.href = 'https://wa.link/j19oub';
});