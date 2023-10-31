# media_node

### Установка на сервер:

Файлы prodaction находятся в папке dist.
все файлы необходимо загрузить в корневую папку сайта на сервере (publiс_html)


### Выходная часть проекта Папка dist :

Папка dist - это выход всего проекта который "ребилдиться" при внесении изменения в проект.
Папка с бекендом php. Исходная папка для бекенда-php находится в public.
В нее можно вносить изменения который будут обновлятся на выходе dist при ребилдинге проекта (npm run build)
Также в папку publiс можно добовлять необходимые паки котроые будут  на выходе.

### Фронтенд проекта.

Фронтенд проекта находится в папке scr.
Для инсталяции и запуска на локальном сервере
Необходим пакет node js и git   

### Устанока для работы с фронтенд частью на vue 

Для инсталяции и запуска на локальном сервере
Необходим пакет node js и git

Можно скачать: 
```
git clone https://github.com/urzp/MediaNodes.git
```

Войти в папку проекта: 
```
cd media_node
```

Установка зависимостей: 
```
npm ci
```

Запуск на локальном сервере: 
```
npm run serve
```

Генерация выхоных файлов: 
```
npm run build
```



## Также другие команды от npm:

## Project setup
```
npm install
```

### Compiles and hot-reloads for development
```
npm run serve
```

### Compiles and minifies for production
```
npm run build
```

### Lints and fixes files
```
npm run lint
```

### Customize configuration
See [Configuration Reference](https://cli.vuejs.org/config/).
