Политштурм
==========

Политштурм – независимый социалистический информационный ресурс.

Данный репозиторий представляет из себя тему для [официального сайта][site]

[site]: https://politsturm.com


## Сборка статики
статика собирается из `./assets/css/*.css`, все файлы объединяются и минифицируются

для сборки потребуется nodejs

### шаги
`npm i` подтянуть пакеты

далее у нас выбор из двух команд
`gulp css` – запустится только команда сборки статики, style.css в корне проекта перезапишется
`gulp` – запустится сборка и подвесится вотчер, который будет пересобирать статику, если мы изменим что-то в одном из файлов в `./assets/css/*.css`

