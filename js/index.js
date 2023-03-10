var enabled = true;

function change(){
  enabled = !enabled;
  console.log(enabled);
  if(enabled){
    document.getElementById('main').style.backgroundColor = "white";
  }else{
    document.getElementById('main').style.backgroundColor = "rgb(70, 70, 70)";
  }
}