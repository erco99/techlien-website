function added(){
    let btn = document.getElementById("btn_add");
    btn.setAttribute("class", "btn btn-success");
    btn.children[0].setAttribute("class", "glyphicon glyphicon-remove");
    btn.children[0].setAttribute("name", "btn_remove");

    btn.style.display = "none";

}

function dropped(){
    let btn = document.getElementById("btn_remove");
    btn.setAttribute("class", "btn btn-info");
    btn.children[0].setAttribute("class", "glyphicon glyphicon-ok");

    btn.style.display = "none";
}



function deleteFromCart(idproduct, iduser){
  console.log("P:"+idproduct + " U:"+iduser);
}


function addProductToSell(){
  let form = document.getElementById("form_addproduct");
  if (form.style.display === "none") {
    form.style.display = "block";
  } else {
    form.style.display = "none";
  }

}

function editProductToSell(id){
  let add = document.getElementById("watch-product_"+id);
  let edit = document.getElementById("edit-product_"+id);


  if (edit.style.display === "none") {
    edit.style.display = "block";

    add.style.display = "none";

  } else {
    edit.style.display = "none";

    add.style.display = "block";
  }


}


function parseInputStock(){
  let stock = document.getElementById('inputStockProduct');
  if(!Number.isInteger(parseInt(stock.value))){
    $("#inputStockProduct_control").text('Value must be a number (es. 45)');
    document.getElementById('inputStockProduct_control').style.color = 'red';
  }
  else{
    $("#inputStockProduct_control").text('');
  }
}


function parseInputPrice(){
  let price = document.getElementById('inputPriceProduct');
  if(isNaN(parseFloat(price.value))){
    $("#inputPriceProduct_control").text('Value must be a price (es. 38,50  or  70 )');
    document.getElementById('inputPriceProduct_control').style.color = 'red';
  }
  else{
    $("#inputPriceProduct_control").text('');
  }
}
