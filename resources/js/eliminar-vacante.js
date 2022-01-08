import Swal from 'sweetalert2'

jQuery(function () {
    $("tbody").on("click", eliminarVacante); // event delegation
    function eliminarVacante(e) {
        if (e.target.getAttribute("data-eliminar-vacante-id")) {
            const vacanteId = e.target.getAttribute("data-eliminar-vacante-id").split("-")[1]

            Swal.fire({
                title: '¿Deseas eliminar esta vacante?',
                text: "Una vez eliminada no se puede recuperar!",
                icon: 'warning',
                confirmButtonText: 'Si',
                confirmButtonColor: '#3085d6',
                showCancelButton: true,
                cancelButtonText: 'No',
                cancelButtonColor: '#d33'
            }).then((result) => {
                if (result.value) {
                    const params = {
                        id: vacanteId,
                        _method: 'delete'
                    }
                    axios.post(`/vacantes/${vacanteId}`, params).then(respuesta => {
                        // console.log(respuesta)
                        Swal.fire(
                            'Vacante Eliminada',
                            respuesta.data.mensaje, // del servidor
                            'success'
                        )
                        e.target.parentNode.parentNode.parentNode.removeChild(e.target.parentNode.parentNode); // Eliminar el tr del DOM
                    }).catch(error => {
                        console.log(error);
                    })
                }
            })
        }
    }
});
