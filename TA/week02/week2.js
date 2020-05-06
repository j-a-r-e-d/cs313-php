function clickEvent(){
  let element1 = document.getElementById('div1');
  let element2 = document.getElementById('div2');
  let element3 = document.getElementById('div3');
  element1.style.backgroundColor = 'tomato';
  element1.style.color = 'white';
  element2.style.backgroundColor = 'tomato';
  element2.style.color = 'white';
  element3.style.backgroundColor = 'tomato';
  element3.style.color = 'white';
  alert('Clicked!');
}

function changeDivColor(){
  let element = document.getElementById('div1');
  let colorChange = document.getElementById('color').value;
  let textColor = element.style.color;
  let bodyColor = document.getElementById('body').style.color;
  // console.log(colorChange);
  // console.log(textColor);
  // console.log(bodyColor);
  if (colorChange === textColor){
    console.log(colorChange === textColor);
    element.style.backgroundColor = colorChange;
    buttonColor = document.getElementsByTag('button').style.color;
    console.log(buttonColor);
    element.style.color = buttonColor;
  }else {
    element.style.backgroundColor = colorChange;
  }
}
