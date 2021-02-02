var y = getComputedStyle(document.documentElement).getPropertyValue('--y');
var z = getComputedStyle(document.documentElement).getPropertyValue('--z');
t = z[1];
t = parseInt(t);    
u = y[1];
u = parseInt(u);

function add(){
    txt = document.getElementById("value");
    p = t - 0.1;
    //alert(p);
    txt.textContent  = p;
    document.documentElement.style.setProperty('--z', p + "vw");
    t = p;

}







