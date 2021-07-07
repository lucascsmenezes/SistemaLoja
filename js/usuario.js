function adicionar() {
    let nome = document.getElementById('nome');
    if(nome.style.display == 'block'){
    nome.style.display = 'block';
    nome.style.display = 'none';
    }else{
        nome.style.display = 'none';
        nome.style.display = 'block';
    }
}
