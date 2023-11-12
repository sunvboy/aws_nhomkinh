console.clear()
const navExpand = [].slice.call(document.querySelectorAll('.nav-expand'))
const backLink = `<li class="nav-item"><a class="nav-link nav-back-link" href="javascript:;">Back</a></li>`;
navExpand.forEach(item => {
    item.querySelector('.nav-expand-content').insertAdjacentHTML('afterbegin', backLink)
    item.querySelector('.nav-link').addEventListener('click', () => item.classList.add('active'))
    item.querySelector('.nav-back-link').addEventListener('click', () => item.classList.remove('active'))
})
const ham = document.getElementById('ham')
ham.addEventListener('click', function () {
    document.body.classList.toggle('nav-is-toggled')
})
const tabs = document.querySelectorAll(".tabs");
const tab = document.querySelectorAll(".tab");
const panel = document.querySelectorAll(".tab-content");
function onTabClick(event) {
    for (let i = 0; i < tab.length; i++) {
        tab[i].classList.remove("active");
    }
    for (let i = 0; i < panel.length; i++) {
        panel[i].classList.remove("active");
    }
    event.target.classList.add('active');
    let classString = event.target.getAttribute('data-target');
    console.log(classString);
    document.getElementById('panels').getElementsByClassName(classString)[0].classList.add("active");
}
for (let i = 0; i < tab.length; i++) {
    tab[i].addEventListener('click', onTabClick, false);
}