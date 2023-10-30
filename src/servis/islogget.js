export  async function isLogget(){
    let url = 'https://ermakpass.ru/media_node/php/islogget.php'
    let storageUser = sessionStorage.getItem('user')
    let storageSession  = sessionStorage.getItem('session')
    if (notValid(storageUser)||notValid(storageSession)) return false 
    let user = await JSON.parse(storageUser)
    let session = storageSession


    let data = {
        user_id:user.id,
        session
    }
    let response = await fetch(url, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
    },
    body: JSON.stringify(data)
    });

    let result = await response.json();
    return result
}


function notValid(value){
    return !value||value == 'undefined'
}