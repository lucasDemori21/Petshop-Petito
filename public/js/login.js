function validateLogin() {
    const email = document.getElementById('emailLogin').value;
    const senha = document.getElementById('senhaLogin').value;

    if (email == '' && senha == '') {
        document.getElementById('validateLogin').classList.remove('d-none');
        return false;
    }
    return true;
}

const cpfInput = document.getElementById('cpf');
const cepInput = document.getElementById('cep');
const numeroInput = document.getElementById('telefone');

cpfInput.addEventListener('input', () => {
    let value = cpfInput.value;
    value = value.replace(/\D/g, '');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d)/, '$1.$2');
    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    cpfInput.value = value;
});

numeroInput.addEventListener('input', () => {
    let value = numeroInput.value;
    value = value.replace(/\D/g, '');

    if (value.length <= 10) {
        // Formatação para telefone
        value = value.replace(/(\d{2})(\d)/, '($1) $2');
        value = value.replace(/(\d{4})(\d)/, '$1-$2');
    } else {
        // Formatação para celular
        value = value.replace(/(\d{2})(\d)/, '($1) $2');
        value = value.replace(/(\d{5})(\d)/, '$1-$2');
    }

    numeroInput.value = value;
});

cepInput.addEventListener('input', () => {
    let value = cepInput.value;
    value = value.replace(/\D/g, '');
    value = value.replace(/(\d{5})(\d)/, '$1-$2');
    cepInput.value = value;
});

const inputCep = document.getElementById('cep');
inputCep.addEventListener('input', () => {
    const cep = inputCep.value.replace(/\D/g, '');
    if (cep.length === 8) {
        const url = `https://viacep.com.br/ws/${cep}/json/`;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                document.getElementById('rua').value = data.logradouro;
                document.getElementById('bairro').value = data.bairro;
                document.getElementById('cidade').value = data.localidade;
                document.getElementById('estado').value = data.uf;

                document.getElementById('rua').readonly = true;
                document.getElementById('bairro').readonly = true;
                document.getElementById('cidade').readonly = true;
                document.getElementById('estado').readonly = true;

            })
            .catch(error => {
                console.log('Erro');
                console.log(error);
            });
    }
});

function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const toggleButton = document.getElementById(`show${inputId.charAt(0).toUpperCase() + inputId.slice(1)}Toggle`);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleButton.innerHTML = '<i class="bi bi-eye"></i>';
    } else {
        passwordInput.type = "password";
        toggleButton.innerHTML = '<i class="bi bi-eye-slash"></i>';
    }
}