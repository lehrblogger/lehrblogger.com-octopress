[lehrblogger.com](http://lehrblogger.com)
===============
WordPress I love you, [but you're bringing me down.](http://www.youtube.com/watch?v=-eohHwsplvY)

A static Jekyll site based off of the [Octopress framework](http://octopress.org/) and [Ryan Duessing's Minimalist theme.](https://github.com/ryandeussing/octopress-minimalist) and hosted on [Amazon S3](http://aws.amazon.com/s3/).

Front Matter Order
------------------
Not that this matters, but it's nice to be consistent.

 * layout
 * featured
 * title
 * title_image
 * permalink
 * alias
 * end_date
 * dsq_thread_id
 * categories
 * blurb
 * show_blurb
 * thanks
 * thanks_notes
 * crossposts
 * updates
 * styles


Vagrant Setup
-------------
It's better to use this for blog development than my local machine.
```
sudo apt-get update
sudo apt-get install build-essential
sudo apt-get install ruby1.9.1-dev
sudo gem install jekyll
sudo apt-get install rake
sudo gem install bundler
curl -L https://get.rvm.io | bash -s stable
source ~/.rvm/scripts/rvm
rvm install 1.9.3
rvm use 1.9.3
rvm rubygems latest
bundle install  # or gem install rubygems-bundler ? but make sure you're in the blog directory
gem update rdiscount
wget http://sourceforge.net/projects/s3tools/files/latest/download?source=files -O s3cmd.tar.gz
tar xzvf s3cmd.tar.gz
cd s3cmd*
sudo python setup.py install
./s3cmd --configure  # Note that this will require manual input of AWS keys
cd /vagrant
rake generate
``` 

EC2 Setup
---------
For blog development from an iPad/iPhone, I'll need a server somewhere to generate, preview, and deploy the blog. This should also let me edit posts in Dropbox using some other editor on my mobile device. The below instructions work for an Ubuntu 12.04 LTS micro instance.
```
echo "export EDITOR='vim'" >> ~/.bashrc
sudo apt-get install git
git config --global user.name "lehrblogger"
git config --global user.email lehrburger@gmail.com
cd ~ && wget -O - "https://www.dropbox.com/download?plat=lnx.x86_64" | tar xzf -
~/.dropbox-dist/dropboxd
curl -o dropbox2.py https://www.dropbox.com/download?dl=packages/dropbox.py 
python ~/dropbox.py exclude add    ~/Dropbox/*
python ~/dropbox.py exclude remove ~/Dropbox/projects
python ~/dropbox.py exclude add    ~/Dropbox/projects/*
python ~/dropbox.py exclude remove ~/Dropbox/projects/blogs
python ~/dropbox.py exclude add    ~/Dropbox/projects/blogs/*
python ~/dropbox.py exclude remove ~/Dropbox/projects/blogs/lehrblogger.com
python ~/dropbox.py exclude remove ~/Dropbox/projects/blogs/lehrblogger.com/*
python ~/dropbox.py exclude add    ~/Dropbox/projects/blogs/lehrblogger.com/public
```
Then follow the Vagrant instructions above.
