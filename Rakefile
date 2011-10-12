# -*-ruby-*-
# Build tasks for arunrocks.com

# Usage:
#   rake             - Will run the default task of auto-regenerating server on port 4000
#   rake deploy:prod - Will deploy to arunrocks.com
#   rake write["Post Title Goes Here"] - Adds a new posts

task :default => :server

# Common tasks of running Jekyll ----------

desc 'Running Jekyll with --server --auto option'
task :server do
  system('jekyll --server --pygments --auto')
end

desc 'Running Jekyll with --no-auto option'
task :build do
  system('jekyll --no-auto --pygments')
end

# Deployment tasks ----------

namespace :deploy do
  
  desc "build and deploy to production server"
  task :prod => [:build, :gzip, :"rsync:prod"] do
    puts('Site deployed to arunrocks.com')
  end
end

# rsync tasks  ----------

namespace :rsync do

  desc "rsync to production server as a dry run"
  task :dryrun do
    system('rsync -aivhcz -e ssh --stats --delete --dry-run ./_site/ arunvr@arunrocks.com:/home/arunvr/public_html/')
  end

  desc "rsync to production server"
  task :prod do
    system('rsync -aivhcz -e ssh --stats --delete ./_site/ arunvr@arunrocks.com:/home/arunvr/public_html/')
  end
end


# Additional build tasks  ----------
#  (Why --rsyncable? Read http://beeznest.wordpress.com/2005/02/03/rsyncable-gzip/)
#  (Why --no-name? Experiements show storing timestamps create different md5 for gzips )
desc 'Pre-gzip all the files that have the desired extensions .js, .css or .html'
task :gzip do
  system("find ./_site \\( -name '*.html' -or -name '*.js' -or -name '*.css' \\) -exec sh -c 'gzip -v --no-name -9 --rsyncable -c {} > {}gz' \\;")
end

# Adding a new post in Jekyll ----------

desc "Given a \"title\" as an argument, create a new post file"
task :write, [:title] do |t, args|
  filename = "#{Time.now.strftime('%Y-%m-%d')}-#{args.title.gsub(/\s/, '_').downcase}.markdown"
  path = File.join("blog", "_posts", filename)
  if File.exist? path; raise RuntimeError.new("File exists. Won't clobber #{path}"); end
  File.open(path, 'w') do |file|
    file.write <<-EOS
---
layout: post
title: #{args.title}
date: #{Time.now.strftime('%Y-%m-%d %k:%M:%S')}
tags: [undefined, general]
---

Remove me and the text till the end...

<img src="/blog/img/shift-key.jpg" width="430" height="300" alt="Shift key" title="Shift key (photo by www.garrisonphoto.org/sxc)" class="alignright"/>

### Code

{% highlight c %}
    #includio <stdio.h>
    
    int main() {
        printf ("Hello World!\n");
        return 0;
    }
{% endhighlight %}

EOS
  end
  puts "Now open #{pwd}/#{path} in an editor."
end
