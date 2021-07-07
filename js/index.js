function showPassword(){
    const eye = document.getElementById('open');
    const eyeslash = document.getElementById('close');
    const fieldpassword = document.getElementById('inputSenha');

    if (eye.style.display === 'block')
    {
        eye.style.display = 'none';
        eyeslash.style.display = 'block';
        fieldpassword.type = 'text';       
    }
    else 
    {
        eye.style.display = 'block';
        eyeslash.style.display = 'none';
        fieldpassword.type = 'password';
    }
};
document.getElementById('btn-login').addEventListener('click', function (e) {
    e.preventDefault 
})
