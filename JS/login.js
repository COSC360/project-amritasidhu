document.addEventListener('DOMContentLoaded', (event) => {
    //the event occurred
  

function validateForm() {
    let x = document.forms["loginForm"]["username"].value;
    if (x == "") {
      alert("Name must be filled out");
      return false;
    }
  }

})