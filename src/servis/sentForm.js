export  async function sendForm(url, form){
        let response = await fetch(url, {
        method: 'POST',
        body: new FormData(form)
    });
    return response
}