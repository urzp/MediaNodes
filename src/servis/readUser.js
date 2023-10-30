export  async function readUser(){
    let url = window.baseUrl + 'readUser.php'
    let user = JSON.parse(sessionStorage.getItem('user'))
    let session = sessionStorage.getItem('session')
    if (!user||!session) return false
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
    return result.user
}