
var isRegistered = true;

let loginButton = document.getElementById('login-btn');
let profile = document.getElementById('profile');

if(!isRegistered){
    loginButton.style.visibility = 'visible';
    profile.style.visibility = 'hidden';
}
else{
    loginButton.style.visibility = 'hidden';
    profile.style.visibility = 'visible';
}

document.getElementById("mySubmit").addEventListener("submit",function(event){
    event.preventDefault();
    window.location.href = "merchant-reg.php";
});

document.getElementById("profile").onclick = () =>{
    window.location.href = 'userprofile.php';
}


