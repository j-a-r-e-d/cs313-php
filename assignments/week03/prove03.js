// Javascript Assign11

//#region Variables
var item_0 = parseFloat(document.getElementById("item_0").Value);
var item_1 = parseFloat(document.getElementById("item_1").Value);
var item_2 = parseFloat(document.getElementById("item_2").Value);
var item_3 = parseFloat(document.getElementById("item_3").Value);
var item_4 = parseFloat(document.getElementById("item_4").Value);
var item_5 = parseFloat(document.getElementById("item_5").Value);
var item_6 = parseFloat(document.getElementById("item_6").Value);
var item_7 = parseFloat(document.getElementById("item_7").Value);
var item_8 = parseFloat(document.getElementById("item_8").Value);

const patterns = {
   "names" : /^[\D]+$/,
   "address": /.+/,
   "telephone": /^[\d]{3}-[\d]{3}-[\d]{4}$/,
   "expDate": /^(\d|0[\d]|1[0-2])\/(20[2-9][0-9])$/,
   "creditCard": /^[\d]{16}$/
};

const fname = document.getElementById('first_name');
const mname = document.getElementById('middle_name');
const lname = document.getElementById('last_name');
const address = document.getElementById('address');
const phoneNum = document.getElementById('phone');
const cc = document.getElementById('credit_card');
const expDate = document.getElementById('exp_date');
//#endregion

//#region Event Listeners
   //#region Customer Input
   document.getElementById('first_name').addEventListener('keyup', function(){
      validate(fname.value, fname.id);
   });
   document.getElementById('last_name').addEventListener('keyup', function(){
      validate(lname.value, lname.id);
   });
   document.getElementById('middle_name').addEventListener('keyup', function(){
      validate(mname.value, mname.id);
   });
   document.getElementById('address').addEventListener('keyup', function(){
      validate(address.value, address.id);
   });
   document.getElementById('phone').addEventListener('keyup', function(){
      validate(phoneNum.value, phoneNum.id);
   });
   document.getElementById('credit_card').addEventListener('keyup', function(){
      validate(cc.value, cc.id);
   });
   document.getElementById('exp_date').addEventListener('keyup', function(){
      validate(expDate.value, expDate.id);
   });
   //#endregion
   //#region Image List
   document.getElementById('img_0').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_1').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_2').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_3').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_4').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_5').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_6').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_7').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   document.getElementById('img_8').addEventListener('click', function(){
      var checkbox = document.getElementById('item' + this.id.substr(3));
      var status = checkbox.checked;
      check(checkbox, status);
   });
   //#endregion
//#endregion

// When and image is clicked, toggle the corresponding item checkbox.
function check(item, isChecked){
   if (isChecked == false){
      item.checked = true;
   }else{
      item.checked = false;
   }
}

function validate(elementValue, elementId) {
   // console.log('Element value: ' + elementValue);
   // console.log('Element id: ' + elementId);
   if (elementValue.length == 0 ||
      (
         (elementId == fname.id ||
          elementId == lname.id ||
          elementId == mname.id) &&
          (!patterns.names.test(elementValue))) ||
         (elementId == address.id && (!patterns.address.test(elementValue))) ||
         (elementId == phoneNum.id && (!patterns.telephone.test(elementValue))) ||
         (elementId == cc.id && (!patterns.creditCard.test(elementValue))) ||
         (elementId == expDate.id && (!patterns.expDate.test(elementValue)))
      ){
      validationMessages(false, elementId);
   }else{
      validationMessages(true, elementId);
   }
};

function validationMessages(isValid, elementId){
   var results = document.getElementById(elementId + 'Prompt');
   if (isValid){
      results.innerHTML = 'VALID';
      results.style.color = 'green';
      results.style.fontSize = '.5rem';
   }else{
      results.innerHTML = 'INVALID';
      results.style.color = 'red';
      results.style.fontSize = '.5rem';
   }
}

function resetFocus(){
   document.form1.first_name.focus();
}


function calculateTotal(){
   var sum = 0;
   for (var i = 0; i < 9; i++){
      if (document.getElementById('item_' + String(i)).checked){
         sum += parseFloat(document.getElementById('item_' + String(i)).value);
      }
   }
    document.getElementById('displayTotal').value = '$' + sum.toFixed(2);
}
