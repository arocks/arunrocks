# -*-ruby-*-
# Build tasks for arunrocks.com

# Usage:
#   rake             - Will run the default task of auto-regenerating server on port 4000
#   rake deploy:prod - Will deploy to arunrocks.com

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
    system('rsync -aivz -e ssh --delete --dry-run ./_site/ arunvr@arunrocks.com:/home/arunvr/public_html/beta')
  end

  desc "rsync to production server"
  task :prod do
    system('rsync -aivz -e ssh --delete ./_site/ arunvr@arunrocks.com:/home/arunvr/public_html/beta')
  end
end


# Additional build tasks  ----------

desc 'Pre-gzip all the files that have the desired extensions .js, .css or .html'
task :gzip do
  system("find ./_site \\( -name '*.html' -or -name '*.js' -or -name '*.css' \\) -exec sh -c 'gzip -v -9 -c {} > {}gz' \\;")
end
