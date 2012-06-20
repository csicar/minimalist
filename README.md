#Architecure

In `index.php` is the "style script" and the containers (joomla stuff)
In `css/styles.css` is the style


#Style API

Scripts in `index.php` create classes for changing the view.

##Mobile Sidemenu

Onclick `button.getmenu` in the `div.nav` (Nav on the top) 
 * `button.getmenu` get Class `.left`
 * `ul.menu` gets Class `.selected`
 * `#content` get Class `.unselected`

Clicking it again:
 * `button.getmenu` get Class `.right`
 * `ul.menu` gets Class `unselected`
 * `#content` get Class `.selected`

Everything else is caused by css:
```css
/*Pseudo Code*/
.right {
  rotate: 180deg;
  trasition: true
}

menu.selected {
  left: 0
}

content.unselected {
left: 100%;
}

menu.unselected {
  left: 100%;
}

content.selected {
  left: 0;
}
```
For real code please have a look at `./css/template.css:189-207`