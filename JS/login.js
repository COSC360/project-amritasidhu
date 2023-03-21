window.addEventListener('DOMContentLoaded', (event) => {
});
    //the event occurred
    

function validateForm() {
    let username = document.forms["loginForm"]["username"].value;
    if (username == "") {
      alert("Please Enter your Username");
      return false;
    }

    let psw = document.forms["loginForm"]["psw"].value;
    if (psw == "") {
      alert("Please Enter your Password");
      return false;
    }
  }