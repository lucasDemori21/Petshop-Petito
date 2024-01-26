new DataTable('#table-container');

function confirmarDel(id_pet) {
    Swal.fire({
        title: 'Tem certeza?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, exclua!'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const response = await axios.get('/excluir/pet/' + id_pet);
                    Swal.fire({
                        title: 'Excluido!',
                        text: "Pet excluido com sucesso!",
                        icon: 'success'
                    });
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } catch (error) {
                Swal.fire(
                    'Excluido!',
                    'Ocorreu algum problema, tente novamente mais tarde.',
                    'error'
                )
            }
        }
    })
}