
const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form .signup-link a");

const malebtn = document.getElementById("malein");
const femalebtn = document.getElementById("femalein");

const male =  document.getElementById("maleimg");
const female =  document.getElementById("femaleimg");



signupBtn.onclick = (()=>{
loginForm.style.marginLeft = "-50%";
loginText.style.marginLeft = "-50%";
});
loginBtn.onclick = (()=>{
loginForm.style.marginLeft = "0%";
loginText.style.marginLeft = "0%";
});
signupLink.onclick = (()=>{
signupBtn.click();
return false;
});




female.style.display = "none";

function genderanalyze(gender) {
if (gender == "Male") {
  male.style.display = "block";
  female.style.display = "none";
}
else if (gender == "Female"){
  female.style.display = "block";
  male.style.display = "none";
}
}