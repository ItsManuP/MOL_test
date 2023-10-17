<!DOCTYPE html>
<html>
<head>
    <title>Progetto</title>
    <script
  src="https://code.jquery.com/jquery-3.7.0.js"
  integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
  crossorigin="anonymous"></script>
</head>
<body>
    <h1><center>Progetto Realizzato da Manuel Pilia</center></h1>

    <?php
    $json_data = file_get_contents('db-watches.json');  
    //trasformo la struttura in un array associativo.
    $data_decoded = json_decode($json_data, true);  

?>
        <h3 style="text-align:center">Elenco prodotti: </h3>       
        
        <ol start="0">
<?php 
    foreach ($data_decoded as $item) {
        echo "<li>" . 
        " Brand: " . 
        $item['brand'] . 
        " Modello: " . 
        $item['model'] . 
        " Prezzo " .  
        $item['price'] . 
        " Discount " . 
        $item['discount'] .
        " Type: " .  
        $item['type'] . 
        " Strap: " . 
        $item['strap'] . 
        " Descrizione: " . 
        substr($item['description'], 0, 20) .
       
        "</li>";
    }?>
    </ol>


    <div>
    <h1 style="text-align:center">Elementi Archiviati:</h1>
    <div id="elementi_archiviati">
    
    
    </div>
    </div>

</div>
 

    <div style="text-align:center">
    <h3> Modifica prodotto </h3>
        <div>
        <label for="elemento">Seleziona Elemento:</label>
        <select id="elemento" name="elemento"></select>
        <div id="inputArea" style="display: none;">
        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brandadd" required>
        <label for="model">Modello:</label>
        <input type="text" id="model" name="modeladd" required>
        <label for="model">Descrizione:</label>
        <input type="text" id="description" name="descriptionadd" required>
        <label for="model">Price:</label>
        <input type="number"  id="price" name="priceadd" required>
        <label for="model">Discount:</label>
        <input type="text" id="discount" name="discountadd" required>
        <label for="model">Type:</label>
        <input type="text" id="type" name="typeadd" required>
        <label for="model">Strap:</label>
        <input type="text" id="strap" name="strapadd" required
      >

        <button id="submitButton">Salva Modifiche</button>
        </div>

        <div id="message"></div>
        </div>
</div>


    <div style="text-align:center">
    <h3> Archivia Elemento </h3>
    <h4> Quale prodotto vuoi archiviare? Seleziona il prodotto dalla lista:</h4>
    <input type="number" id="archivia" value="0" min="0"></input>
    <input type="submit" onclick="const elementi_archiviati = archiviati()" />
    <div>
        
    </div>
   
    
</div>


    <div style="text-align:center">
    <h3> Aggiunta elemento </h3>
    <h4> Fornisci i dati per aggiungere il prodotto al database</h4>
    <div  style="display: flex; justify-content: center;">
    <form id="myForm" style="width:10%">
    <label for="brand" >Brand:</label> <input type="text"name="brand" required/>
    <label for="model">Model:</label> <input type="text"name="model" required/>
    <label for="description" >description:</label> <input type="text"name="description" required/>
    <label for="price">price:</label><input type="number" name="price" required/>
    <label for="discount" >discount:</label> <input type="text" name="discount" required/>
    <label for="type" >Type:</label> <input type="text" name="type" required/>
    <label for="strap">strap:</label> <input type="text" name="strap" required/>
    <input type="submit" name="submit" value="invia">
</form>
  </div>
</div>

<div>

<div >
        <h3 style="text-align:center">Filtra per Brand:</h3>
      
        <select id="filtro_brand">
        <option value="Sole">Sole</option>
        <option value="Marte">Marte</option>
        <option value="Giove">Giove</option>
        <option value="Venere">Venere</option>
        <option value="Mercurio">Mercurio</option>
        <option value="Saturno">Saturno</option>
        </select>
        <button id="filtra_button" style="text-align:center">Filtra</button>
        </div>
        
        <button id="hide_button" >Nascondi Elementi Filtrati</button>
        <button id="show_button" >Mostra Elementi Filtrati</button>
        <div id="elementi_filtrati" style="display:none">
        
        <!-- Lista degli elementi del JSON -->
        </div>
  </div>
  </div>

