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

function lecturaTablaR(){
  var table = document.getElementById('dataTableR');
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

function BuildChart(labels, values, chartTitle, type) {
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
  //var ctx = document.getElementById("myChart").getContext('2d');
  var ctx = document.getElementById("myBarChart");
  //bar
      myChart = new Chart(ctx, {
      type: type,
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
          scales:{
            xAxes:[{
              ticks:{
                beginAtZero:true
              }
            }]
          }
      }
  });
  return myChart;
}

function BuildChartR(labels, values, chartTitle, type) {
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';
  //var ctx = document.getElementById("myChart").getContext('2d');
  var ctx = document.getElementById("myBarChartR");
  //bar
      myChartR = new Chart(ctx, {
      type: type,
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
          scales:{
            yAxes:[{
              ticks:{
                beginAtZero:true
              }
            }]
          }
      }
  });
  return myChartR;
}

function myPieChart(label_oe, label_op, value_oe, value_op){
  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  // Pie Chart Example
  var cpx = document.getElementById("myPieChart");
  var myPieChart = new Chart(cpx, {
    type: 'pie',
    data: {
      labels: [label_oe, label_op],
      datasets: [{
        data: [value_oe, value_op],
        backgroundColor: ['#4e73df', '#1cc88a'],
        hoverBackgroundColor: ['#2e59d9', '#17a673'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: true,
        caretPadding: 10,
      },
      legend: {
        display: true
      },
      cutoutPercentage: 80,
    },
  });
  return myPieChart;
}

function actualizarGrafico(chart, tlabels, tvalues){
  chart.data.labels=tlabels;
  chart.data.datasets[0].data=tvalues;
  chart.update();
}
function removeData(chart) {
  chart.data.labels.pop();
  chart.data.datasets.forEach((dataset) => {
      dataset.data.pop();
  });
  chart.update();
}

function filtroTabla(tipo){
  //var json=lecturaTabla();
  var fjson;
  var labels;
  var values;
  var tipo;
  //console.log(json);

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
  //console.log(tipo);
  delete values;
  delete labels;
  if (tipo=="art"){
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
          return e.total;
      });
      //console.log(values);
      //console.log(fjson);
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
          return e.total;
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
      console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      console.log(values);
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
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else if (ford.length!=0){
      fjson = json.filter(function (el) {
        return el.fechadeorden == ford;
      });
      labels = fjson.map(function (e) {
        return e.idart;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
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
          return e.total;
      });
      actualizarGrafico(myChart,labels,values);
    }
  }else if(tipo=="cliente"){
    if (fcliente.length!=0){
      fjson = json.filter(function (el) {
        return el.idcliente == fcliente;
      });
      labels = fjson.map(function (e) {
        return e.idcliente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
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
        return e.idcliente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
    }else if (farticulo.length!=0){
      fjson = json.filter(function (el) {
        return el.idart == farticulo;
      });
      labels = fjson.map(function (e) {
        return e.idcliente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
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
        return e.idcliente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else if (ford.length!=0){
      fjson = json.filter(function (el) {
        return el.fechadeorden == ford;
      });
      labels = fjson.map(function (e) {
        return e.idcliente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else{
      var labels = json.map(function (e) {
        return e.idcliente;
      });
      // Map json values back to values array
      var values = json.map(function (e) {
          return e.total;
      });
      actualizarGrafico(myChart,labels,values);
    }
  }else if(tipo=="representante"){
    if (fcliente.length!=0){
      fjson = json.filter(function (el) {
        return el.idcliente == fcliente;
      });
      labels = fjson.map(function (e) {
        return e.idrepresentante_agente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
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
        return e.idrepresentante_agente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
    }else if (farticulo.length!=0){
      fjson = json.filter(function (el) {
        return el.idart == farticulo;
      });
      labels = fjson.map(function (e) {
        return e.idrepresentante_agente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
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
        return e.idrepresentante_agente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else if (ford.length!=0){
      fjson = json.filter(function (el) {
        return el.fechadeorden == ford;
      });
      labels = fjson.map(function (e) {
        return e.idrepresentante_agente;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else{
      var labels = json.map(function (e) {
        return e.idrepresentante_agente;
      });
      // Map json values back to values array
      var values = json.map(function (e) {
          return e.total;
      });
      actualizarGrafico(myChart,labels,values);
    }
  }else if(tipo=="uv"){
    if (fcliente.length!=0){
      fjson = json.filter(function (el) {
        return el.idcliente == fcliente;
      });
      labels = fjson.map(function (e) {
        return e.uventa;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
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
        return e.uventa;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
    }else if (farticulo.length!=0){
      fjson = json.filter(function (el) {
        return el.idart == farticulo;
      });
      labels = fjson.map(function (e) {
        return e.uventa;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
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
        return e.uventa;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else if (ford.length!=0){
      fjson = json.filter(function (el) {
        return el.fechadeorden == ford;
      });
      labels = fjson.map(function (e) {
        return e.uventa;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else{
      var labels = json.map(function (e) {
        return e.uventa;
      });
      // Map json values back to values array
      var values = json.map(function (e) {
          return e.total;
      });
      actualizarGrafico(myChart,labels,values);
    }
  }
  
  else if(tipo=="ma"){
    var f_json=json.sort((a, b) => {
      return new Date(a.json) - new Date(b.json); // descending
    });
console.log(f_json);
    if (fcliente.length!=0){
      fjson = f_json.filter(function (el) {
        return el.idcliente == fcliente;
      });
      labels = fjson.map(function (e) {
        return e.fechadefactura;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //reporte=BuildChart(labels,values,"N ventas");
      //console.log(fjson);
    }else if (frep.length!=0){
      fjson = f_json.filter(function (el) {
        return el.idrepresentante_agente == frep;
      });
      labels = fjson.map(function (e) {
        return e.fechadefactura;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
    }else if (farticulo.length!=0){
      fjson = f_json.filter(function (el) {
        return el.idart == farticulo;
      });
      labels = fjson.map(function (e) {
        return e.fechadefactura;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else if (ffac.length!=0){
      fjson = f_json.filter(function (el) {
        return el.fechadefactura == ffac;
      });
      labels = fjson.map(function (e) {
        return e.fechadefactura;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else if (ford.length!=0){
      fjson = f_json.filter(function (el) {
        return el.fechadeorden == ford;
      });
      labels = fjson.map(function (e) {
        return e.fechadefactura;
      });
      //console.log(labels);
      // Map json values back to values array
      values = fjson.map(function (e) {
          return e.total;
      });
      //console.log(values);
      actualizarGrafico(myChart,labels,values);
      //console.log(fjson);
      //console.log(fjson);
    }else{
      var labels = f_json.map(function (e) {
        return e.fechadefactura;
      });
      // Map json values back to values array
      var values = f_json.map(function (e) {
          return e.total;
      });
      actualizarGrafico(myChart,labels,values);
    }
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
    td = tr[i].getElementsByTagName("td")[7];//numero de columna en la que se aplica la búsqueda
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

//UTILERIAS JSON A CSV
 function convCSV(objArray) {
  const array = typeof objArray != "object" ? JSON.parse(objArray) : objArray;
  let str = "";
  for (let i = 0; i < array.length; i++) {
  let line = "";
  for (let index in array[i]) {
    if (line != "") line += ",";line += array[i][index];
    }
  str += line + "\r\n";
  }
  return str;
}

function exportarCSV(headers, items, fileName) {
  if (headers) {
  items.unshift(headers);
  }

  const jsonObject = JSON.stringify(items);const csv = convCSV(jsonObject);
  const exportName = fileName + ".csv" || "export.csv";
  const blob = new Blob([csv], { type: "text/csv;charset=utf-8;" });

  if (navigator.msSaveBlob) {
   navigator.msSaveBlob(blob, exportName);
  } else {
    const link = document.createElement("a");

    if (link.download !== undefined) {
    const url = URL.createObjectURL(blob);
    link.setAttribute("href", url);
    link.setAttribute("download", exportName);
    link.style.visibility = "hidden";
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
    }
  }
}

function generarCSV(nombre){
  const headers = {
    idart: 'Id Art',
    idcliente: 'Id Cliente',
    idcomp: 'Id Comp',
    fechadefactura:'Fecha de factura',
    idrepresentante_agente: 'ID Representante',
    uventa:'Unidad de venta',
    divisa:'Divisa',
    fechadeorden:'Fecha de orden',
    idorden:'Id de orden',
    cantidad:'Cantidad de compra',
    total:'Total de compra'

   };

  var json=lecturaTabla();

  exportarCSV(headers,json,nombre);
}

function csvArticulo(){
  const headers = {
    numdeventas: '# de Ventas por Art',
    idart: 'Id Art',
    nombre: 'Nombre Art',
   };

  var json=lecturaTablaR();

  exportarCSV(headers,json,"reporte_ventas_por_art");
}

function csvCliente(){
  const headers = {
    numdeventas: '# de Ventas por Cliente',
    idcliente: 'Id Cliente',
    nombre: 'Nombre cliente',
   };

  var json=lecturaTablaR();

  exportarCSV(headers,json,"reporte_ventas_por_cliente");
}

function csvRepresentante(){
  const headers = {
    numdeventas: '# de Ventas por Representante',
    idrepresentante: 'Id Representante',
    nombre: 'Nombre Representante',
   };

  var json=lecturaTablaR();

  exportarCSV(headers,json,"reporte_ventas_por_representante");
}

function csvUV(){
  const headers = {
    numdeventas: '# de Ventas por Unidad de venta',
    unidaddeventa: 'Unidad de venta',
   };

  var json=lecturaTablaR();

  exportarCSV(headers,json,"reporte_ventas_por_uv");
}

function csvMA(){
  const headers = {
    numdeventas: '# de Ventas por Fecha',
    fecha: 'Fecha',
   };

  var json=lecturaTablaR();

  exportarCSV(headers,json,"reporte_ventas_por_fecha");
}