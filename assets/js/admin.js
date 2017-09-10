var current = 0;
setup(current);

function setup(id) {
  var current_div = document.getElementById(current);
  var next_div = document.getElementById(id);

  var current_element = document.getElementsByClassName('page-item')[current];
  var next_element = document.getElementsByClassName('page-item')[id];
  current_div.style.display="none";
  next_div.style.display="block";

  current_element.classList.remove('active')
  next_element.classList.add('active')
  current = id;
}
