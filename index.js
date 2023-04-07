
var isRegistered = false;

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