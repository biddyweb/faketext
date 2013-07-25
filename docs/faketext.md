# Installation guide

The following instruction shows you how to install system on Centos 64 bit:

*Install NodeJs*

```bash
$ sudo yum install npm
```

```bash
$ which node
    /usr/bin/node
$ node -v
    v0.10.12
$ which npm
    /usr/bin/npm
$ npm -v
    1.2.17

*Install PhantomJs*

```bash
$ sudo npm install -g phantomjs
```

```bash
$ which phantomjs
    /usr/bin/phantomjs
$ phantomjs -v
    1.9.1
```

# Trouble shooting

*env: node: No such file or directory issue*
Run the following command:

- On MacOS, which assume that the node is installed by MacPort and located in ```/opt/local/bin/```:

```bash
sudo ln -s /opt/local/bin/node /usr/bin/node
```