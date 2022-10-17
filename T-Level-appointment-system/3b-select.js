function select (cell, date, slot) {
    // (A) UPDATE SELECTED CELL
    let last = document.querySelector("#select .selected");
    if (last != null) { last.classList.remove("selected"); }
    cell.classList.add("selected");
    // (B) UPDATE CONFIRM FORM
    document.getElementById("cdate").value = date;
    document.getElementById("cslot").value = slot;
    document.getElementById("cgo").disabled = false;
}

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }