const loginButton = document.getElementById('loginButton');
const registerButton = document.getElementById('registerButton');
const logoutButton = document.getElementById('logoutButton');

loginButton.addEventListener('click', () =>{
    window.location.href = 'login.html';
});

registerButton.addEventListener('click', () =>{
    window.location.href = 'register.html';
});

logoutButton.addEventListener('click', () =>{
    window.location.href = 'login.html';
});

function clearFunc()
{
	document.getElementById("email").value="";
	document.getElementById("pwd1").value="";
}
function clearForm(){
    // get form by id
    var form = document.getElementById("my_form");

    //reset form
    form.reset();
}