var xhttp = new XMLHttpRequest();
xhttp.open("POST", "/abstraction/ajax/side-nav.html", false);
xhttp.send();
document.querySelector(".js-page").innerHTML += xhttp.responseText;

class SideNav {
  constructor () {
    this.showButtonEl = document.querySelector('.js-menu-show');
    this.hideButtonEl = document.querySelector('.js-menu-hide');
    this.sideNavEl = document.querySelector('.js-side-nav');
    this.logoutBtnEl = document.querySelector('.js-logout');

    this.showSideNav = this.showSideNav.bind(this);
    this.hideSideNav = this.hideSideNav.bind(this);

    this.addEventListeners();
  }

  addEventListeners () {
    this.showButtonEl.addEventListener('click', this.showSideNav);
    this.hideButtonEl.addEventListener('click', this.hideSideNav);
    this.logoutBtnEl.addEventListener('click', this.logout);
  }

  showSideNav () {
    this.sideNavEl.classList.add('side-nav--visible');
  }

  hideSideNav () {
    this.sideNavEl.classList.remove('side-nav--visible');
  }

  logout () {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++)
      document.cookie = cookies[i].split('=')[0]+'=';
    location.assign('/abstraction/?logout');
  }
}

new SideNav();