<div style="text-align:center">
  <h3>Filtra elementi per Prezzo</h3>
  <button id="filter_button_uno"><h4>Range 40-80 </h4></button>
  <button id="filter_button_due"><h4>Range 80-120 </h4></button>
  <button id="filter_button_tre"><h4>Range 120-160</h4> </button>
  <div id="risultato_range" style="text-align:left"></div>
  
  
</div>

<div style="text-align:center">
    <h3> Filtra elementi per sconto </h3>
    <button id="prodotti_scontati"> Mostra prodotti scontati</button>
    <button id="prodotti_non_scontati"> Mostra prodotti non scontati </button>
    <div id="prodotti_discount" style="text-align:left">
    </div>
</div>



<div style="text-align:center">
    <h3> Mostra prodotti in ordine decrescente/crescente con sconto applicato</h3>
    <button id="ordine_sconto_decrescente"> Prodotti in ordine decrescente</button>
    <button id="ordine_sconto_crescente"> Prodotti in ordine crescente </button>
    <div id="risultato_ordine_sconto">

    </div>
</div>



</body>




    <script>
    const archiviati_array = []
    function archiviati(){
       
        var archivia = document.getElementById('archivia').value;
        var dati = <?php echo $json_data?>
        
        archiviati_array.push(dati[archivia])
       
        
        var datiString = JSON.stringify(archiviati_array, null, 1);
        var datiPrecedenti = localStorage.getItem('dati');
        var datiPrecedentiArray = datiPrecedenti ? JSON.parse(datiPrecedenti) : [];
        var datiAggiornatiArray = datiPrecedentiArray.concat(archiviati_array);
        var datiAggiornatiString = JSON.stringify(datiAggiornatiArray, null, 1);
        localStorage.setItem('dati', datiAggiornatiString);
        location.reload();
        
       
    }

        
    datiRecuperati= localStorage.getItem('dati')
    const datiOggetto = JSON.parse(datiRecuperati);
    console.log(datiOggetto);
    
    var datiContainer = document.getElementById('elementi_archiviati');
    datiContainer.innerHTML += '<p>' + JSON.stringify(datiOggetto)  + '</p>' ;  
    
    
//Funzione ajax per effettare una chiamat post e aggiungere un oggetto al json
$(document).ready(function() {
  $('#myForm').submit(function(event) {
    event.preventDefault();
    
    var brandValue = $('input[name="brand"]').val();
    var modelValue = $('input[name="model"]').val();
    var priceValue = $('input[name="price"]').val();
    var descriptionValue = $('input[name="description"]').val();
    var discountValue = $('input[name="discount"]').val();
    var typeValue = $('input[name="type"]').val();
    var strapValue = $('input[name="strap"]').val();
    console.log(brandValue);
    
    var formData = {
      brand: brandValue,
      model: modelValue,
      description: descriptionValue,
      price: priceValue,
      discount: discountValue,
      type: typeValue,
      strap: strapValue,
    };
    

    $.ajax({
      type: 'POST',
      url: 'server.php',
      data: formData,
      success: function(response) {
        console.log('Dati inviati correttamente a server.php');
        console.log(formData);
        location.reload();
      },
      error: function(xhr, status, error) {
        console.error('Errore durante l\'invio dei dati:', error);
      }
    });
  });
});


