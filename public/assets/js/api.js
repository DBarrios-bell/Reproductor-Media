const especialidad = document.querySelector('#specialty');
const pAtencion = document.querySelector('#pAtencion');
const opciones = {
    method: 'POST'
}

fetch('http://localhost:8000/api/getEspecialidades', opciones)
    .then(respuesta => respuesta.json())
    .then(resultado => {

        resultado.forEach(elemento => {

            especialidad.innerHTML += `
                    <option value = "${elemento.id}" wire:model="${elemento.id}">${elemento.name}</option>
                  `
        });
    });

fetch('http://localhost:8000/api/getPAtencion', opciones)
    .then(respuesta => respuesta.json())
    .then(resultado => {

        resultado.forEach(elemento => {

            pAtencion.innerHTML += `
                <option value = "${elemento.id}">${elemento.regional}</option>
                `
        });
    });