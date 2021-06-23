# Zedcore coding challenge

This is the code for the Zedcore coding interview challenge.

A partial implementation is provided, and there are a number of improvements required.

## Scenario

This is a simple report which displays whether some employers have met a key performance indicator (KPI) target.

### Improvements required

1. The start/stop dates are not in a friendly format
1. Implement `Employer::MeetsTarget()`
1. Implement `Employer::KPIStyle()`
1. Add a column to display the number of days between the start and stop dates in the table
1. Display the percentage of employers that meet the threshold at the top of the report

## Code structure

We have set out the following classes as a basic scaffolding:

- `Report`
  - This handles the bulk of the logic for displaying the report
- `Cell`
  - This is used to represent a single cell in a HTML table
  - Each object can be set to represent either a `<th>` or `<td>`
- `Employer`
  - This represents an employer's performance data to report on. 

There are three [Twig](https://twig.symfony.com/) template to display the report:

- index.html.twig
  - Handles the main form and page layout
- report.html.twig
  - Handles the report results table
- cell.html.twig
  - Handles displaying each inner cell in the table

The templates use [Bootstrap4](https://getbootstrap.com/) for styles.

Any custom CSS needed can go into `/css/styles.css` but you may also make use of Bootstrap4 classes for any styling improvements.

### Process flow

When a KPI target is input, the following happens:

1. The template gets a list of table headers from the `Report` class and 
displays them
1. It then goes through each of the employers and displays the value for 
each table column

The table headers are defined in `Report::TableColumns()`. This is an array 
where the key is the table header and the value is a function to call on each
`Employer` object for each row. Those functions must return a `Cell` object, so that the content
can be displayed correctly.

## Running the code

This project requires PHP 7.3 and [Composer](https://getcomposer.org/).
 
1. Clone the git repository
2. Inside the directory, run `composer install`
3. Start the inbuilt PHP server using `php -S localhost:8000`

You can then visit the page by going to [`localhost:8000`](localhost:8000) in your browser.

## Unit tests

There are some automated unit tests in `test/EmployerTest.php` which use phpunit to check that the
`MeetsTarget()` and `KPIStyle()` functions are implemented correctly.

**These unit tests *must* pass for your submission to be considered.**

You can run these unit tests with `./vendor/bin/phpunit`

PHPUnit will output a report, which should end with the following highlighted in green:
```
OK (XX tests, YY assertions)
```

If there are any failures then PHPUnit will end the report with the follwing highlighted in red:
```
FAILURES!
Tests: XX, Assertions: YY, Failures: ZZ.
```

Each failure will be reported with an explanation of which test failed, what the expected value was,
and what value your code actually produced.
