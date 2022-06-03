
let modifBtn = document.getElementById("submit");
console.dir(modifBtn);

modifBtn.onclick = function () {
  var billingItems = document.querySelectorAll('#profil input[type="text"]');
  for (var i = 0; i < billingItems.length; i++) {
    billingItems[i].disabled = !billingItems[i].disabled;
  }
  if(modifBtn.value == 'Modifier le profil')
  {
    modifBtn.value = 'Confirmer la modification'
  }
  else
  {
    modifBtn.value = 'Modifier le profil'
  }
};


