function check_email(){
    const email = document.getElementById("email_signup");
    const emailRegExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    const isValid = email.value.length === 0 || emailRegExp.test(email.value);
    if(!isValid){
        document.getElementById('email_signup').style.borderColor="red";
        document.getElementById('email_signup_err').textContent="Vui lòng nhập đúng định dạng email";
    }else {
        document.getElementById('email_signup').style.borderColor="green";
        document.getElementById('email_signup_err').textContent="";
    }
}

function check_name(){
    const name_signup = document.getElementById("name_signup");
// As per the HTML Specification
    const isValid = name_signup.value.trim() === "" ;
    if(!isValid){
        document.getElementById('name_signup').style.borderColor="green";
        document.getElementById('name_err').textContent="";
    }else {
        document.getElementById('name_signup').style.borderColor="red";
        document.getElementById('name_err').textContent="Vui lòng nhập họ tên";
    }
}
function check_username(){
    const username_signup = document.getElementById("username_signup");
    const isValid = username_signup.value.trim() === "" ;
    if(!isValid){
        document.getElementById('username_signup').style.borderColor="green";
        document.getElementById('username_err').textContent="";
    }else {
        document.getElementById('username_signup').style.borderColor="red";
        document.getElementById('username_err').textContent="Vui lòng nhập tên đăng nhập";
    }
}