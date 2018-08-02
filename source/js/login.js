class LogIn {
  constructor() {
    this.idInput = document.querySelector('.js-login-input-id');
    this.pwInput = document.querySelector('.js-login-input-pw');
    this.loginBtn = document.querySelector('.js-content-button');


    this.checkValidForm = this.checkValidForm.bind(this);
    this.submitForm = this.submitForm.bind(this);

    this.addEventListeners();
  }

  addEventListeners () {
    this.idInput.addEventListener('input', this.checkValidForm);
    this.pwInput.addEventListener('input', this.checkValidForm);
  }

  submitForm() {
    var date = new Date();
    var minsLong = 30;
    date.setTime(date.getTime() + minsLong*60*1000);

    document.cookie = 'id='+this.idInput.value+';';
    document.cookie = 'pw='+this.pwInput.value+';';
    document.cookie = 'expires='+date;
    location.reload();
  }

  checkValidForm () {
    if (this.idInput.value.length != 5 || this.pwInput.value == '') {
      this.loginBtn.classList.remove('activated');
      this.loginBtn.removeEventListener('click', this.submitForm);
      return false;
    }

    this.grade = this.idInput.value[0];
    this.class = this.idInput.value[1]+this.idInput.value[2];
    this.number = this.idInput.value[3]+this.idInput.value[4];

    if(this.grade >= 1 && this.grade <= 3 && this.class >= 1 && this.class <= 14 && this.number >= 1 && this.number <= 45) {
      this.loginBtn.classList.add('activated');
      this.loginBtn.addEventListener('click', this.submitForm);
    }

    else {
      this.loginBtn.classList.remove('activated');
      this.loginBtn.removeEventListener('click', this.submitForm);
    }
  }
}

new LogIn;

function password_visibility(){
  this.inputEl = document.querySelector(".js-login-input-pw");
  this.btnEl = document.querySelector(".js-login-pwVisible");
  if (this.inputEl.type == "password"){
    this.inputEl.type = "text";
    this.btnEl.innerHTML = "visibility";
  }
  else{
    this.inputEl.type = "password";
    this.btnEl.innerHTML = "visibility_off";
  }
}