//
$(document).ready(function() {
  var jsonData = []; 
  
  // Genero dropdownmenu
  function generateDropDown() {
    var selectElement = $('#elemento');
    selectElement.empty(); // Svuotao il drop-down menu
    
    // Aggiungo info del json al dropmenu
    for (var i = 0; i < jsonData.length; i++) {
      var option = $('<option>').text(jsonData[i].model);
      selectElement.append(option);
    }
  }
  
  
  function showInputArea() {
    var inputArea = $('#inputArea');
    inputArea.show();
  }
  
 
  $('#elemento').change(function() {
    showInputArea(); 
  });
  
  
  $('#submitButton').click(function(event) {
    event.preventDefault();
    
    var selectedmodel = $('#elemento').val();
    console.log(selectedmodel);
    var newbrand = $('input[name="brandadd"]').val();
    console.log(newbrand);
    var newmodel = $('input[name="modeladd"]').val();
    var newdescription = $('input[name="descriptionadd"]').val();
    var newprice = $('input[name="priceadd"]').val();
    var newdiscount = $('input[name="discountadd"]').val();
    var newtype = $('input[name="typeadd"]').val();
    var newstrap = $('input[name="strapadd"]').val();
   


    
    var formData = {
      selectedmodel: selectedmodel,
      newbrand: newbrand,
      newmodel: newmodel,
      newdescription: newdescription,
      newprice: newprice,
      newdiscount: newdiscount,
      newtype: newtype,
      newstrap: newstrap,
    };
    
    
    $.ajax({
      type: 'POST',
      url: 'modifica.php',
      data: formData,
      success: function(response) {
        console.log('Dati inviati correttamente a server.php');
        $('#message').text('Modifiche salvate con successo.');
       
      },
      error: function(xhr, status, error) {
        console.error('Errore durante l\'invio dei dati:', error);
        $('#message').text('Errore durante il salvataggio delle modifiche.');
        
      }
    });
  });
  
  function loadJSONData() {
    $.getJSON('db-watches.json', function(data) {
      jsonData = data;
      generateDropDown(); // Genera il drop-down menu
    });
  }

  // Carica e aggiorna i dati JSON all'avvio e ogni 5 secondi
  loadJSONData();
  setInterval(loadJSONData, 40000);
});


//Chiamata per filtrare gli elementi in base al Brand
$(document).ready(function() {
    var jsonData = []; 

    // Funzione per generare la lista degli elementi del JSON
    function generateElementList(data) {
      var datiContainer = $('#elementi_filtrati');
      datiContainer.empty(); // Svuota la lista precedente
      // Itera sui dati e mostra ciascun elemento
      for (var i = 0; i < data.length; i++) {
        var item = data[i];
        var itemHTML = '<p>' + JSON.stringify(item) + '</p>';
        datiContainer.append(itemHTML);
        
      }
    }

    // Funzione per filtrare gli elementi del JSON per Brand
    function filterByBrand(brand) {
      if (brand && brand !== "") {
        var filteredData = jsonData.filter(function(item) {
          return item.brand === brand;
        });

        generateElementList(filteredData);
      } else {
        var datiContainer = $('#elementi_filtrati');
        datiContainer.empty(); // Svuota la lista degli elementi
      }
    }

    
    $('#filtra_button').click(function() {
      var selectedBrand = $('#filtro_brand').val();
      console.log(selectedBrand);
      filterByBrand(selectedBrand);
    });


    $.getJSON('db-watches.json', function(data) {
      jsonData = data;
      generateElementList(jsonData); // Mostra tutti gli elementi iniziali
    });
});



$('#hide_button').click(function() {
  var elementiFiltratiDiv = $('#elementi_filtrati');
  elementiFiltratiDiv.hide(); // Nascondi il div degli elementi filtrati
});

$('#show_button').click(function() {
  var elementiFiltratiDiv = $('#elementi_filtrati');
  elementiFiltratiDiv.show(); // Nascondi il div degli elementi filtrati
});



