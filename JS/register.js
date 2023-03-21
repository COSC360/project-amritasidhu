
window.addEventListener('DOMContentLoaded', (event) => {
});
    //the event occurred
    function containsNumbers(str) {
        return /\d/.test(str);
      }

function validateForm() {
    let username = document.forms["registerForm"]["username"].value;
    if (username == "") {
      alert("Name must be filled out");
      return false;
    }
    if(username.length < 5){
        alert("Username must be atleast 5 characters");
        return false;
    }

    
    let email = document.forms["registerForm"]["email"].value;
    if (email == "") {
      alert("Email must be filled out");
      return false;
    }

    let psw = document.forms["registerForm"]["psw"].value;
    if (psw == "") {
      alert("Password must be filled out");
      return false;
    }
    if(psw.length < 6){
        alert("Password must be atleast 6 characters");
        return false;
    }
    if(containsNumbers(psw) == false){
        alert("Password must contain atleast one number");
        return false;
    }



    let pswrepeat = document.forms["registerForm"]["psw-repeat"].value;
    if (pswrepeat == "") {
      alert("Please enter your password twice");
      return false;
    }
    if(psw != pswrepeat){
        alert("Passwords do not match");
        return false;
    }


  }


