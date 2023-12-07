function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('mail').value;
    var subject = document.getElementById('subject').value;
    var message = document.getElementById('message').value;

    // Reset error messages
    document.getElementById('nameError').innerText = '';
    document.getElementById('mailError').innerText = '';
    document.getElementById('subjectError').innerText = '';
    document.getElementById('messageError').innerText = '';

    // Check for empty fields
    if (name.trim() === '') {
        document.getElementById('nameError').innerText = 'Please enter your name.';
        return false;
    }

    if (email.trim() === '') {
        document.getElementById('mailError').innerText = 'Please enter your email.';
        return false;
    }

    if (subject.trim() === '') {
        document.getElementById('subjectError').innerText = 'Please enter the subject.';
        return false;
    }

    if (message.trim() === '') {
        document.getElementById('messageError').innerText = 'Please enter your message.';
        return false;
    }

    // Check for valid email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        document.getElementById('mailError').innerText = 'Invalid email format.';
        return false;
    }

    return true;
}