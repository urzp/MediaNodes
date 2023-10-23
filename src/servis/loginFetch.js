export default 
 async (data) =>{
    let url = 'https://ermakpass.ru/media_node/php/login.php'
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