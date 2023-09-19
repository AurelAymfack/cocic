const contain_tel = document.querySelector('.contain_tel');
const contain_mail = document.querySelector('.contain_mail');
const tel = document.querySelector('.tel');
const mail = document.querySelector('.mail');


mail.addEventListener('click', () => {
    contain_mail.style.transform = 'translatex(-480px)';
    contain_tel.style.transform = 'translatex(-480px)';
    contain_tel.style.opacity = '1';
    contain_mail.style.opacity = '0';
})
tel.addEventListener('click', () => {
    contain_mail.style.transform = 'translatex(0)';
    contain_tel.style.transform = 'translatex(0)';
    contain_tel.style.opacity = '0';
    contain_mail.style.opacity = '1';
})