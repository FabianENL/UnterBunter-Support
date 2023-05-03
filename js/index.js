function change(){
  var mode = ""
  if(!document.getElementById("darkmode").checked){
    jQuery('#sessionWrite').load('./includes/session_write.php?darkmode=unchecked');
    mode = "lightmode"
  }else{
    jQuery('#sessionWrite').load('./includes/session_write.php?darkmode=checked');
    mode = "darkmode"
  }
  load(mode)
}

function load(mode){
  fetch('./js/styles.json')
    .then((response) => response.json())
    .then((json) => {
      style = json[mode]
      for(var x in style){
        if(document.getElementById(x)){
          element = document.getElementById(x)
          for(var y in style[x]){
            element.style[y] = style[x][y]
          }
        }
      }
    });
}