var sel1 = document.querySelector('.select1');
var sel2 = document.querySelector('.select2');
var options2 = sel2.querySelectorAll('option');
console.dir(sel1);
console.dir(sel2);

function giveSelection(selValue) {
  console.log(selValue);
  sel2.innerHTML = '';
  for(var i = 0; i < options2.length; i++) {
    if(options2[i].dataset.option === selValue) {
      sel2.appendChild(options2[i]);
    }
  }
}

giveSelection(sel1.value);