class ScreenResizing {
  constructor () {
    this.contentEl = document.querySelector('.js-content');
    this.contentButtonEl = new Array();
    this.contentButtonEl[0] = document.querySelector('.js-content-button');
    this.contentButtonEl[1] = document.querySelector('.js-content-button-2');

    this.moveContent = this.moveContent.bind(this);

    this.addEventListeners();
  }

  addEventListeners () {
    window.addEventListener('resize', this.moveContent);
  }

  moveContent () {
    if (window.innerWidth < 720) {
      this.contentEl.classList.add('is-mobile');
      this.contentEl.classList.remove('is-desktop');
      for (var i = 0; i < this.contentButtonEl.length; i++) {
        if (this.contentButtonEl[i] == undefined)
          break;
        this.contentButtonEl[i].classList.add('is-mobile');
        this.contentButtonEl[i].classList.remove('is-desktop');
      }
    }
    else {
      this.contentEl.classList.add('is-desktop');
      this.contentEl.classList.remove('is-mobile');
      for (var i = 0; i < this.contentButtonEl.length; i++) {
        if (this.contentButtonEl[i] == undefined)
          break;
        this.contentButtonEl[i].classList.add('is-desktop');
        this.contentButtonEl[i].classList.remove('is-mobile');
      }
    }
  }
}
new ScreenResizing();
new ScreenResizing().moveContent();
