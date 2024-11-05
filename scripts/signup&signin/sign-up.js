const FORM_CONTAINER = document.querySelector(".form-container");
const FORM = FORM_CONTAINER.querySelector('form');
const ALL_INPUT_GROUP_DIVS = FORM.querySelectorAll('.input-group');

const CONTINUE_BTN = FORM.querySelector('.continue');

const NAME_INPUT_DIV = Array.from(ALL_INPUT_GROUP_DIVS).find(div => div.classList.contains('input-name'));

const NAME_INPUT = NAME_INPUT_DIV.querySelector('input');
const NUMERIC_INPUTS = FORM.querySelectorAll("[inputmode='numeric']");

const USER_ID_INPUT = FORM.querySelector(".timeInMs");

NUMERIC_INPUTS .forEach((input) => {
  validateInput(input);
});



const PSWD_INPUT_DIV = Array.from(ALL_INPUT_GROUP_DIVS).find(div => div.classList.contains('input-password'));
const PSWD_INPUT = PSWD_INPUT_DIV.querySelector('input');

const CONFIRM_PSWD_INPUT_DIV = Array.from(ALL_INPUT_GROUP_DIVS).find(div => div.classList.contains('input-confirmPswd'));
const CONFIRM_PSWD_INPUT = CONFIRM_PSWD_INPUT_DIV.querySelector('input');

const ERROR_MESSAGE_CONFIRM_PSWD = CONFIRM_PSWD_INPUT_DIV.querySelector('.msg');
const ERROR_MESSAGE_PSWD = PSWD_INPUT_DIV.querySelector('.msg');

CONTINUE_BTN.addEventListener('click', function(event) {
  setUserId(); // Call setUserId when the button is clicked
  //CONTINUE_BTN.disabled = true; // Disable the button to prevent multiple submissions
});
NAME_INPUT.addEventListener('blur',function(){
  const NAME_VALUE = NAME_INPUT.value.trim();
    validateName(NAME_VALUE);
});

CONFIRM_PSWD_INPUT.addEventListener('blur',function(){
  const PSWD_VALUE = PSWD_INPUT.value;
  const CONFIRM_PSWD_VALUE = CONFIRM_PSWD_INPUT.value;
    validateConfirmPassword(PSWD_VALUE,CONFIRM_PSWD_VALUE);
});
PSWD_INPUT.addEventListener('blur',function(){
  const PSWD_VALUE = PSWD_INPUT.value;
  const CONFIRM_PSWD_VALUE = CONFIRM_PSWD_INPUT.value;
    validatePassword(PSWD_VALUE,CONFIRM_PSWD_VALUE);
 })


  
function validateName(nameValue) {
  const ERROR_MESSAGE = NAME_INPUT_DIV.querySelector('.msg');

  const IS_NAME_VALID = /^[A-Z][a-zA-Z]{3,}(?: [A-Z][a-zA-Z]*){0,2}$/.test(nameValue);
  
  // Clear previous states
  NAME_INPUT_DIV.classList.remove('error', 'success');
  ERROR_MESSAGE.textContent = '';  // Clear any previous error messages
  
  if (nameValue.length < 2) {
    ERROR_MESSAGE.textContent = "Name is too short.";
    NAME_INPUT_DIV.classList.add('error');
    return;
  }

  if (!IS_NAME_VALID) {
    ERROR_MESSAGE.textContent = "Please enter a valid name (with proper capitalization and spacing).";
    NAME_INPUT_DIV.classList.add('error');
    return;
  }

  // If valid
  NAME_INPUT_DIV.classList.add('success');
}

function validateConfirmPassword(passwordValue,confirmPasswordValue){
  clearPasswordErrorClassesAndMessages();
  
  console.log('alertUserAboutToBeCalled');
  alertUserAboutPassword(passwordValue,confirmPasswordValue);
}

function validatePassword(passwordValue,confirmPasswordValue){
  clearPasswordErrorClassesAndMessages();
  if(passwordValue.length < 8 && passwordValue.length){
    PSWD_INPUT_DIV.classList.add("error");
    ERROR_MESSAGE_PSWD.textContent = "password is too short";
    return;
  }
  
  
  console.log('alertUserAboutToBeCalled');
  alertUserAboutPassword(passwordValue,confirmPasswordValue);

}

function alertUserAboutPassword(passwordValue,confirmPasswordValue){
  CONTINUE_BTN.disabled = true;
  console.log(passwordValue,confirmPasswordValue);
  if(!passwordValue.length || !confirmPasswordValue.length){ 
    return;
  }
  if(confirmPasswordValue === passwordValue){ 
    CONTINUE_BTN.disabled = false;
  }
  else{
    CONFIRM_PSWD_INPUT_DIV.classList.add('error');
    ERROR_MESSAGE_CONFIRM_PSWD.textContent = 'passwords do not match';
  }
}

function clearPasswordErrorClassesAndMessages(){
  PSWD_INPUT_DIV.classList.remove('error', 'success');
  CONFIRM_PSWD_INPUT_DIV.classList.remove('error','success');
  ERROR_MESSAGE_CONFIRM_PSWD .textContent = '';
  ERROR_MESSAGE_PSWD .textContent = '';
}
function validateInput(el) {
  el.addEventListener("beforeinput", function (e) {
    let beforeValue = el.value;
    e.target.addEventListener(
      "input",
      function () {
        if (el.validity.patternMismatch) {
          el.value = beforeValue;
        }
      },
      { once: true }
    );
  });
}
function setUserId(){
  const RANDOM_NO = Math.floor(Math.random()*(86400-1))+1;
  const CURRENT_TIME_MILLISECONDS= new Date().getTime();
  USER_ID_INPUT.value=`${CURRENT_TIME_MILLISECONDS}${RANDOM_NO}`;
}
console.log(USER_ID_INPUT.value)





