
document.addEventListener('DOMContentLoaded', function() {

    const radioPJ = document.getElementById("RadioPj")
    const radioPF = document.getElementById("RadioPf")

    const formPJ = document.getElementById("PJ")
    const formPF = document.getElementById("PF") 

    radioPJ.addEventListener('change', function(){

        if(radioPJ.checked){
            formPJ.style.display = 'block';
            formPF.style.display = 'none';
        }

    });

    radioPF.addEventListener('change', function() {
        if (radioPF.checked) {
            
            formPF.style.display = 'block';
            formPJ.style.display = 'none';
        }
    });

})

