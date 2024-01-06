function toggleActiveClass(id_pet) {
    document.getElementById('pet').value = id_pet;
}

function mostrarTelas(tela) {
    if(tela == 1){
        document.getElementById('site').classList.add('d-none');
        document.getElementById('escolhaPet').classList.remove('d-none');
    }else if(tela == 2){
        document.getElementById('escolhaPet').classList.add('d-none');
        document.getElementById('cadastrarPet').classList.remove('d-none');
    }else{
        document.getElementById('escolhaPet').classList.add('d-none');
        document.getElementById('cadastrarPet').classList.add('d-none');
        document.getElementById('site').classList.remove('d-none');
    }
}

$('.file-input').change(function(){
var curElement = $(this).parent().parent().find('.image');
console.log(curElement);
var reader = new FileReader();

reader.onload = function (e) {
    // get loaded data and render thumbnail.
    curElement.attr('src', e.target.result);
};

// read the image file as a data URL.
reader.readAsDataURL(this.files[0]);
});