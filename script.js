const linksInternos = document.querySelectorAll('.menu a[href^="#"]');

linksInternos.forEach(link=> {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        const href = event.currentTarget.getAttribute('href');
        const div = document.querySelector(href);
        const topo = div.offsetTop
        window.scrollTo({
            top: topo,
            behavior: 'smooth'
        })
    })
})

const buttonClear = document.querySelector(".clear");

function clearButton() {
    buttonClear.addEventListener("click", (e)=> {
        document.querySelectorAll("form input").forEach(e => [
            e.value = ""
        ])
    })
}

clearButton()