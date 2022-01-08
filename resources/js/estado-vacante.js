jQuery(function() {
    $("[data-estado]").each(function (index, el) {
        el.innerText = estadoTexto(el.getAttribute("data-estado"))
        $(el).attr("class", clasesCSSEstado(el.getAttribute("data-estado")));
    });
    function estadoTexto(estado) {
        return estado == 1 ? 'Activo' : 'Inactivo'
    }
    function clasesCSSEstado(estado) {
        const defaultCSS = "px-2 text-xs leading-5 font-semibold rounded-full text-center ";
        const dynamicCSS = estado == 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800"
        return defaultCSS + dynamicCSS;
    }

    $("tbody").on("click", cambiarEstado); // event delegation
    function cambiarEstado(e) {
        if(e.target.getAttribute("data-estado")) {
            let vacanteId = e.target.getAttribute("id").split("-")[1]
            let estado = e.target.getAttribute("data-estado")

            estado = (estado == 1) ? 0 : 1
            const params = {
                estado
            }

            axios
                .post('/vacantes/' + vacanteId, params)
                .then(respuesta => {
                    console.log({respuesta});
                    e.target.parentNode.innerHTML = `
                        <div id="vacante-${vacanteId}" data-estado="${estado}" class="${clasesCSSEstado(estado)}">
                            ${estadoTexto(estado)}
                        </div>
                    `;
                })
                .catch(error => console.log(error))
        }
    }
});
