function generatePDF() {
    const element = document.getElementById("canvas-holder");
    
    html2pdf()
    .set({
        margin: 1,
        filename: 'reporte.pdf',
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