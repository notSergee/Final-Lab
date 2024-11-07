document.getElementById("contactForm").addEventListener("submit", function(event) {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    

    if (name === "" || email === "" || password === "" ) {
        event.preventDefault();
        alert("Please fill in all fields.");
    }
});

document.getElementById("showPassword").addEventListener("change", function() {
    const passwordField = document.getElementById("password");

    if (this.checked) {
        passwordField.type = "text";  
    } else {
        passwordField.type = "password";  
    }
});

document.getElementById('search-bar').addEventListener('input', function() {
    let searchQuery = this.value.toLowerCase();
    let profiles = document.querySelectorAll('.profile');
    let found = false;

    profiles.forEach(profile => {
        let name = profile.getAttribute('data-name').toLowerCase();

        if (name.includes(searchQuery)) {
            
            profile.scrollIntoView({ behavior: 'smooth' });
            found = true;
            
            return; 
        }
    });

    if (!found && searchQuery !== "") {
        
        console.log("No matching profiles found.");
    }
});