// Chiamata per filtrare gli elementi del json in base al range di prezzo
$('#filter_button_uno').click(function() {
  // Ottieni il valore del range di prezzo
  var minPrice = 40;
  var maxPrice = 80;

  // Esegui la chiamata AJAX
  $(document).ready(function() {
  var jsonData = []; 

  // Genero la lista json
  function generateElementList(data) {
    var datiContainer = $('#risultato_range');
    datiContainer.empty(); 

    var list = $('<ol></ol>');
    // Itero su ogni data e aggiungo gli elementi
    for (var i = 0; i < data.length; i++) {
      var item = data[i];
      var listItem = $('<li></li>').text(JSON.stringify(item));
      list.append(listItem);
    }
    // aggiungo la lista al div
    datiContainer.append(list);
  }


  function filterByPriceRange(minPrice, maxPrice) {
  var filteredData = jsonData.filter(function(item) {
    var price = parseFloat(item.price);
    return price >= minPrice && price <= maxPrice;
  });

  generateElementList(filteredData);}

  $('#filter_button_uno').click(function() {
    var minPrice = 40;
    var maxPrice = 80;
    filterByPriceRange(minPrice, maxPrice);
  });
  

  $.getJSON('db-watches.json', function(data) {
    jsonData = data;
    generateElementList(filteredData); 
  });
});
})



$('#filter_button_due').click(function() {
  
  var minPrice = 80;
  var maxPrice = 120;

  // Esegui la chiamata AJAX
  $(document).ready(function() {
  var jsonData = []; 
  // Genero la lista json
  function generateElementList(data) {
    var datiContainer = $('#risultato_range');
    datiContainer.empty(); 

    var list = $('<ol></ol>');
    // Itero su ogni data e aggiungo gli elementi
    for (var i = 0; i < data.length; i++) {
      var item = data[i];
      var listItem = $('<li></li>').text(JSON.stringify(item));
      list.append(listItem);
    }
    // aggiungo la lista al div
    datiContainer.append(list);
  }

 
  function filterByPriceRange(minPrice, maxPrice) {
  var filteredData = jsonData.filter(function(item) {
    var price = parseFloat(item.price);
    return price >= minPrice && price <= maxPrice;
  });

  generateElementList(filteredData);}

  $('#filter_button_due').click(function() {
    var minPrice = 80;
    var maxPrice = 120;
    filterByPriceRange(minPrice, maxPrice);
  });
  
 
  $.getJSON('db-watches.json', function(data) {
    jsonData = data;
    generateElementList(filteredData); 
  });
});
})

$('#filter_button_tre').click(function() {
  
  var minPrice = 120;
  var maxPrice = 160;

  // Esegui la chiamata AJAX
  $(document).ready(function() {
  var jsonData = []; 

  // Genero la lista json
  function generateElementList(data) {
    var datiContainer = $('#risultato_range');
    datiContainer.empty(); 
    // Creo una lista non ordinata
    var list = $('<ol></ol>');
    // Itero su ogni data e aggiungo gli elementi
    for (var i = 0; i < data.length; i++) {
      var item = data[i];
      var listItem = $('<li></li>').text(JSON.stringify(item));
      list.append(listItem);
    }
    // aggiungo la lista al div
    datiContainer.append(list);
  }


  function filterByPriceRange(minPrice, maxPrice) {
  var filteredData = jsonData.filter(function(item) {
    var price = parseFloat(item.price);
    return price >= minPrice && price <= maxPrice;
  });

  generateElementList(filteredData);}

 
  $('#filter_button_tre').click(function() {
    var minPrice = 120;
    var maxPrice = 160;
    filterByPriceRange(minPrice, maxPrice);
  });
  

  $.getJSON('db-watches.json', function(data) {
    jsonData = data;
    generateElementList(filteredData); 
    
  });
});
})








$('#prodotti_scontati').click(function() {
  $.ajax({
    url: 'db-watches.json', 
    dataType: 'json',
    success: function(data) {
      var filteredData = data.filter(function(item) {
        var discount = parseFloat(item.discount);
        return !isNaN(discount) && discount !== 0;
      });

      displayFilteredData(filteredData);
    },
    error: function(xhr, status, error) {
      console.log('Errore nella chiamata AJAX:', error);
    }
  });
});


