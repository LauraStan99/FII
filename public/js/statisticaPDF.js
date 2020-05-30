var btnSave = document.getElementById('save-pdf');
      google.visualization.events.addListener(chart, 'ready', function() {
        btnSave.disabled = false;
      });
      btnSave.addEventListener('click', function() {
        var doc = new jsPDF();
        doc.addImage(chart.getImageURI(), 0, 0);
        doc.save('chart.pdf');
      }, false);