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

function updateProductToSell(id){
if( $('#desktopedit-product_'+id).css('display')=='block'){
  alert("DESKTOP");

  const name = document.getElementById("name_text_"+id).value;
  const description = document.getElementById("description_text_"+id).value;
  const price = document.getElementById("price_text_"+id).value;
  const stock = document.getElementById("stock_text_"+id).value;
}
if($('#mobileedit-product_'+id).css('display')=='block'){
  alert("MOBILE");
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
