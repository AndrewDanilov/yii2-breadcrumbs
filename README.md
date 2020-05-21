Yii2 Breadcrumbs
===================
Widget let you create breadcrumbs in simialar way as the default yii breadcrumbs widget, but
with help of template files. You can define templates separetely for wrapper, link item and for
active (last) breadcrumb item.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require andrewdanilov/yii2-breadcrumbs "~1.0.0"
```

or add

```
"andrewdanilov/yii2-breadcrumbs": "~1.0.0"
```

to the `require` section of your `composer.json` file.


Usage
-----

```php
<?= andrewdanilov\breadcrumbs\Breadcrumbs::widget([
	'templateWrapper' => '@frontend/views/site/breadcrumbs/wrapper', // optional
	'templateItem' => '@frontend/views/site/breadcrumbs/item', // optional
	'templateActiveItem' => '@frontend/views/site/breadcrumbs/active-item', // optional
	'showHome' => false, // optional, default true
	'homeLabel' => 'Main', // optional, default 'Main'
	'homeUrl' => ['site/index'], // optional, default ['/']
	'microdata' => true, // optional, default false
	'items' => [
		['label' => 'Category', 'url' => ['site/category']],
		['label' => 'Subcategory', 'url' => ['site/subcategory']],
		['label' => 'Product #1'], // or short ['Product #1']
	],
]) ?>
```

You can enable __schema.org__ microdata for breadcrumbs by setting `microdata` param to true.
