function getCookie(name) {
  var name = name+ '=';
  var arr = document.cookie.split(';');

  for (var i = 0; i < arr.length; i++) {
    while (arr[i].charAt(0)==' ') {
      arr[i] = arr[i].substring(1);
    }
    if (arr[i].indexOf(name) == 0) {
      return arr[i].substring(name.length, arr[i].length);
    }
  }
  return '';
}

function delCookie(name) {
  var cookies = document.cookie.split(';');
  for (var i = 0; i < cookies.length; i++) {
    if (name != 'all' && cookies[i].split('=')[0] != name)
      continue;
    document.cookie = cookies[i].split('=')[0]+'=';
  }
}

function AjaxContent (doc) {
  xhttp = new XMLHttpRequest();
  ajaxSrc = './ajax/'+doc;
  ajaxTarget = document.querySelector(".js-content");

  xhttp.open("POST", this.ajaxSrc, false);
  xhttp.send();
  ajaxTarget.innerHTML = xhttp.responseText;
}
