function dropdownMenu() {
    var x = document.getElementById("dropdownClick");
    if (x.className === "topnav") {
        x.className += " responsive"; /* Change topnav to topnav.responsive */
    } else {
        x.className = "topnav";
    }
}

function readMore() {
    var x =  document.getElementById("quickLook");
    x.innerHTML = "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia perspiciatis laborum eaque et nesciunt id, optio hic non voluptatibus eveniet.";
}