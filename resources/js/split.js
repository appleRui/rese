const cardText = document.querySelectorAll('.card-text');

function omittedContent(string) {
    const MAX_LENGTH = 24;
    if (string.length > MAX_LENGTH) {
        return string.substr(0, MAX_LENGTH) + '...';
    }
    return string;
}

cardText.forEach((content) => {
    if (content.innerText.length > 24) {
        // console.log(content.innerText.substr(0, 24) + '...')
        return content.innerText.substr(0, 24) + '...'
    }
});