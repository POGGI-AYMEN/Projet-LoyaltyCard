/*var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('carte de fidélité.pdf');
}); 

(function(){
    var content = $('#content'),
        cache_width = content.width(),
        a4  =[ 495.28,  741.89];  // for a4 size paper width and height
    
    $('#pdf').on('click',function(){
        $('body').scrollTop(0);
        createPDF();
    });
    //create pdf
    function createPDF(){
        getCanvas().then(function(canvas){
            var 
            img = canvas.toDataURL("image/png"),
            doc = new jsPDF({
              unit:'px', 
              format:'a4'
            });     
            doc.addImage(img, 'JPEG', 20, 20);
            doc.save("{{this.['Student Last Name']}}-{{this.['Student Name']}}-umpire-incident-report.pdf");
            content.width(cache_width);
        });
    }
    
    // create canvas object
    function getCanvas(){
        content.width((a4[0]*1.33333) -80).css('max-width','none');
        return html2canvas(content,{
            imageTimeout:2000,
            removeContainer:true
        }); 
    }
    
    }());

    var btn = document.getElementById("getPDFf")
    btn.onclick = getPDF

    function getPDF()  {
        html2canvas(document.getElementById("toPDF"),{
         onrendered:function(canvas){
  
         var img=canvas.toDataURL("image/png");
         var doc = new jsPDF('l', 'cm'); 
         doc.addImage(img,'PNG',2,2); 
         doc.save('reportr.pdf'); 
        }
     }); 
 }  */
 
 
 var node = document.getElementById('toPDF');
 
 domtoimage.toJpeg(document.getElementById('toPDF'), { quality: 0.95 })
 .then(function (dataUrl) {
     var link = document.createElement('getPDFf');
     link.download = 'my-image-name.jpeg';
     link.href = dataUrl;
     link.click();
 });