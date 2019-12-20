# Zedcore coding challenge

This is the code for the Zedcore Coding interview challenge.
 
It contains a simple "Report" that for employers and a field for what the 
threshold should be.

It is partially implemented. The following is not implemented:

 * The start/stop time are not displayed in a friendly format
 * The threshold logic is not implemented

# Code structure

When a value is input, the following happens

1. The template gets a list of table headers from the `Display` class and 
displays them
2. It then goes through each of the employers and displays the value for 
each table header

The table headers are defined in `Display::TableHeaders`. This is an array 
where the key is the table header and the value is a function to call on the
`Employer` class. This function must return a `Cell`, so that the content
can be displayed correctly.

A `Cell` can either be raw input (which should contain the wrapping `td`/`th`
element) or some other text that will be automatically htmlescaped.

The templates are written using [Twig](https://twig.symfony.com/).
You should not need to edit `index.html.twig`

# Running the code

This project requires PHP 7.3 and [Composer](https://getcomposer.org/). To run
 
1. Clone the repository
2. Inside the directory, run `composer install`
3. Start the inbuilt PHP server using `php -S localhost:8000`

You can then visit the page by going to `localhost:8000` in your browser.

# Problems to solve

1. Display the start/stop times in a friendly format
2. Implement `Employer::ThresholdClass`
3. Implement `Employer::MeetsThreshold`
4. Display the number of days between the start and stop in the table
5. Display the percentage of employers that meet the threshold
