function generatePDF(name) {
    const element = document.getElementById("repoDoc");
    
    html2pdf()
    .set({
        margin: 1,
        filename: name,
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 5, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'landscape' // landscape o portrait
        }
    })
      .from(element)
      .save();
}

function generatePDFGra(name) {
    const element = document.getElementById("canvas-holder");
    
    html2pdf()
    .set({
        margin: 1,
        filename: name,
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 5, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'landscape' // landscape o portrait
        }
    })
      .from(element)
      .save();
}

function generatePDFR(name) {
    const element = document.getElementById("repoDocR");
    
    html2pdf()
    .set({
        margin: 1,
        filename: name,
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 5, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'landscape' // landscape o portrait
        }
    })
      .from(element)
      .save();
}

function generatePDF_TD() {
    const element = document.getElementById("fechasTabla");

    html2pdf()
    .set({
        margin: 1,
        filename: 'ReporteTiempoDepartamento.pdf',
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 2, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'landscape' // landscape o portrait
        }
    }).from(element).save();
}

function generatePDF_AO() {
    const element = document.getElementById("tableDIV");

    html2pdf()
    .set({
        margin: 1,
        filename: 'ReporteTodasOrdenes.pdf',
        image: {
            type: 'jpeg',
            quality: 0.98
        },
        html2canvas: {
            scale: 2, // A mayor escala, mejores gráficos, pero más peso
            letterRendering: true,
        },
        jsPDF: {
            unit: "in",
            format: "a2",
            orientation: 'landscape' // landscape o portrait
        }
    }).from(element).save();
}