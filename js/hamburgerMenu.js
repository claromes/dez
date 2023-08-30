const parentMenuItem = document.querySelector('.menu-item li.page_item_has_children')
const subnav = parentMenuItem.querySelector('.children')
const nav = parentMenuItem.querySelector('a')

nav.removeAttribute('href')

const open = () => {
    nav.classList.remove('menu-close')
    nav.classList.add('menu-open')
    subnav.style.display = 'block'
}

const close = () => {
    nav.classList.remove('menu-open')
    nav.classList.add('menu-close')
    subnav.style.display = 'none'
}

parentMenuItem.addEventListener('click', () => {
    if (subnav.style.display === 'block') {
        close()
    } else {
        open()
    }
})

document.addEventListener('click', (e) => {
    if (!parentMenuItem.contains(e.target)) {
        if (subnav.style.display === 'block') {
            close()
        }
    }
})