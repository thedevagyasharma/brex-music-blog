var list = document.getElementsByTagName("small");
allFlags = [0,0,0,0,0,0,0];

function validEmail(){
    if (/^ *$/.test(signupform.email.value)) {
      list[0].innerHTML = "Do not leave empty!";
      allFlags[0] = 0;

    }
    else if (/^[a-zA-Z0-9._-]+(@)[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/.test(signupform.email.value)){
      list[0].innerHTML = "";
      allFlags[0] = 1;
    }
    else{
      list[0].innerHTML = "Invalid Email";
      allFlags[0] = 0;
    }
}

function validUsername(){
  if (/^ *$/.test(signupform.username.value)) {
    list[1].innerHTML = "Do not leave empty!";
    allFlags[1] = 0;

  }
  else{
    list[1].innerHTML = "";
    allFlags[1] = 1;
  }
}

function validPassword(){
  if (/^ *$/.test(signupform.pass.value)) {
    list[2].innerHTML = "Do not leave empty!";
    allFlags[2] = 0;

  }
  else if(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,15}$/.test(signupform.pass.value)){
    list[2].innerHTML = "";
    allFlags[2] = 1;
  }
  else{
    list[2].innerHTML = "Minimum 7 and maximum 15 characters, at least 1 UPPERCASE letter, one lowercase letter, one number and one special character(!@#$%^&*)";
    allFlags[2] = 0;
  }
}

function samePassword(){
  if (/^ *$/.test(signupform.conpass.value)) {
    list[3].innerHTML = "Do not leave empty!";
    allFlags[3] = 0;

  }
  else if(signupform.pass.value === signupform.conpass.value){
    list[3].innerHTML = "";
    allFlags[3] = 1;
  }
  else{
    list[3].innerHTML = "Password did not match.";
    allFlags[3] = 0;
  }
}

function constraintDOB(){
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth() + 1; //January is 0!
  var yyyy = today.getFullYear();
  if (dd < 10){
    dd = '0' + dd
  }
  if (mm < 10){
    mm = '0' + mm
  }
  today = yyyy + '-' + mm + '-' + dd;
  signupform.dob.setAttribute("max", today);
}

function validDOB(){
  constraintDOB();
  if(signupform.dob.value==""){
    list[5].innerHTML = "Please select your DOB.";
    allFlags[5] = 0;
  }
  else{
    list[5].innerHTML = "";
    allFlags[5] = 1;
  }
}

function genderSelect(){
  if(signupform.gender.value==""){
    list[4].innerHTML = "Please select your Gender.";
    allFlags[4] = 0;
  }
  else{
    list[4].innerHTML = "";
    allFlags[4] = 1;

  }
}

function checkGenre(){
  var g1 = signupform.genre1.value;
  var g2 = signupform.genre2.value;
  if(g1=="" || g2==""){
    list[6].innerHTML = "Please select 2 genres.";
    allFlags[6] = 0;
  }
  if(g1 == g2 && g1!="" && g2!=""){
    list[6].innerHTML = "Please select 2 different genres.";
    allFlags[6] = 0;
  }
  else if(g1!="" && g2!=""){
    list[6].innerHTML = '';
    allFlags[6] = 1;
  }
}

function btnEnable(){
  enable = 1;
  for(flag of allFlags){
    if(flag==0){
      enable = 0;
    }
  }
  if(enable){
    signupform.signup.removeAttribute("disabled");
    signupform.signup.innerHTML = "Sign Up";
  }
}
