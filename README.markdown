http://arunrocks.com - Arun Ravindran's online presence

The entire site has been written in a clean and easy to read markup leveraging new semantic
HTML5 tags and CSS3. There is minimal dependence on the site design (Moonlight theme) allowing
for any future redesigns. The blog posts have been written in Markdown. Most blogs posts
contain atleast one image having a width of upto 500px.

A lot of emphasis has been given to optimise the website loading time. Almost all Javascripts
would be asynchronously loaded. There are various optimisations in the `.htaccess` file.

Install 
-------

* Clone the github repository
* Check out the `master` branch  

Prerequisites
-------------

* Ruby (works with 1.8)
* Speed-up related posts in GSL:

```sudo apt-get install gsl-bin libgsl0-dev
sudo gem install gsl classifier
```

Rakefile
-------------

The entire website (including related posts) is created with a Rakefile. Some of the useful rake commands are:

* `rake` builds  the website.
* `rake deploy:prod` pushes the compiled version to server.
* `rake write["Title"]` makes a new blog post using `Title` and the current date.


License
-------------

The following directories and their contents are Copyright Arun Ravindran. You may not reuse anything therein without my permission:

* blog/
* images/

All other directories and files are MIT Licensed. Feel free to use the HTML and CSS as you please. If you do use them, a link back to http://arunrocks.com would be appreciated, but is not required.


Author
-------------
[Arun Ravindran](http://twitter.com/arocks)
