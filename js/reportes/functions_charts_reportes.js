var myChart;
//formato de numeros para chart-bar
function formatoNum(number, decimals, dec_point, thousands_sep) {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + '').replace(',', '').replace(' ', '');
    var n = !isFinite(+number) ? 0 : +number,
      prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
      sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
      dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
      s = '',
      toFixedFix = function(n, prec) {
        var k = Math.pow(10, prec);
        return '' + Math.round(n * k) / k;
      };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
      s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
      s[1] = s[1] || '';
      s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

function lecturaTabla(){
  var table = document.getElementById('dataTable');
  var json = []; //incluye a los headers
  var headers = [];
  for (var i = 0; i < table.rows[0].cells.length; i++) {
    headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi, '');
  }
  //recorre celdas
  for (var i = 1; i < table.rows.length; i++) {
    var tableRow = table.rows[i];
    var rowData = {};
    for (var j = 0; j < tableRow.cells.length; j++) {
      rowData[headers[j]] = tableRow.cells[j].innerHTML;
    }
  json.push(rowData);
  }
  return json;
}

function BuildChart(labels, values, chartTitle) {
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
  //var ctx = document.getElementById("myChart").getContext('2d');
  var ctx = document.getElementById("myBarChart");
  //bar
      myChart = new Chart(ctx, {
      type: 'horizontalBar',
      data: {
          labels: labels, // Our labels
          datasets: [{
              label: chartTitle, // Name the series
              data: values, // Our values
              backgroundColor: [ // Specify custom colors
              ],
              borderColor: [ // Add custom color borders
              ],
              borderWidth: 1 // Specify bar border width
          }]
      },
      options: {
          responsive: true, // Instruct chart js to respond nicely.
          maintainAspectRatio: false, // Add to prevent default behaviour of full-width/height 
      }
  });
  return myChart;
}

function actualizarGrafico(chart, labels, values){
  chart.data.datasets.data=values;
  chart.data.labels=labels;
  chart.update();
}

function filtroTabla(){
  var json=lecturaTabla();
  var fjson;
  var labels;
  var values;
  console.log(json);

  cliente=document.getElementById("F_cliente");
  fcliente=cliente.value;
  rep=document.getElementById("F_rep");
  frep=rep.value;
  art=document.getElementById("F_articulo");
  farticulo=art.value;
  fac=document.getElementById("F_factura");
  ffac=fac.value;
  ord=document.getElementById("F_forden");
  ford=ord.value;
  //console.log(fcliente);
  //console.log(frep);
  //console.log(farticulo);
  //console.log(ffac);
  //console.log(ford);
  if (fcliente.length!=0){
    fjson = json.filter(function (el) {
      return el.idcliente == fcliente;
    });
    labels = fjson.map(function (e) {
      return e.idart;
    });
    //console.log(labels);
    // Map json values back to values array
    values = fjson.map(function (e) {
        return e.nventa;
    });
    //console.log(values);
    actualizarGrafico(myChart,labels,values);
    //reporte=BuildChart(labels,values,"N ventas");
    //console.log(fjson);
  }else if (frep.length!=0){
    fjson = json.filter(function (el) {
      return el.idrepresentante_agente == frep;
    });
    labels = fjson.map(function (e) {
      return e.idart;
    });
    //console.log(labels);
    // Map json values back to values array
    values = fjson.map(function (e) {
        return e.nventa;
    });
    //console.log(values);
    actualizarGrafico(myChart,labels,values);
    //console.log(fjson);
  }else if (farticulo.length!=0){
    fjson = json.filter(function (el) {
      return el.idart == farticulo;
    });
    labels = fjson.map(function (e) {
      return e.idart;
    });
    //console.log(labels);
    // Map json values back to values array
    values = fjson.map(function (e) {
        return e.nventa;
    });
    //console.log(values);
    actualizarGrafico(myChart,labels,values);
    //console.log(fjson);
    //console.log(fjson);
  }else if (ffac.length!=0){
    fjson = json.filter(function (el) {
      return el.fechadefactura == ffac;
    });
    labels = fjson.map(function (e) {
      return e.idart;
    });
    //console.log(labels);
    // Map json values back to values array
    values = fjson.map(function (e) {
        return e.nventa;
    });
    //console.log(values);
    actualizarGrafico(myChart,labels,values);
    //console.log(fjson);
    //console.log(fjson);
  }else if (ford.length!=0){
    fjson = json.filter(function (el) {
      return el.nventa == ford;
    });
    labels = fjson.map(function (e) {
      return e.idart;
    });
    //console.log(labels);
    // Map json values back to values array
    values = fjson.map(function (e) {
        return e.nventa;
    });
    //console.log(values);
    actualizarGrafico(myChart,labels,values);
    //console.log(fjson);
    //console.log(fjson);
  }else{
    var labels = json.map(function (e) {
      return e.idart;
    });
    // Map json values back to values array
    var values = json.map(function (e) {
        return e.nventa;
    });
    actualizarGrafico(myChart,labels,values);
  }

}

function filtroCliente(){
var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("F_cliente");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];//numero de columna en la que se aplica la búsqueda
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function filtroRepresentante() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("F_rep");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[4];//numero de columna en la que se aplica la búsqueda
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function filtroArticulo() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("F_articulo");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];//numero de columna en la que se aplica la búsqueda
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function filtroFactura() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("F_factura");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];//numero de columna en la que se aplica la búsqueda
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

function filtroOrden() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("F_forden");
  filter = input.value.toUpperCase();
  table = document.getElementById("dataTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[6];//numero de columna en la que se aplica la búsqueda
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}