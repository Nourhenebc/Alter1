document.getElementById("signup_form").addEventListener("submit", function(event){
    // Get the form fields
    const name = document.getElementById("name").value.trim();
    const username = document.getElementById("username").value.trim();
    const email = document.getElementById("emaile").value.trim();
    const password = document.getElementById("passworde").value.trim();
   // const phone = document.getElementById("phone").value.trim();
    //onst address = document.getElementById("address").value.trim();
    const role = document.getElementById("role").value.trim();
    
    // Define regular expressions for validation
    const nameRegex = /^[a-zA-Z\s]*$/;
    const usernameRegex = /^[a-zA-Z0-9]*$/;
    const emailRegex = /^\S+@\S+\.\S+$/;  
    const passwordRegex = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;
   // const phoneRegex = /^\d{8}$/;
   // const addressRegex = /^[a-zA-Z0-9\s,'-]*$/;



	if (!name || !name.match(nameRegex)) {
        alert("Please enter a valid name (letters and spaces only)");

        event.preventDefault();
        return;
    }
    
    // Validate the username field
    if (!username || !username.match(usernameRegex)) {
        alert("Please enter a valid username (letters and numbers only)");
        event.preventDefault();
        return;
    }
    
    // Validate the email field
    if (!email || !email.match(emailRegex)) {
        alert("Please enter a valid email address");
        event.preventDefault();
        return;
    }
    
    // Validate the password field
    if (!password || !password.match(passwordRegex)) {
        alert("Please enter a valid password (at least one letter and one number)");
        event.preventDefault();
        return;
    }
    
    // Validate the phone field
   /* if (!phone || !phone.match(phoneRegex)) {
        alert("Please enter a valid phone number (8 digits only)");
        event.preventDefault();
        return;
    }
    
    // Validate the address field
    if (!address || !address.match(addressRegex)) {
        alert("Please enter a valid address (letters, numbers, spaces, commas, apostrophes, and hyphens only)");
        event.preventDefault();
        return;
    }
    */
    // If the user is a doctor, validate the documents field
    if (role === "doctor") {
        const documents = document.getElementById("documents").value.trim();
        if (!documents) {
            alert("Please upload your license and papers");
            event.preventDefault();
            return;
        }
    }
    
    // If all fields are valid, submit the form
    alert("Form submitted!");
});