$('#prodotti_non_scontati').click(function() {
  $.ajax({
    url: 'db-watches.json',
    dataType: 'json',
    success: function(data) {
      var filteredData = data.filter(function(item) {
        var discount = parseFloat(item.discount);
        return !isNaN(discount) && discount === 0;
      });

      displayFilteredData(filteredData);
    },
    error: function(xhr, status, error) {
      console.log('Errore nella chiamata AJAX:', error);
    }
  });
});

function displayFilteredData(filteredData) {
  var prodottiDiscountDiv = $('#prodotti_discount');
  prodottiDiscountDiv.empty();


  var productList = $('<ul></ul>');


  filteredData.forEach(function(item) {
    var listItem = $('<li></li>').text(JSON.stringify(item));
    productList.append(listItem);
  });


  prodottiDiscountDiv.append(productList);
}




//Funzione per mostrare i prodotti in ordine crescente/decrescente con sconto applicato al prezzo originario
function getProdottiOrdineSconto() {
    $.ajax({
      url: 'db-watches.json',
      dataType: 'json',
      success: function(data) {
        // Ordina i prodotti in ordine decrescente in base al prezzo scontato
        var prodottiOrdinati = data.sort(function(a, b) {
          var prezzoA = parseFloat(a.price) * (1 - parseFloat(a.discount) / 100);
          var prezzoB = parseFloat(b.price) * (1 - parseFloat(b.discount) / 100);
          return prezzoB - prezzoA;
        });

        
        var risultatoDiv = $('#risultato_ordine_sconto');
        risultatoDiv.empty();
        var listaProdotti = $('<ol></ol>');
        prodottiOrdinati.forEach(function(prodotto) {
          var prezzoScontato = parseFloat(prodotto.price) * (1 - parseFloat(prodotto.discount) / 100);
          var listItem = $('<li></li>').text(prodotto.brand + ' - ' + prodotto.model + ' - Prezzo scontato: ' + prezzoScontato.toFixed(2));
          listaProdotti.append(listItem);
        });
        risultatoDiv.append('Elenco prodotti in ordine decrescente con sconto applicato:').append(listaProdotti);
      },
      error: function(xhr, status, error) {
        console.log('Errore nella chiamata AJAX:', error);
      }
    });
  }


  $('#ordine_sconto_decrescente').click(function() {
    getProdottiOrdineSconto();
  });


  // Funzione per ottenere la lista dei prodotti ordinata in ordine crescente
  function getProdottiOrdineCrescente() {
    $.ajax({
      url: 'db-watches.json', 
      dataType: 'json',
      success: function(data) {
        // Ordina i prodotti in ordine crescente in base al prezzo scontato
        var prodottiOrdinati = data.sort(function(a, b) {
          var prezzoScontatoA = parseFloat(a.price) * (1 - parseFloat(a.discount) / 100);
          var prezzoScontatoB = parseFloat(b.price) * (1 - parseFloat(b.discount) / 100);
          return prezzoScontatoA - prezzoScontatoB;
        });

        
        var risultatoDiv = $('#risultato_ordine_sconto');
        risultatoDiv.empty();
        var listaProdotti = $('<ol></ol>');
        prodottiOrdinati.forEach(function(prodotto) {
          var prezzoScontato = parseFloat(prodotto.price) * (1 - parseFloat(prodotto.discount) / 100);
          var listItem = $('<li></li>').text(prodotto.brand + ' - ' + prodotto.model + ' - Prezzo scontato: ' + prezzoScontato.toFixed(2));
          listaProdotti.append(listItem);
        });
        risultatoDiv.append('Elenco prodotti in ordine crescente con sconto applicato:').append(listaProdotti);
      },
      error: function(xhr, status, error) {
        console.log('Errore nella chiamata AJAX:', error);
      }
    });
  }

  $('#ordine_sconto_crescente').click(function() {
    getProdottiOrdineCrescente();
  });


    </script>
</html>