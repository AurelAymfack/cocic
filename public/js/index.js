// import { OAuth2Client } from 'google-auth-library';



// function onSignIn(googleUser) {
//     var id_token = googleUser.getAuthResponse().id_token;
//     window.location.href = '/google-auth?id_token=' + id_token;
// }




// async function getGoogleProfileData(idToken) {
//     const client = new OAuth2Client(CLIENT_ID);
//     const ticket = await client.verifyIdToken({
//         idToken: idToken,
//         audience: CLIENT_ID,
//     });
//     const payload = ticket.getPayload();
//     const userId = payload['sub'];
//     const email = payload['email'];
//     const name = payload['name'];
//     const picture = payload['picture'];

//     return { userId, email, name, picture };
// }

// const close_fa = document.querySelector('.close')
// const contributeur = document.querySelector('.contributeur')
// const poster = document.querySelector('.poster')
// const connexion=document.querySelector('.connexion')

// const connected = document.querySelector('.connected')


// close_fa.addEventListener('click', () => {
//     connected.style.display = 'none';
// })

// connexion.addEventListener('click', () => {
//     connected.style.display = 'flex';
// })
// contributeur.addEventListener('click', () => {
//     connected.style.display = 'flex';
// })
// poster.addEventListener('click', () => {
//     connected.style.display = 'flex';
// })



const password = document.querySelector('.pwd')

function viderPwd() {
    password.value = '';
}

viderPwd();
