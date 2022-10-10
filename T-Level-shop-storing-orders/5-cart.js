var cart = {

    // (A) HELPER - AJAX FETCH
    ajax : (data, after) => {
    // (A1) FORM DATA
        let form = new FormData();
        for (let [k, v] of Object.entries(data)) { form.append(k, v); }

        // (A2) FETCH
        fetch("4-ajax-cart.php", { method:"POST", body:form })
        .then((res) => res.json()).then((res) => {
            if (res.status!=1) { alert(res.msg); }
            else if (after) { after(res.msg); }
        }).catch((err) => {
            alert("Error");
            console.error(err);
        });
    },
    // (B) SHOW ITEMS IN CART
    show : () => {
        cart.ajax({ req : "get" }, (items) => {
            // (B1) GET HTML CART
            let hcart = document.getElementById("cart");
            hcart.innerHTML = "";
            // (B2) EMPTY CART
            if (items===null) { hcart.innerHTML = "Cart is empty."; }
            // (B3) DRAW CART ITEMS
            else {
                let total = 0;
                for (let [id, pdt] of Object.entries(items)) {
                    // ITEM ROW HTML ELEMENTS
                    let row = document.createElement("div"),
                    rowA = document.createElement("button"),

                    rowB = document.createElement("div"),
                    rowC = document.createElement("input");
                    // DELETE BUTTON
                    rowA.innerHTML = "X";
                    rowA.onclick = () => { cart.del(id); };
                    rowA.className = "cDel";
                    row.appendChild(rowA);
                    // NAME
                    rowB.innerHTML = pdt.name;
                    rowB.className = "cName";
                    row.appendChild(rowB);
                    // QUANTITY
                    rowC.type = "number";
                    rowC.value = pdt.qty;
                    rowC.min = 0; rowC.max = 99;
                    rowC.onchange = function () { cart.set(id, this.value); };
                    rowC.className = "cQty";

                    row.appendChild(rowC);
                    // ADD TO GRAND TOTAL
                    total += pdt.qty * pdt.price;
                    // ENTIRE ROW
                    row.className = "cRow";
                    hcart.appendChild(row);
                }
                // GRAND TOTAL
                let row = document.createElement("div");
                row.innerHTML = "TOTAL £" + total.toFixed(2);
                row.className = "cTotal";
                hcart.appendChild(row);
                // CHECKOUT
                row = document.createElement("button");
                row.innerHTML = "Checkout";
                row.className = "cOut";

                row.onclick = () => { location.href = "7-checkout.php"; };
                hcart.appendChild(row);
                // EMPTY CART
                row = document.createElement("button");
                row.innerHTML = "Empty";
                row.className = "cNuke";
                row.onclick = cart.nuke;
                hcart.appendChild(row);
            }
        });
    },
    // (C) ADD ITEM TO CART
    add : (pid) => {
        cart.ajax({ req : "add", pid : pid }, cart.show);
    },
    // (D) CHANGE QUANTITY
    set : (pid, qty) => {
        cart.ajax({ req : "set", pid : pid, qty : qty }, cart.show);
    },
    // (E) REMOVE ITEM
    del : (pid) => {
        cart.ajax({ req : "del", pid : pid }, cart.show);
    },
    // (F) NUKE
    nuke : () => { if (confirm("Empty cart?")) {
        cart.ajax({ req : "nuke" }, cart.show);
    }}
    };
window.addEventListener("DOMContentLoaded", cart.show);