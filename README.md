# UK Charity Package

##### WORKING IN PROGRESS #####

PHP package that allow to easy create a tailored made charity widget.
The custom charity widget will contains the following possibilities:

- Pick a cause between:
    . Save the Children
    . Crisis.co.uk
    . Age UK
    . or Add your own one

- Personalize: Colors, Format Widget, Position,Font-family and Size


# Usage
You can look at tests/index.php file to see an usage example.
There are two type of widget format:
    <ul>
        <li>Aside</li>
        <li>Footer</li>
    </ul>

To change the widget style modify the following constants in Base.php:
POS_ASIDE_CSS or/and POS_FOOTER_CSS


To add another cause, change the array, $this->availableCauses, in Base.php constructor.
 