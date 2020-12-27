function addProductToSell(){
  let x = document.getElementById("form_addproduct");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
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
