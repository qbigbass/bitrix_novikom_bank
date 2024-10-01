# Разработка фронта проекта

## 🚀 Структура проекта

```text
/
├── public/
│   └── favicon.svg
├── src/
│   ├── components/
│   │   └── Card.astro
│   ├── layouts/
│   │   └── Layout.astro
│   └── pages/
│       └── index.astro
├── package.json
└── astro.config.mjs
```
Astro looks for `.astro` or `.md` files in the `src/pages/` directory. Each page is exposed as a route based on its file name.

There's nothing special about `src/components/`, but that's where we like to put any Astro/React/Vue/Svelte/Preact components.

Any static assets, like images, can be placed in the `public/` directory.

## 🧞 Commands

All commands are run from the root of the project, from a terminal:

| Command                   | Action                                           |
| :------------------------ |:-------------------------------------------------|
| `npm install`             | Installs dependencies                            |
| `npm run dev`             | Starts local dev server at `localhost:4321`      |
| `npm run build`           | Build your production site to `./build/`         |
| `npm run preview`         | Preview your build locally, before deploying     |
| `npm run astro ...`       | Run CLI commands like `astro add`, `astro check` |
| `npm run astro -- --help` | Get help using the Astro CLI                     |

## Создание assets manifest

Assets manifest - json файл в котором перечислены все шаблоны и принадлежащие им js, css файлы.
Манифест нужен чтобы бекенда мог подключать в шаблоны битрикса все нужное, а фронту не приходилось следить за этим подключать файлы вручную.
За подключение файлов отвечает бандлер, а в манифест только записывается что подключено.

В этом контексте для фронта шаблон - это файл astro в pages/ содержащий все комопненты необходимые для отображения какого-то типа страницы (см. дизайн, прототипы). Таким образом бек использую верстку шаблона и подключенные к нему файлы может созадавать собственные, в т.ч. убирая часть блоков.

С такимм подходом часть страница сайта может загружать не нужные ей ресурсы, но это "меньшее зло".

## Верстка - создание шаблонов

Создавая шаблон для какого-либо типа страницы/одной страницы имя шаблона нужно соглосовать с разработчиками битрикса.

Шаблон - это файл astro в pages/ содержащий все комопненты необходимые для отображения какого-то типа страницы (см. дизайн, прототипы). Таким образом бек использую верстку шаблона и подключенные к нему файлы может созадавать собственные, в т.ч. убирая часть блоков.

Имя шаблона должно состоять из одного или нескольких слов разделенных `-`. Например `search-results`.

Если нужно создать верстку страницы с каким-то состоянием шаблона (определнные набор блоков, какой-то комопннет в активном состоянии по-умолчании и т.п.) - добавить в имя модификатор после символа `_`.
Например `search-results_no-results`