const ALL_INPUT_GROUP_DIVS = document.querySelectorAll('.input-group');

const CONTINUE_BTN = document.querySelector('.continue');

const EMAIL_OR_PHONENO_INPUT_DIV = Array.from(ALL_INPUT_GROUP_DIVS).find(div => div.classList.contains('input-EmailOrMobileNo'));
const EMAIL_OR_PHONENO_INPUT = EMAIL_OR_PHONENO_INPUT_DIV.querySelector('input');

EMAIL_OR_PHONENO_INPUT.addEventListener('blur',function(){
  const EMAIL_OR_PHONENO_VALUE = EMAIL_OR_PHONENO_INPUT.value.trim();
    validateEmailOrPhoneNumber(EMAIL_OR_PHONENO_VALUE);
});

function validateEmailOrPhoneNumber(emailOrPhoneNoValue) {
  if(!emailOrPhoneNoValue.length){
    return
  }
  const ERROR_MESSAGE = EMAIL_OR_PHONENO_INPUT_DIV.querySelector('.msg');
  const IS_PHONE_NO_VALID = /[0-9]+/.test(emailOrPhoneNoValue);
  const IS_EMAIL_VALID = /.*@.*/.test(emailOrPhoneNoValue);
  
  // Clear previous states
  CONTINUE_BTN.disabled=true
  EMAIL_OR_PHONENO_INPUT_DIV.classList.remove('error', 'success');
  ERROR_MESSAGE.textContent = '';  // Clear any previous error messages
  if(IS_PHONE_NO_VALID || IS_EMAIL_VALID){
    EMAIL_OR_PHONENO_INPUT_DIV.classList.add('success');
    CONTINUE_BTN.disabled=false;
    return;
  }
  EMAIL_OR_PHONENO_INPUT_DIV.classList.add('error');
  ERROR_MESSAGE.textContent = "Invalid email or phonenumber";
}
window.addEventListener("load", () => {
  const EMAIL_OR_PHONENO_VALUE = EMAIL_OR_PHONENO_INPUT.value.trim();
    validateEmailOrPhoneNumber(EMAIL_OR_PHONENO_VALUE);
});