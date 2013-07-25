# Trouble shooting

*env: node: No such file or directory issue*
Run the following command:

- On MacOS, which assume that the node is installed by MacPort and located in ```/opt/local/bin/```:

```bash
sudo ln -s /opt/local/bin/node /usr/bin/node
```