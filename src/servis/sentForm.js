export  async function sendForm(php_script, form){
        const url = window.baseUrl + php_script
        let response = await fetch(url, {
        method: 'POST',
        body: new FormData(form)
    });
    return response
}