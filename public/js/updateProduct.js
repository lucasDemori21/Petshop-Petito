async function deletar(id) {
    Swal.fire({
        title: 'Tem certeza?',
        text: "Você não poderá reverter isso!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, excluir!'
    }).then(async (result) => {
        if (result.isConfirmed) {
            try {
                const result = await axios.get(`/admin/produto/delete/${id}`);
                console.log(result);

                if (result.data == 'success') {

                    Swal.fire(
                        'Excluido!',
                        'Produto excluido com sucesso.',
                        'success'
                    )

                    setTimeout(() => {
                        window.location.href = '/shop';
                    }, 2500);
                }

            } catch (error) {
                Swal.fire(
                    'Ocorreu algum erro!',
                    'Tente novamente mais tarde.',
                    'warning'
                )
            }
        }
    })
}