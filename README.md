Submission for FotF Interview on November 30th

The requirements were met by using search() function as a onSubmit handler on the form provided in index.php. It uses the fetch function to hit search.php with the query params from the form (two date inputs). Then it uses the provided php functions to query the database for all articles with created values between the provided dates. 

Improvements:
1) Better error handling on the PHP side. Currently assumes that there will be both starting and end dates as enforced by the required date inputs (very weak). 
2) Better error messages. Currently the Javascript is simply returning the full console error message on a failed fetch.

