window.addEventListener('DOMContentLoaded', (event) => {
});
    //the event occurred
    

function validateForm() {

    let psw = document.forms["loginForm"]["psw"].value;
    if (psw == "") {
      alert("Please Enter your Password");
      return false;
    }
  }