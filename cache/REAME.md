
folder for detailed saving of transaction history. It can be cleaned at any time. It is advisable to store using the zfs file system with compression. On ext4 it can cause problems with inode

### Zfs 
```bash
zpool create z01 /dev/sdb1 
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
