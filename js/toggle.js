/*<!-- Menu Toggle Script -->*/

$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    /* var teste = document.getElementById('navvalue').innerText;

     if (teste == 0) {
         $("#wrapper").toggleClass("toggled");
         document.getElementById('navvalue').innerText = 1;
     } else if (teste == 1) {
         $("#wrapper").toggleClass("toggled");
         document.getElementById('navvalue').innerText = 0;
     }*/
});