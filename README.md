# twigriot
POC implementation of Rendering Riot.js tags in Twig.

Twig is everywhere. eZ Platform, Bolt, Drupal 8 and other popular projects have adopted it. At the same time Node.js and Web Components have risen to popularity. This repo demonstrates merging the popular PHP templating library Twig to Riot js, a lightweight React-like library with Node.js.

This Proof of Concept (POC) implementation of a twig function to render Riot.js (https://github.com/riot/riot) components on the server side using an example Yandex Maps component (https://www.symfony.fi/entry/build-a-web-component-with-riot-js-and-yandex-maps).

Read the article describing the internals: https://www.symfony.fi/entry/rendering-riot-js-tags-in-twig-using-node-js

## Install

The application is a pretty standard bare bones PHP application. You'll need node and npm installed for rendering as well. Once you've checked out the code, run composer and NPM installs.

```bash
curl -s http://getcomposer.org/installer | php
php composer.phap install
npm i
```

This is by no means an optimal setup nor will I take any responsibility for running this in production.
