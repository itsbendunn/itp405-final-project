Travis CI status:
[![Build Status](https://travis-ci.org/itsbendunn/itp405-final-project.svg?branch=master)](https://travis-ci.org/itsbendunn/itp405-final-project)


This site lets users look up places using the Google Maps API to see if there have been incidents with food ailments. Users can also write their own reviews on places, retrieve a list of reviews they've stored and delete reviews. Built using Laravel. 

YouTube runthrough: https://www.youtube.com/watch?v=4RUo3s2Tf54&feature=youtu.be

<h4>
   Use of the Laravel framework
</h4>
<p>
   Entire app is based off of Laravel framework
</p>
<h4>
   Adheres to the MVC pattern
</h4>
<p>
   Models for reviews, users and ratings. Views for each page, based off of Blade templating. Controllers for Google API and database writing.
   Use of Eloquent ORM for database access
</p>
<h4>
   At least 1 API call
</h4>
<p>
   Uses Google Places API to get location information, Google Maps API to find locations and the Google Places Autocomplete API to help users specify locations
</p>
<h4>
   Caching
</h4>
<p>
   Place IDs for each search are cached whenever user performs a search
</p>
<h4>
   Original MySQL database
</h4>
<p>
   Database containing a user’s table with user login info, a reviews table with review details and a rating table with associated ratings
</p>
<h4>Secure database</h4>
<p>
   Used query builder with Laravel
</p>
<h4>
   Authenticated admin pages
</h4>
<p>
   Users can login to create and delete reviews for restaurants
</p>
<h4>
   Flash messaging
</h4>
<p>
   Flash messages appear if creating or deleting reviews is successful
</p>
<h4>
   Blade templating and layouts.
</h4>
<p>
   Your site should utilize only a couple layouts at most.
</p>
<h4>
   At least 5 tests that are unique
</h4>
<p>
   Tests to see if API calls return correct response, if page authorization works, if models are created with proper relationships, if models bind other models properly and if logged in users are directed to proper urls.
</p>
<h4>
   Travis CI integration
</h4>
<p>
   App passes Travis tests
</p>
<h4>
   Server-side data validation
</h4>
<p>
   Validates user input before reviews are created
</p>
<h4>
   Site content 
</h4>
<p>
   Google Maps for searching
</p>
<h4>
   General design that is consistent across site and sections
</h4>
<p>
   Layout is based off of Bootstrap with universal navbars and styles
</p>
<h4>
   Easy to use & styling
</h4>
<p>
   Layout based off of Bootstrap
</p>
