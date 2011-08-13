# -*-ruby-*-
# Build tasks for arunrocks.com

# Usage:
#   rake        - Will run the default task of auto-regenerating server on port 4000

task :default => :server

# Common tasks of running Jekyll ----------

desc 'Running Jekyll with --server --auto option'
task :server do
  system('jekyll --server --pygments --auto')
end
