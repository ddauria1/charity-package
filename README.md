# UK Charity Package

PHP package that allows to create a tailored made charity widget.
The widget will contains the following possibilities:

- Pick a cause between:
    . Save the Children
    . Crisis.co.uk
    . Age UK
    . or Add your own one

- Personalize: Colors, Format Widget, Position,Font-family and Size

- Allow to make payment through PayPal Fundraiser


## Usage
You can look at tests/index.php file to see an usage example.

There are two types of widget format:
    <ul>
        <li>Aside</li>
        <li>Footer</li>
    </ul>

First Step install the package by:

```
composer require ddauria1/charity-package
```

## Start Using it

```
$charity = new Charity\Base();
```

This will create a charity object using the Default Cause 0 - "Save the Children"
If you wish to change it with something else you will need to pass the CauseID in the constructor as shown:

```
$charity = new Charity\Base(1); // 1 - Age UK
```

if you also don't want to display charity logo
```
$charity = new Charity\Base(0,false);
```

In case you don't want add charity website link on the title
```
$charity = new Charity\Base(0,false,false);
```

to display the widget just execute this:
```
$charity->display();
```

You can change the layout of the Widget by choosing one of the option:

```
$charity->changeViewToAside();

$charity->changeViewToFooter();
```

To change the widget style modify the following constants in Base.php:
POS_ASIDE_CSS or/and POS_FOOTER_CSS

To add another cause, change the array, $this->availableCauses, in Base.php constructor.
 
