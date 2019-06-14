function myFunction() {
  document.getElementById("maj").innerHTML = 'paragraph changed';
}

function myFunction2(){
  var person = {
    firstName : "John",
    lastName  : "Doe",
    age     : 50,
    eyeColor  : "blue"
  };

  document.getElementById("demo21").innerHTML =
  typeof person.firstName;
}


var x = myFunction(4,5);
document.getElementById("demo20").innerHTML = x;



document.getElementById("demo22").innerHTML = toCelsius(77);

function toCelsius(f) {
  return (5/9) * (f-32);
}


function myFunction(a,b){
  document.getElementById("demo").innerHTML = ??? comment j'affiche ???
return a*b;
}





 <button type="button" onclick="myFunction2()">Cliquer</button>

<p id="demo">Ca va remplacer ce texte par le resultat de la fonction</p>
<br />

<button type="button" onclick="">Cliquer</button>

<p id="demo3">Texte de test JS</p>

<p id="abc"></p> -->

<!-- <script>
document.getElementById("demo3").innerHTML = toCelsius(77);

function toCelsius(f) {
 return (5/9) * (f-32);
}
var person = {
   firstName: "John",
   lastName : "Doe",
   id       : 5566,
   fullName : function() {
     return this.firstName + " " + this.lastName;
   }
};
// document.getElementById("abc").innerHTML = person.firstName + " " + person["lastName"];
// var name = person.fullName();
// document.getElementById("abc").innerHTML = name;
// document.write(name);

Writing into an HTML element, using innerHTML.
Writing into the HTML output using document.write().
Writing into an alert box, using window.alert().
Writing into the browser console, using console.log().

// onchange -	An HTML element has been changed
// onclick - The user clicks an HTML element
// onmouseover	- The user moves the mouse over an HTML element
// onmouseout -	The user moves the mouse away from an HTML element
// onkeydown - The user pushes a keyboard key
// onload -	The browser has finished loading the page
</script>
