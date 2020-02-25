# minter-history-collector
A software data aggregator for a minter that works with a node with no history in real time and stores historical data.

### Installing

```bash
apt install php-cli
```

### Starting
```bash
./connector.php
``

### Crontab line

Add this line in /etc/crontab
```bash
* * * * *       root    cd /<path>/minter-history-collector;./connector.php > connector.log 2>&1
```


### Zfs for cache
```bash
zpool create z01 /dev/sdb1.
```

```bash
zfs set atime=off z01 && \
zfs set compression=lz4 z01 && \
zfs set dedup=off z01 && \
zfs set snapdir=visible z01 && \
zfs set primarycache=all z01 && \
zfs set aclinherit=passthrough z01 && \
zfs inherit acltype z01 && \
zfs get -r acltype z01 && \
mkdir /z01/cache

rm cache && ln -s /z01/cache cache
```